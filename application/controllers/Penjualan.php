<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function index()
    {
        $this->template->load('template/template', 'penjualan/view_penjualan');
    }
    public function inputpenjualan()
    {
        $this->template->load('template/template', 'penjualan/input_penjualan');
    }
}
