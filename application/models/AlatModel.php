<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlatModel extends CI_Model {

    public function simpanDataAlat($data) {
        $this->db->insert('alat', $data); // Simpan data alat ke dalam tabel 'alat'
        $query = $this->db->get('sub_ruang'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
        $result = $query->row();
        $kode_ruang = $result->kode_ruang;

        return $kode_ruang;
    }

    // public function getDaftarAlat() {
    //     return $this->db->get('alat')->result_array(); // Ambil semua data alat dari tabel 'alat'
    // }

    public function getDaftarAlat($kode) {
        $this->db->where('kode_ruang', $kode);
        return $this->db->get('alat')->result_array(); // Ambil semua data alat dari tabel 'alat'
    }

    public function getKodeRuang($kodeRuang) {
        $this->db->where('alat', $kodeRuang);
        $query = $this->db->get('sub_ruang');
        return $query->result_array();
    }   
}
