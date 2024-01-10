<?php
if (empty($_GET['p'])){
    $title="App Kasir";
    $konten="konten/home.php";
}
else if($_GET['p']=='produk'){
    $title="Data Produk";
    $konten="konten/produk.php";
}
else if($_GET['p']=='pelanggan'){
    $title="Data Pelanggan";
    $konten="konten/pelanggan.php";
}
else if($_GET['p']=='user'){
    $title="Data User";
    $konten="konten/user.php";
}
else {
    $title="Halaman Tidak Ditemukan";
    $konten="konten/404.php";
}
?>