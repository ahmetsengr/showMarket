<?php
    require_once('functions.php');

if(isset($_POST)){
    $data = $_POST;
    $category_add = curlJson('showmarket-api.herokuapp.com/api/category', [
        "name"=> $data['name'],
        "img"=> $data['img'],
        "isActive"=> $data['isActive'],
        "showHome"=> $data['showHome'],
], 'POST');
if($category_add['message'] == "Success "){
    echo "başarılı";
}
}
$categories = category_get_all();
foreach($categories as $category){
    echo $category['name'];
}
?>
<form action="" method="post">
<label for="">Kategori adı</label>

<input type="text" name="name" placeholder="Kategori adı">
<label for="">Durum</label>

<input type="text" name="img" placeholder="Resim Linki">
<label for="">Durum</label>
<select name="isActive" id="">
<option value="1">Aktif</option>
<option value="0">Deaktif</option>
</select>
<label for="">Anasayfada</label>
<select name="showHome" id="">
<option value="1">Göster</option>
<option value="0">Gösterme</option>
</select>
<button type="submit">Ekle</button>
</form>
