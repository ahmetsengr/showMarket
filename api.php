<?php
include 'functions.php';

$categories = category_get_all();
for ($i=0; $i < 5; $i++) { 
echo $categories[$i]['name'] . "</br>";
}
?>