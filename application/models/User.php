<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:04 PM
 */

class User extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->where('email', $username);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $hash = $row->password;
            if (password_verify($password, $hash))
            {
                return $row->id;
            }
        }
        return FALSE;
    }

    public function isUnique($email){
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $total = $query->num_rows();

        if($total != 0)
            return $total;
        else
            return false;
    }
    private function hash_password($password)
    {

        return password_hash($password, PASSWORD_BCRYPT);

    }
    public function Auth()
    {
        if($this->session->logged)
        {
         return true;
        }
        else
            return false;

    }
    public function isAdmin()
    {

        if($this->Auth() and ($this->findOrFail($this->session->logged))[0]['role'] == "admin")
        {
            return true;
        }
        else
            return false;

    }
    public function register($data)
    {

        $data = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $this->hash_password($data['password']),
            'role' => "user",
//            'created_at' => date('Y-m-j H:i:s'),
        );

        return $this->db->insert('users', $data);

    }

    public function findOrFail($id)
    {
        $this->db->from('users');
        $this->db->where('id',$id);
        $value = $this->db->get()->result_array();
        if(is_null($value))
        {
//            echo ("DEBUG: Object User ID: $id Not Found");
            return false;
        }
        else
            return $value;

    }


    public function getIDbyEmail($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get('users');
        if($query->num_rows()>0)
        {
            $row= $query->row();
            $id = $row->id;
        }

        return $id;
    }
}