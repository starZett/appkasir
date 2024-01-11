
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Pelanggan</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
             <li class="breadcrumb-item active">Pelanggan</li>
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
            <h5>Data Pelanggan</h5>
        </div>
        <div class="card-body">
            <table  id="example1" class="table table-hover">
                <thead class="bg-blue">
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Handphone</th>
                    <th>Aksi</th>
                </thead>
                <?php
                    $sql="SELECT * FROM pelanggan";
                    $query=mysqli_query($koneksi,$sql);
                    while($kolom=mysqli_fetch_array($query)){
                        ?>

                    <tr>
                        <td><?= $kolom['PelangganID']; ?></td>
                        <td><?= $kolom['NamaPelanggan']; ?></td>
                        <td><?= $kolom['Alamat']; ?></td>
                        <td><?= $kolom['NomorTelepon']; ?></td>
                        <td> 
                          <a href="aksi/pelanggan.php" data-toggle="modal" data-target="#modalubah<?= $kolom['PelangganID']; ?>"><i class="fas fa-edit"></i>
                        </a>
                        &nbsp;| &nbsp;
                          <a onclick="return confirm('Yakin untuk hapus data ini?')"  href="aksi/pelanggan.php?aksi=hapus&pelangganid=<?= $kolom['PelangganID']; ?>"><i class="fas fa-trash">

                          </a></i></td>  
                    </tr>
                    <!-- MODAL UBAH Pelanggan -->
 <div class="modal fade" id="modalubah<?= $kolom['PelangganID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/pelanggan.php" method="post">
            <input type="hidden" name="aksi" value="ubah">
            <input type="hidden" name="pelangganid" value="<?=$kolom['PelangganID']; ?>">

            <label for="namapelanggan">Nama Pelanggan</label>
            <input type="text" name="namapelanggan" value="<?=$kolom['NamaPelanggan']; ?>" class="form-control" required>
            <br>
            <label for="alamat">Alamat</label>
            <br>
            <textarea name="alamat" cols="50" rows="3" class="form-control"><?=$kolom['Alamat']; ?></textarea>
            <br>
            <label for="nomortelepon">No Handphone</label>
            <input type="text" name="nomortelepon" value="<?=$kolom['NomorTelepon']; ?>" class="form-control" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/pelanggan.php" method="post">
            <input type="hidden" name="aksi" value="tambah">
            <label for="namapelanggan">Nama Pelanggan</label>
            <input type="text" name="namapelanggan" class="form-control" required>
            <br>
            <label for="alamat">Alamat</label>
            <br>
            <textarea name="alamat" id="" cols="50" rows="3" class="form-control"></textarea>
            <br>
            <label for="nomortelepon">Nomor Telepon</label>
            <input type="text" name="nomortelepon" class="form-control" required>
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