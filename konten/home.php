<?php
// MENGHITUNG PRODUK
$sql_produk="SELECT COUNT(ProdukID) AS total_produk FROM produk";
$query_produk=mysqli_query($koneksi,$sql_produk);
$produk=mysqli_fetch_array($query_produk);
$jumlah_produk=$produk['total_produk'];

// MENGHITUNG JUMLAH TRANSAKSI
$sql_jt="SELECT COUNT(PenjualanID) AS jumlah_transaksi FROM penjualan";
$query_jt=mysqli_query($koneksi,$sql_jt);
$jt=mysqli_fetch_array($query_jt);
$jumlah_transaksi=$jt['jumlah_transaksi'];

// MENGHITUNG TOTAL TRANSAKSI

$sql_tt="SELECT SUM(TotalHarga) AS total_transaksi FROM penjualan";
$query_tt=mysqli_query($koneksi,$sql_tt);
$tt=mysqli_fetch_array($query_tt);
$total_transaksi=$tt['total_transaksi'];

// MENGHITUNG PELANGGAN
$sql_pelanggan="SELECT COUNT(PelangganID) AS total_pelanggan FROM pelanggan";
$query_pelanggan=mysqli_query($koneksi,$sql_pelanggan);
$pelanggan=mysqli_fetch_array($query_pelanggan);
$jumlah_pelanggan=$pelanggan['total_pelanggan'];
?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3><?= $jumlah_produk ?></h3>
               <p>Produk</p>
             </div>
             <div class="icon">
               <i class="fas fa-user"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-success">
             <div class="inner">
               <h3><?= $jumlah_transaksi ?></h3>

               <p>Jumlah Transaksi</p>
             </div>
             <div class="icon">
               <i class="fas fa-exchange-alt"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-purple">
             <div class="inner">
               <h3>Rp. <?= number_format($total_transaksi); ?></h3>

               <p>Total Transaksi</p>
             </div>
             <div class="icon">
             <i class="fas fa-money-bill"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-danger">
             <div class="inner">
               <h3><?= ($jumlah_pelanggan); ?></h3>
               <p>Total Pelanggan</p>
             </div>
             <div class="icon">
               <i class="fas fa-exclamation-triangle"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
       <!-- /.row -->
       
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->