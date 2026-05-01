<?php
$url = array(
    "http://localhost:8600"
);

$temp = $_FILES['file'];
$imageFolder = "images3/"; //----WORKS!!!
/*********************************************/  
if (!file_exists($imageFolder)) {
  mkdir($imageFolder, 0777, true);
}
// echo "<pre>";print_r($temp);ECHO "</pre>";
if (is_uploaded_file($temp['tmp_name'])) {
   // echo "<pre>";    print_r($_FILES);    echo "</pre>";
    //echo "h1->".$temp['name'];
    
    // Validating File extensions
    if (! in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array(
        "gif",
        "jpg",
        "png"
    ))) {
        header("HTTP/1.1 400 Not an Image");
        return;
    }
    
    $ds = '/';
    $fileName = "images3/" . $temp['name'];
    $fileName2 = $temp['name'];
    move_uploaded_file($temp['tmp_name'], $fileName);
    
    // Return JSON response with the uploaded file path.
    echo json_encode(array(
        'file_path' => $fileName2
    ));

    //echo "<img src='" . $fileName. "'>";
}
?>

