<?php

require_once(__DIR__ . '/conn.php');

$cats = [];
$cats[] = 'Ντουλάπες>>Συρόμενες';
$cats[] = 'Ντουλάπες>>Ανοιγόμενες';
$cats[] = 'Ντουλάπες>>Walk-In';
$cats[] = 'Γυψοσανίδες>>Ψευδοροφές';
$cats[] = 'Γυψοσανίδες>>Χωρίσματα';
$cats[] = 'Γυψοσανίδες>>Κρυφοί φωτισμοί';

$sql = "SELECT * FROM products ";
$result = mysqli_query($conn, $sql);

//echo "<pre>";  print_r($result); echo "</pre>";

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['cat1'] . "<br>";
    $categories=$cats[rand(0,count($cats)-1)];
      $ar = explode('>>',$categories);
    $cat1 = $ar[0];
    $cat2 = $ar[1];
      $id = $row['id'];
    $sql_updt = "update products set cat1='".$cat1."', cat2='".$cat2."' where id='".$id."'; ";

    echo $sql_updt."<br> \n";
    $result2 = mysqli_query($conn, $sql_updt);
}

?>