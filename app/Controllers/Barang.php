<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Barang_model;

class Barang extends Controller
{
    public function index()
    {
        // test
        // new
        // nhdbd
        $model = new Barang_model;
        $data['title']     = 'Data Barang';
        $data['getBarang'] = $model->getBarang();
        echo view('header_view', $data);
        echo view('barang_view', $data);
        echo view('footer_view', $data);
    }
    public function tambah()
    {
        $data['title']     = 'Tambah Data Barang';
        echo view('header_view', $data);
        echo view('tambah_view', $data);
        echo view('footer_view', $data);
    }
    public function add()
    {
        $imageFile = $this->request->getFile('file');
        $imageFile->move('uploads');

        $model = new Barang_model;
        $data = [
            'nama_barang' => $this->request->getPost('nama'),
            'qty'         => $this->request->getPost('qty'),
            'harga_beli'  => $this->request->getPost('beli'),
            'harga_jual'  => $this->request->getPost('jual'),
            'nama_vendor' => $this->request->getpost('vendor'),
            'merk'        => $this->request->getpost('merk'),
            'telepon'     => $this->request->getPost('telepon'),
            'nama_gambar' => $imageFile->getName(), 
        ];
        $model->saveBarang($data);
        echo '<script>
                alert("Sukses Tambah Data Barang");
                window.location="'.base_url('barang').'"
            </script>';

    }
    public function edit($id)
    {

        $model = new Barang_model;
        $getBarang = $model->getBarang($id)->getRow();
        if(isset($getBarang))
        {
            $data['barang'] = $getBarang;
            $data['title']  = 'Edit '.$getBarang->nama_barang;

            echo view('header_view', $data);
            echo view('edit_view', $data);
            echo view('footer_view', $data);

        }else{

            echo '<script>
                    alert("ID barang '.$id.' Tidak ditemukan");
                    window.location="'.base_url('barang').'"
                </script>';
        }
    }
    public function update()
    {
        
        $imageFile = $this->request->getFile('file');
        $filename = $imageFile->getRandomName();
        $imageFile->move('uploads');
        // {
        //     if (!$imageFile->isValid()) {
        //         return null;
        //     }
        
        //     $newThumbnailFileName = $newThumbnailFileName
        //         ? ((($point = strrpos($newThumbnailFileName, ".")) === false) ? $newThumbnailFileName 
        //         : substr($newThumbnailFileName, 0, $point)) . $imageFile->guessExtension()
        //         : $imageFile->getRandomName();
        
        //     $targetPath = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . $newThumbnailFileName;
        
        //     \Config\Services::image()
        //         ->withFile($imageFile->getRealPath() ?: $imageFile->__toString())
        //         ->fit($width, $height, $position)
        //         ->save($targetPath);
        
        //     return new \CodeIgniter\Files\File($targetPath, true);
        // }
        
        // $newName = $imageFile->getRandomName();
        // $imageFile->move('uploads', $newName);
        // $new_name = $imageFile->getRandomName('uploads');
        



        $model = new Barang_model;
        $id = $this->request->getPost('id_barang');
        $data = array(
            'nama_barang' => $this->request->getPost('nama'),
            'qty'         => $this->request->getPost('qty'),
            'harga_beli'  => $this->request->getPost('beli'),
            'harga_jual'  => $this->request->getPost('jual'),
            'nama_vendor' => $this->request->getpost('vendor'),
            'merk'        => $this->request->getpost('merk'),
            'telepon'     => $this->request->getpost('telepon'),
            'nama_gambar' => $imageFile->getName()

        );
        $model->editBarang($data,$id);
        echo '<script>
                alert("Sukses Edit Data Barang");
                window.location="'.base_url('barang').'"
            </script>';

    }
    public function hapus($id)
    {
        $model = new Barang_model;
        $getBarang = $model->getBarang($id)->getRow();
        if(isset($getBarang))
        {
            $model->hapusBarang($id);
            echo '<script>
                    alert("Hapus Data Barang Sukses");
                    window.location="'.base_url('barang').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, ID barang '.$id.' Tidak ditemukan");
                    window.location="'.base_url('barang').'"
                </script>';
        }
    }

    // function image() { 
        
    //     helper(['form', 'url']);

    //     $database = \Config\Database::connect();
    //     $db = $database->table('profile');
    
    //     $file = $this->validate([
    //         'file' => [
    //             'uploaded[file]',
    //             'mime_in[file, image/png, image/jpg, image/jpeg]',
    //             'max_size[file,4096]',
    //         ]
    //     ]);
    
    //     if (!$file) {
    //         print_r('Wrong file type selected');
    //     } else {
    //         $imageFile = $this->request->getFile('file');
    //         $imageFile->move(WRITEPATH . 'uploads');
    
    //         $data = [
    //            'file_name' =>  $imageFile->getName(),
    //            'file_type'  => $imageFile->getClientMimeType()
    //         ];
    
    //         $save = $db->insert($data);
    //         print_r('Image uploaded correctly!');        
    //     }

    // }
    
}