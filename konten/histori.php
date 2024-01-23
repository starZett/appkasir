
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Histori Penjualan</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
             <li class="breadcrumb-item active">Histori</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Data Penjualan</h5>
        </div>
        <div class="card-body">
            <table  id="example1" class="table table-hover">
                <thead class="bg-blue">
                    <th>ID</th>
                    <th>Tanggal Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Total Belanja</th>
                    <th>Aksi</th>
                </thead>
                <?php
                    $sql="SELECT penjualan.*,pelanggan.NamaPelanggan FROM penjualan,pelanggan WHERE penjualan.PelangganID=pelanggan.PelangganID";
                    $query=mysqli_query($koneksi,$sql);
                    while($kolom=mysqli_fetch_array($query)){
                        ?>

                    <tr>
                        <td><?= $kolom['PenjualanID']; ?></td>
                        <td><?= $kolom['TanggalPenjualan']; ?></td>
                        <td><?= $kolom['NamaPelanggan']; ?></td>
                        <td><?= number_format($kolom['TotalHarga']); ?></td>
                        <td> 
                            <!-- TOMBOL PRINT NOTA -->
                            <a href="#"><i class="fas fa-print"></i></a> |
                            <!-- TOMBOL INFORMASI -->
                            <a href="index.php?p=infojual&PenjualanID=<?= $kolom['PenjualanID']; ?>"><i class="fas fa-search"></i></a> |
                            <!-- TOMBOL HAPUS -->
                            <a href="aksi/penjualan.php?aksi=hapus&PenjualanID=<?= $kolom['PenjualanID']; ?>" onclick="return confirm('Yakin Akan Hapus Data ini?')" ><i class="fas fa-trash"></i></a>
                        </td>  
                    </tr>
                    <!-- MODAL UBAH PRODUK -->
 <div class="modal fade" id="modalubah<?= $kolom['ProdukID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/produk.php" method="post">
            <input type="hidden" name="aksi" value="ubah">
            <input type="hidden" name="produkid" value="<?=$kolom['ProdukID']; ?>">
            <label for="barcode">Barcode</label>
            <input type="text" name="barcode" value="<?=$kolom['Barcode']; ?>" class="form-control" required>
            <br>
            <label for="namaproduk">Nama Produk</label>
            <input type="text" name="namaproduk" value="<?=$kolom['NamaProduk']; ?>" class="form-control" required>
            <br>
            <label for="harga">Harga Produk</label>
            <input type="number" name="harga" value="<?= $kolom['Harga']; ?>" class="form-control" required>
            <br>
            <label for="stok">Stok Produk</label>
            <input type="number" name="stok" value="<?=$kolom['Stok']; ?>" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-block bg-blue"> <i class="fas fa-save"></i> Simpan </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    <?php
                    } // AKHIR WHILE
                ?>
            </table>
            
            <button type="button" class="btn bg-info btn-block mt-3" data-toggle="modal" data-target="#modaltambah" ><i class="fas fa-plus"></i>Tambah Produk</button>

        </div>
    </div>
       
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- MODAL TAMBAH Produk -->
 <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/produk.php" method="post">
            <input type="hidden" name="aksi" value="tambah">
            <label for="barcode">Barcode</label>
            <input type="text" name="barcode" class="form-control" required>
            <br>
            <label for="namaproduk">Nama Produk</label>
            <input type="text" name="namaproduk" class="form-control" required>
            <br>
            <label for="harga">Harga Produk</label>
            <input type="number" name="harga" class="form-control" required>
            <br>
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-block bg-blue"> <i class="fas fa-save"></i> Simpan </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>