<div class="container p-5">
    <a href="<?= base_url('barang');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data Barang</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('barang/add');?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Qty</label>
                    <input type="number" name="qty" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <input type="number" name="beli" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <input type="number" name="jual" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="">Nama Vendor</label>
                    <input type="text" name="vendor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Merk</label>
                    <input type="text" name="merk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="number" name="telepon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input name="file" type="file" class="form-control" accept="image/*" >
                </div>
                <button class="btn btn-success">Tambah Data</button>
            </form>
            
        </div>
    </div>
</div>