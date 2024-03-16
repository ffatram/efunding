<?php
date_default_timezone_set('Asia/Makassar');
if (!isset($_SESSION['level'])) {
    header('Location:' . BASEURL . '/login');
    exit;
} elseif ($_SESSION['level'] !== 'admin') {
    header('Location:' . BASEURL . '/login');
    exit;
}

class admin extends Controller{
    public function index()
    {
       
        $this->view('admin/beranda');
    }

    public function data_user(){

    }
}


?>