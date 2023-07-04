<?php

class UserModel extends CI_Model
{
    public $table = 'user';
    public $id = 'id';

    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }
    public function simpan_data($nama, $username, $password, $level)
    {
        // Menyiapkan data yang akan disimpan ke dalam array
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'passwords' => $password,
            'level' => $level
        );

        // Menyimpan data ke dalam tabel 'user'
        $this->db->insert('user', $data);
    }
    
    public function get_all_users()
    {
        return $this->db->get('user')->result();
    }
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    public function search($keyword, $filter)
    {
        $this->db->select('*');
        $this->db->from('user');

        if (!empty($keyword)) {
            $this->db->like('username', $keyword);
        }

        if (!empty($filter)) {
            $this->db->order_by($filter, 'ASC');
        }

        $query = $this->db->get();

        return $query->result();
    }
    public function is_username_exist($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
