<?php

class LoginModel extends CI_Model
 {

    public function AdminLogin( $username, $password )
 {

        $Login = $this->db->where( ['username' => $username, 'password' => $password] )
        ->from( 'admin' )
        ->get();
        return $Login->row_array();
    }

}
?>