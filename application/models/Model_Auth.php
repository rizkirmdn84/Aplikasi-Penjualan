<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    public function getLogin($username, $password)
    {
        return $this->db->get_where('users', ['username' => $username, 'password' => $password]);
    }
}
