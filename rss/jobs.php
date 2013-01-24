<?php
/*
* method that parses XML into an array
*/
function xml2array($contents, $get_attributes = 1, $priority = 'tag') {
   if (!$contents)
       return array();

   if (!function_exists('xml_parser_create')) {
       //print "'xml_parser_create()' function not found!";
       return array();
   }

   //Get the XML parser of PHP - PHP must have this module for the parser to work
   $parser = xml_parser_create('');
   xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
   xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
   xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
   xml_parse_into_struct($parser, trim($contents), $xml_values);
   xml_parser_free($parser);

   if (!$xml_values)
       return; //Hmm...


   //Initializations
   $xml_array = array();
   $parents = array();
   $opened_tags = array();
   $arr = array();

   $current = &$xml_array; //Refference
   //Go through the tags.
   $repeated_tag_index = array(); //Multiple tags with same name will be turned into an array
   foreach ($xml_values as $data) {
       unset($attributes, $value); //Remove existing values, or there will be trouble
       //This command will extract these variables into the foreach scope
       // tag(string), type(string), level(int), attributes(array).
       extract($data); //We could use the array by itself, but this cooler.

       $result = array();
       $attributes_data = array();

       if (isset($value)) {
           if ($priority == 'tag')
               $result = $value;
           else
               $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
       }

       //Set the attributes too.
       if (isset($attributes) and $get_attributes) {
           foreach ($attributes as $attr => $val) {
               if ($priority == 'tag')
                   $attributes_data[$attr] = $val;
               else
                   $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
           }
       }

       //See tag status and do the needed.
       if ($type == "open") {//The starting of the tag '<tag>'
           $parent[$level - 1] = &$current;
           if (!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
               $current[$tag] = $result;
               if ($attributes_data)
                   $current[$tag . '_attr'] = $attributes_data;
               $repeated_tag_index[$tag . '_' . $level] = 1;

               $current = &$current[$tag];
           } else { //There was another element with the same tag name
               if (isset($current[$tag][0])) {//If there is a 0th element it is already an array
                   $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                   $repeated_tag_index[$tag . '_' . $level]++;
               } else {//This section will make the value an array if multiple tags with the same name appear together
                   $current[$tag] = array($current[$tag], $result); //This will combine the existing item and the new item together to make an array
                   $repeated_tag_index[$tag . '_' . $level] = 2;

                   if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                       $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                       unset($current[$tag . '_attr']);
                   }
               }
               $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
               $current = &$current[$tag][$last_item_index];
           }
       } elseif ($type == "complete") { //Tags that ends in 1 line '<tag />'
           //See if the key is already taken.
           if (!isset($current[$tag])) { //New Key
               $current[$tag] = $result;
               $repeated_tag_index[$tag . '_' . $level] = 1;
               if ($priority == 'tag' and $attributes_data)
                   $current[$tag . '_attr'] = $attributes_data;
           } else { //If taken, put all things inside a list(array)
               if (isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...
                   // ...push the new element into that array.
                   $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;

                   if ($priority == 'tag' and $get_attributes and $attributes_data) {
                       $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                   }
                   $repeated_tag_index[$tag . '_' . $level]++;
               } else { //If it is not an array...
                   $current[$tag] = array($current[$tag], $result); //...Make it an array using using the existing value and the new value
                   $repeated_tag_index[$tag . '_' . $level] = 1;
                   if ($priority == 'tag' and $get_attributes) {
                       if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                           $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                           unset($current[$tag . '_attr']);
                       }

                       if ($attributes_data) {
                           $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                       }
                   }
                   $repeated_tag_index[$tag . '_' . $level]++; //0 and 1 index is already taken
               }
           }
       } elseif ($type == 'close') { //End of tag '</tag>'
           $current = &$parent[$level - 1];
       }
   }

   return($xml_array);
}

$xml_content = file_get_contents('../sites/all/modules/covidien_careers/xml/CV_AMS_JOB_OPENING_OUTPUT-361240.xml');
$xmlResult = xml2array($xml_content, 0);

$stats = array();
$xmlFinalJobs = array();
if(isset($xmlResult['webRowSet']['data']['currentRow']) && !empty($xmlResult['webRowSet']['data']['currentRow'])){
    foreach($xmlResult['webRowSet']['data']['currentRow'] as $xmlJob){
        $xmlJob = $xmlJob['columnValue'];
        
        if(empty($xmlJob[0])) { $stats['id']++; continue; } #no id, continue
        if(empty($xmlJob[1])) { $stats['title']++; continue; } #no title, continue
        #if(empty($xmlJob[13])) { $stats['content']++; continue; } #no title, continue
        
        if(!empty($xmlJob[17])){
            list($year, $month, $day) = preg_split('/-/i', $xmlJob[17]);
            $data = mktime(0, 0, 0, $month, $day, $year);
        } else {
            $data = time();
        }
        
        $content_html = '
        <p><strong>Job Description</strong></p>
        <p><strong>Job Function:&nbsp;</strong>'.(!empty($xmlJob[9]) ? $xmlJob[9] : "").'</p>
        <p><strong>Job Title:&nbsp;</strong>'.(!empty($xmlJob[1]) ? $xmlJob[1] : "").'</p>
        <p><strong>Job ID:&nbsp;</strong>'.(!empty($xmlJob[0]) ? $xmlJob[0] : "").'</p>
        <p><strong>Location:&nbsp;</strong>'.(!empty($xmlJob[4]) ? $xmlJob[4] : "").' - '.(!empty($xmlJob[5]) ? $xmlJob[5] : "").'</p>
        <p><u><strong>Are you Covidien?</strong></u></p>
        '.(!empty($xmlJob[13]) ? $xmlJob[13] : "").'
        '.(!empty($xmlJob[14]) ? $xmlJob[14] : "").'
        '.(!empty($xmlJob[15]) ? $xmlJob[15] : "").'
        '.(!empty($xmlJob[16]) ? $xmlJob[16] : "").'
        '.(!empty($xmlJob[18]) ? '<br /><a href="'.$xmlJob[18].'">apply</a>' : "");
        
        $xmlFinalJobs[$data][] = array(
            'jobFunction' => $xmlJob[10], 
            'title' => $xmlJob[1], 
            'description' => (!empty($xmlJob[13]) ? strip_tags($xmlJob[13]) : ""), 
            'content' => $content_html, 
            'time' => $data 
        );
    }
}

#print_r($stats); 
#exit;
    
#ksort($xmlFinalJobs);

#print_r($xmlFinalJobs); exit;

/*
-1 !!!
Job Opening 1
Posting Title 2
Dept ID 3
Department Desc 4
Location 5
Location Desc 6
Recruiting Area
Recruiting Location Desc
Job Family 9
Job Family Desc 10
Full/Part 11
Type 12
Descr 13
Type 14
Descr long 15 
Type 16
Descr 17
URL 19
Post Date 18
Job Code 20
Gbl/Reg BU 21
Gbl/Reg BU Desc 22
*/

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
    <pubDate>'.date("r").'</pubDate>
    <lastBuildDate>'.date("r").'</lastBuildDate>
    <languageid>01</languageid>
    <language>en</language>
    <title>Covidien - Mofuse jobs feed</title>
    <description>Covidien - Mofuse jobs feed</description>';
        if(isset($xmlFinalJobs) && !empty($xmlFinalJobs)){
            foreach($xmlFinalJobs as $xmlJobDayList){
                foreach($xmlJobDayList as $xmlJob){
                    echo '
                    <item>
                      <Title>'.$xmlJob['title'].'</Title>
                      <Description>
                        <![CDATA[
                            '.$xmlJob['description'].'
                        ]]>
                      </Description>
                      <Content>
                        <![CDATA[
                            '.$xmlJob['content'].'                
                        ]]>
                      </Content>
                      <pubDate>'.date("r", $xmlJob['time']).'</pubDate>
                    </item>';
                }
            }
        }
            
echo '</channel>
</rss>'; 
?>