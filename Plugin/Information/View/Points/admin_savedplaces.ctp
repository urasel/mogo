<?php
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 

//set document header to text/xml
header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each
foreach($places as $place){
//debug($place);
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("name",$place['points']['name']);
  $newnode->setAttribute("address", $place['points']['address']);  
  $newnode->setAttribute("lat", $place['points']['lat']);  
  $newnode->setAttribute("lng", $place['points']['lng']);  
  $newnode->setAttribute("type", $place['points']['place_type_id']);	
}

echo $dom->saveXML();
?>