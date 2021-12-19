<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelanggan extends CI_Model
{
    public function getDataPelanggan()
    {
        $this->db->join('cabang', 'pelanggan.kode_cabang = cabang.kode_cabang');
        return $this->db->get('pelanggan');
    }
    function insertPelanggan($data)
    {
        $simpan = $this->db->insert('pelanggan', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getPelanggan($kodepelanggan)
    {
        return $this->db->get_where('pelanggan', ['kode_pelanggan' => $kodepelanggan]);
    }
    function updatePelanggan($data, $kodepelanggan)
    {
        $simpan = $this->db->update("pelanggan", $data, ['kode_pelanggan' => $kodepelanggan]);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function deletePelanggan($kodepelanggan)
    {
        $hapus = $this->db->delete('pelanggan', ['kode_pelanggan' => $kodepelanggan]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}
