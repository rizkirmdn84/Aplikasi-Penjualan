<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_cabang');
    }
    public function index()
    {

        $data['barang'] = $this->Model_barang->getDataBarang()->result();
        $this->template->load('template/template', 'barang/view_barang', $data);
    }
    public function inputbarang()
    {
        $this->load->view('barang/input_barang');
    }

    public function simpanbarang()
    {
        $kodebarang = $this->input->post('kodebarang');
        $namabarang = $this->input->post('namabarang');
        $satuan = $this->input->post('satuan');

        $data = array(
            'kode_barang' => $kodebarang,
            'nama_barang' => $namabarang,
            'satuan'      => $satuan
        );

        $simpan = $this->Model_barang->insertBarang($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Disimpan!</div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Sudah Ada!</div>');
            redirect('barang');
        }
    }

    public function editbarang()
    {
        $kodebarang = $this->uri->segment(3);
        $data['barang'] = $this->Model_barang->getBarang($kodebarang)->row_array();
        $this->load->view('barang/edit_barang', $data);
    }
    public function updatebarang()
    {
        $kodebarang = $this->input->post('kodebarang');
        $namabarang = $this->input->post('namabarang');
        $satuan = $this->input->post('satuan');

        $data = array(
            'nama_barang' => $namabarang,
            'satuan'      => $satuan
        );

        $simpan = $this->Model_barang->updateBarang($data, $kodebarang);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Diupdate!</div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Gagal Update!</div>');
            redirect('barang');
        }
    }

    public function hapusbarang()
    {
        $kodebarang = $this->uri->segment(3);
        $hapus = $this->Model_barang->deleteBarang($kodebarang);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Dihapus!</div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Gagal Di Hapus!</div>');
            redirect('barang');
        }
    }

    public function harga()
    {
        $data['harga'] = $this->Model_barang->getDataHarga()->result();
        $this->template->load('template/template', 'barang/view_harga', $data);
    }
    public function inputharga()
    {
        $data['barang'] = $this->Model_barang->getDataBarang()->result();
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $this->load->view('barang/input_harga', $data);
    }
    public function simpanharga()
    {
        $kodeharga = $this->input->post('kodeharga');
        $kodebarang = $this->input->post('kodebarang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $cabang = $this->input->post('cabang');

        $data = array(
            'kode_harga'  => $kodeharga,
            'kode_barang' => $kodebarang,
            'harga'       => $harga,
            'stok'        => $stok,
            'kode_cabang' => $cabang,
        );

        $simpan = $this->Model_barang->insertHarga($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Disimpan!</div>');
            redirect('barang/harga');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Sudah Ada!</div>');
            redirect('barang/harga');
        }
    }
    public function editharga()
    {
        $kodeharga = $this->uri->segment(3);
        $data['barang'] = $this->Model_barang->getDataBarang()->result();
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $data['harga'] = $this->Model_barang->getHarga($kodeharga)->row_array();
        $this->load->view('barang/edit_harga', $data);
    }
    public function updateharga()
    {
        $kodeharga = $this->input->post('kodeharga');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'harga'       => $harga,
            'stok'        => $stok,
        );

        $simpan = $this->Model_barang->updateHarga($data, $kodeharga);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Diupdate!</div>');
            redirect('barang/harga');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Sudah Ada!</div>');
            redirect('barang/harga');
        }
    }
    public function hapusharga()
    {
        $kodeharga = $this->uri->segment(3);
        $hapus = $this->Model_barang->deleteHarga($kodeharga);
        if ($hapus == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Dihapus!</div>');
            redirect('barang/harga');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
            <i class="fa fa-close"></i>
            Data Gagal Di Hapus!</div>');
            redirect('barang/harga');
        }
    }
}
