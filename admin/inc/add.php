<?php 
include 'functions.php';
$data = $_POST;
// resim yükle

if($_FILES['img']){
$tmp_files = "../tmp_img/".$_FILES['img']['name'];
move_uploaded_file($_FILES["img"]["tmp_name"], $tmp_files);
$imgs = curl_file_create($tmp_files);
$dataimage = array(
    "myFile" => $imgs
);
$img = imageUpload('showmarket-api.herokuapp.com/api/uploadImage', $dataimage);
$data["img"] = $_FILES['img']['name'];
}

$data = json_encode($data);

switch($_POST['x']){
    case "service": 
      
            $s =  curlJson('showmarket-api.herokuapp.com/api/service', json_decode($data), 'POST');
            print_r($s);
        break;
    case "sector": 
       
                $s =  curlJson('showmarket-api.herokuapp.com/api/sector', json_decode($data), 'POST');
               print_r($s);
          
            break;
            case "category": 
                $s =  curlJson('showmarket-api.herokuapp.com/api/category', json_decode($data), 'POST');
               print_r($s);
          
            break;
}

?>