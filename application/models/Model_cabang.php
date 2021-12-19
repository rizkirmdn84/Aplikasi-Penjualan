<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_cabang extends CI_Model
{
    public function getDataCabang()
    {
        return $this->db->get('cabang');
    }
    function insertCabang($data)
    {
        $simpan = $this->db->insert('cabang', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function getCabang($kodecabang)
    {
        return $this->db->get_where('cabang', ['kode_cabang' => $kodecabang]);
    }
    function updateCabang($data, $kodecabang)
    {
        $simpan = $this->db->update('cabang', $data, ['kode_cabang' => $kodecabang]);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
    function deleteCabang($kodecabang)
    {
        $hapus = $this->db->delete('cabang', ['kode_cabang' => $kodecabang]);
        if ($hapus) {
            return 1;
        } else {
            return 0;
        }
    }
}
