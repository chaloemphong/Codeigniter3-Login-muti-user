<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
              
        //load the Login Model
        $this->load->model('LoginModel', 'login');
    }


    public function index() {
        //if not load the login page
        $this->load->view('header');
        $this->load->view('login_page');
        $this->load->view('footer');
    }

    public function doLogin() {
        //get the input fields from login form
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        
        //send the email pass to query if the user is present or not
        $check_login = $this->login->checkLogin($email, $password);



            // if the result is query result is 1 then valid user
        if ($check_login) {
            //if yes then set the session 'loggin_in' as true
            $this->session->set_userdata('logged_in', true);

            $count_row = count($check_login);
            if($count_row > 0){
                $login_in = $this->db->get_where('users',array('email'=>$email, 'password' => $password))->row();
                $data = array('udhmasuk' => true,

                        'name' => $login_in->name,'email' => $login_in->email);

                $this->session->set_userdata($data);
                if($login_in->level == 'admin'){

                    redirect(base_url().'Admin/home');

                }elseif($login_in->level == 'user'){

                    redirect(base_url().'User/home');

                }
            }

            //redirect(base_url().'welcome');
        } else {
            //if no then set the session 'logged_in' as false
            $this->session->set_userdata('logged_in', false);
            
            //and redirect to login page with flashdata invalid msg
            $this->session->set_flashdata('msg', 'Username / Password Invalid');
            redirect(base_url().'login');            
        } 


    }

    public function logout() {
        //unset the logged_in session and redirect to login page
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'login');
    }

}
