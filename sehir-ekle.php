<?php
    require_once('functions.php');

if(isset($_POST)){
    $data = $_POST;
    $city_add = curlJson('showmarket-api.herokuapp.com/api/cities', [
        "name"=> $data['name'],
        "isActive"=> $data['isActive'],
        "showHome"=> $data['showHome'],
], 'POST');
if($city_add['message'] == "Success "){
    echo "başarılı";
}
}
$cities = city_get_all();
foreach($cities as $city){
    echo $city['name'];
}
?>
<form action="" method="post">
<label for="">Şehir adı</label>

<input type="text" name="name" placeholder="Kategori adı">
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
