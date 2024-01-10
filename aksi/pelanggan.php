<?php
session_start();
include "../koneksi.php";
include "../function.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $namapelanggan=$_POST['namapelanggan'];
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];

        $sql="INSERT INTO pelanggan (PelangganID,NamaPelanggan,Alamat,NomorTelepon) VALUES(DEFAULT,'$namapelanggan','$alamat','$nomortelepon')";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=pelanggan');
    }
    else if($_POST['aksi']=='ubah'){
        $pelangganid=$_POST['pelangganid'];
        $namapelanggan=$_POST['namapelanggan'];
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];

        $sql="UPDATE pelanggan SET NamaPelanggan='$namapelanggan', Alamat='$alamat', NomorTelepon='$nomortelepon' WHERE PelangganID=$pelangganid";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=pelanggan');
    }
}

if($_GET){
    if ($_GET['aksi']=='hapus'){
        $pelangganid=$_GET['pelangganid'];
        $sql="DELETE FROM pelanggan WHERE PelangganID=$pelangganid"; // Hard Delete
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=pelanggan');
    }

}

?> 