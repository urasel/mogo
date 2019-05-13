<?php

// configuration
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$row = $data->row;
$rowperpage = $data->rowperpage;

// Fetch data
$query = 'SELECT * FROM posts limit '.$row.','.$rowperpage;

$result = mysqli_query($con,$query);

$data = array();
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    $shortcontent = substr($content, 0, 160)."...";
    $link = $row['link'];

    $data[] = array("id"=>$id,"title"=>$title,"shortcontent"=>$shortcontent,"link"=>$link,"content"=>$content);
   
}

echo json_encode($data);
