<?php
class RuanganModel extends CI_Model
{
    public function tambahRuangan($namaRuangan)
    {
        // Menyimpan data ruangan ke database
        $data = array(
            'nama' => $namaRuangan
        );
        return $this->db->insert('ruang', $data);
    }

    public function getRuangan()
{
    // Mengambil data ruangan dari database (misalnya menggunakan query)
    $query = $this->db->get('ruang');
    return $query->result();
}
public function updateRuangan($kode, $nama) {
    // Query untuk memperbarui ruangan berdasarkan kode
    $data = array(
        'nama' => $nama
    );
    $this->db->where('kode', $kode);
    $result = $this->db->update('ruang', $data);

    return $result;
}
public function isNamaRuanganExists($namaRuangan)
    {
        // Mengecek apakah nama ruangan sudah ada dalam database
        $this->db->where('nama', $namaRuangan);
        $query = $this->db->get('ruang');

        return $query->num_rows() > 0;
    }

    public function deleteRuangan($kode)
    {
        // Eksekusi query penghapusan ruangan berdasarkan kode
        $this->db->where('kode', $kode);
        $result = $this->db->delete('ruang');

        return $result;
    }

    public function getRuanganByKode($kode) {
        $this->db->where('kode', $kode);
        $query = $this->db->get('ruang');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function getSubRuangData($kode_utama) {
        // Query untuk mengambil data dari tabel "sub_ruang" dengan WHERE clause
        $this->db->where('kode_utama', $kode_utama);
        $query = $this->db->get('sub_ruang');
    
        // Mengembalikan hasil query dalam bentuk array objek
        return $query->result();
    }
    

}