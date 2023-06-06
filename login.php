
<?php
    require_once('functions.php');

if(isset($_POST)){
$giris = curlJson('showmarket-api.herokuapp.com/api/auth/login', [
    'gsm' => '905443955688',
    'password' => '123456123465',
]);
if($giris['success'] == 1){
    $_SESSION['id'] = $giris['data'];

    $_SESSION['accessToken'] = $giris['data']['accessToken'];
    
}else{
    echo "Hata";
}
}
$giris = curlJson('showmarket-api.herokuapp.com/api/auth/login', [
    'gsm' => '905443955688',
    'password' => '123456123465',
]);
print_r($giris);
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
