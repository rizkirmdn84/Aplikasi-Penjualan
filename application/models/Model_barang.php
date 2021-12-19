<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{
    public function getDataBarang()
    {
        return $this->db->get('barang_master');
    }

    function insertBarang($data)
    {
        $simpan = $this->db->insert('barang_master', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getBarang($kodebarang)
    {
        return $this->db->get_where('barang_master', ['kode_barang' => $kodebarang]);
    }
    function updateBarang($data, $kodebarang)
    {
        $simpan = $this->db->update("barang_master", $data, ['kode_barang' => $kodebarang]);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function deleteBarang($kodebarang)
    {
        $hapus = $this->db->delete('barang_master', ['kode_barang' => $kodebarang]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
    function getDataHarga()
    {
        $this->db->join('barang_master', 'barang_harga.kode_barang = barang_master.kode_barang');
        return $this->db->get('barang_harga');
    }
    function insertHarga($data)
    {
        $simpan = $this->db->insert('barang_harga', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getHarga($kodeharga)
    {
        $this->db->where('kode_harga', $kodeharga);
        $this->db->join('barang_master', 'barang_harga.kode_barang = barang_master.kode_barang');
        return $this->db->get('barang_harga');
    }
    function updateHarga($data, $kodeharga)
    {
        $simpan = $this->db->update('barang_harga', $data, ['kode_harga' => $kodeharga]);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function deleteHarga($kodeharga)
    {
        $hapus = $this->db->delete('barang_harga', ['kode_harga' => $kodeharga]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}
