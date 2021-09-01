<?php 

class Siswa extends Controller{
    public function index()
    {
        $data['judul'] = 'Daftar Siswa';
        $data['mhs'] = $this->model('Siswa_model')->getAllsiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Siswa';
        $data['mhs'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->view('templates/header', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }
    
    public function tambah()
    {
        if ( $this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) 
        {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location' . BASEURL . '/siswa');
            exit;
        }
    }
}
