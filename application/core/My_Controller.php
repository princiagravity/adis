<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userauth_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $data = array();

        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();

		$this->user = $this->session->userdata('userdata'); //session data storing
		print_r($this->user);
		//var_dump($this->user);return;
		$m = $this->router->fetch_method();   			//method retrive
		
		if(!isset($this->user['username'])){		// not login
			$_SESSION['login'] = false;// for kcfinder
			if(($m!='user_login'))
				return $this->signin();
		}
		else if(isset($this->user['username'])) { 	//is log
			$_SESSION['login'] = true; // for kcfinder
			if(($m=='user_login')){
				redirect("AdminController");
			}
		}
       
     }

	 public function signin()
	 {

	 }
    }