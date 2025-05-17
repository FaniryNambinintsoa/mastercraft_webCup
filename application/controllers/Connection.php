<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller {
    
    public function connect ($name, $pass) {
        
        $users = array(
            'jerome' => 'strongpassword'
        );
        
        if (array_key_exists($name, $users) && $users[$name] == $pass) {
            $this->session->set_userdata('current_user', $name);
            echo 'L\'utilisateur ' . $this->session->userdata('current_user') . ' est connecté.';
        } else {
            echo 'Connexion impossible';
        }
    }
    
    public function get_user_name() {
        echo $this->session->userdata('current_user');
    }
    
    public function disconnect() {
        $this->session->sess_destroy();
        echo 'Vous êtes bien déconnecté';
    }
}