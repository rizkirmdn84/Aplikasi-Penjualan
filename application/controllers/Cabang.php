<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_cabang');
    }
    public function index()
    {
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $this->template->load('template/template', 'cabang/view_cabang', $data);
    }
    public function inputcabang()
    {
        $this->load->view('cabang/input_cabang');
    }
    public function simpancabang()
    {
        $kodecabang = $this->input->post('kodecabang');
        $namacabang = $this->input->post('namacabang');
        $alamatcabang = $this->input->post('alamatcabang');
        $telepon = $this->input->post('telepon');

        $data = array(
            'kode_cabang' => $kodecabang,
            'nama_cabang' => $namacabang,
            'alamat_cabang' => $alamatcabang,
            'telepon' => $telepon
        );

        $simpan = $this->Model_cabang->insertcabang($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Disimpan!</div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Sudah Ada!</div>');
            redirect('cabang');
        }
    }

    public function editcabang()
    {
        $kodecabang = $this->uri->segment(3);
        $data['cabang'] = $this->Model_cabang->getcabang($kodecabang)->row_array();
        $this->load->view('cabang/edit_cabang', $data);
    }
    public function updatecabang()
    {
        $kodecabang = $this->input->post('kodecabang');
        $namacabang = $this->input->post('namacabang');
        $alamatcabang = $this->input->post('alamatcabang');
        $telepon = $this->input->post('telepon');

        $data = array(
            'nama_cabang' => $namacabang,
            'alamat_cabang' => $alamatcabang,
            'telepon'      => $telepon
        );

        $simpan = $this->Model_cabang->updatecabang($data, $kodecabang);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Diupdate!</div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Gagal Update!</div>');
            redirect('cabang');
        }
    }

    public function hapuscabang()
    {
        $kodecabang = $this->uri->segment(3);
        $hapus = $this->Model_cabang->deletecabang($kodecabang);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Dihapus!</div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Gagal Di Hapus!</div>');
            redirect('cabang');
        }
    }
}
