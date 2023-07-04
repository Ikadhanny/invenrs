<?php
class SubRuangModel extends CI_Model
{
    public function tambahRuangan($namaRuangan)
    {
        $data = array(
            'nama' => $namaRuangan
        );

        // Menyisipkan data ke dalam tabel "sub_ruang"
        $this->db->insert('sub_ruang', $data);
    }

    public function cekNamaRuangan($nama_ruangan) {
        $this->db->where('nama', $nama_ruangan);
        $query = $this->db->get('sub_ruang');
        
        return $query->num_rows() > 0;
    }

    public function tambahSubRuang($data) {
        // Simpan data ke database
        $this->db->insert('sub_ruang', $data);
        return $this->db->insert_id();
    }

    public function getSubRuang($kodeRuang)
    {
        return $this->db->get_where('sub_ruang', ['kode_ruang' => $kodeRuang])->result();
    }

    public function updateSubRuang($kodeRuang, $nama, $kodeUtama)
    {
        // Query untuk mengupdate data sub ruangan berdasarkan primary key
        $data = array(
            'nama' => $nama,
            'kode_utama' => $kodeUtama
        );
        $this->db->where('kode_ruang', $kodeRuang);
        $this->db->update('sub_ruang', $data);

        // Mengembalikan hasil update (true atau false)
        return $this->db->affected_rows() > 0;
    }

    public function deleteRuangan($kode)
    {
        // Eksekusi query penghapusan ruangan berdasarkan kode
        $this->db->where('kode_ruang', $kode);
        $result = $this->db->delete('sub_ruang');

        return $result;
    }

    public function getSubRuangByKodeRuang($kode_ruang) {
        $this->db->where('kode_ruang', $kode_ruang);
        $query = $this->db->get('sub_ruang');
        return $query->row();
    }

    public function getSubRuangData($kode)
    {
        $this->db->where('kode_ruang', $kode);
        $query = $this->db->get('sub_ruang');
        return $query->result();
    }
    
}
