<?php


date_default_timezone_set('Asia/Makassar');
class log extends Controller
{
    public function index()
    {
        $data['modal_log'] = $this->model('m_cs')->modal_log($_POST);
        $this->view('log/v_modal_log', $data);
    }
}
