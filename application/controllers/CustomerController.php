<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {

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
        $this->load->model('customer_model');
		$this->load->model('admin_model');
     }
     public function index()
     {
		
		 $this->load->view('header-intro');
         $this->load->view('login');
		 $this->load->view('footer-intro');
     }
	 public function user_registration()
	 {
		$table_name='district_master';
		$columns='id,name';
		$data['districtlist']=$this->customer_model->get_lists($table_name,$columns);
		$table_name='area_master';
		$columns='id,name';
		$data['arealist']=$this->customer_model->get_lists($table_name,$columns);
		
		$this->load->view('header-intro');
		$this->load->view('user-registration',$data);
		$this->load->view('footer-intro');
	 }

	 public function check_referrer_exists()
	 {
		 $mobile=$this->input->post('mobile');
		 $result=$this->customer_model->check_referrer_exists($mobile);
		 echo json_encode($result);
	 }

	 public function user_signup()
	 {
		$data=$add_data=array();
		 if($this->input->post('referrer_mobile'))
		 {
			 $result=$this->customer_model->check_referrer_exists($this->input->post('referrer_mobile'));
			 if($result)
			 {
				 $add_data['referrer_id']=$result->id;
			 }
		 }
		$data['display_name']=$add_data['display_name']= $this->input->post('display_name');
		$data['email_id']=$add_data['email_id']= $this->input->post('email_id');
		$data['mob_no']=$add_data['mobile']= $this->input->post('mobile');
		$add_data['district']= $this->input->post('district');
		$add_data['area']= $this->input->post('area');
		$add_data['permanent_address']= $this->input->post('permanent_address');
		$add_data['correspondence_address']= $this->input->post('correspondence_address');
		$data['password']=md5($this->input->post('password'));
		$data['username']=$data['mob_no'];
		$addd_data['status']=$data['status']=$this->input->post('status');
		$userchk=$this->customer_model->check_username_exist($data['username']);
		if($userchk==1)
		{
			$response=array('success'=>0,'msg'=>'Already Registered..Please Login');
			
		}
		else
		{
			$res=$this->customer_model->check_user_email_exist($data['email_id']);
			if($res)
			{
			 $response=array('success'=>0,'msg'=>'Already Registered..Please Login');
			}
			else
			{
		$user_id=$this->customer_model->insert_user($data);
		$this->session->set_userdata('registeredid',$user_id);
		$add_data['user_id']=$user_id;
		$adddataid=$this->customer_model->insert_user_additional_data($add_data);
		if(!$user_id && !$adddataid)
		{ $response=array('success'=>0,'msg'=>'Please Try Again Later');}
		else
		{
			$response=array('success'=>1,'redirect'=>base_url().'user-type');
		}
	}}
		echo json_encode($response);
	
	 }
	 public function user_type_view()
	 {
		if($this->session->userdata('registeredid'))
		{
		$this->load->view('header-intro');
		$this->load->view('user-type');
		$this->load->view('footer-intro');
		}
		else
		{
			redirect('user-registration');
		}
	 }
	public function user_type()
	{
		if($this->session->userdata('registeredid'))
		{
			
		$data['id']=$this->session->userdata('registeredid');	
		$data['role']=$this->input->post('role');
		if($data['role']=='free')
		{
			$data['status']='Active';
		}
		$res=$this->customer_model->update_user($data);
		if($res){
			if($data['role'] =='free')
			{
				$response=array('success'=>1,'msg'=>'Registration Successfull','redirect'=>base_url().'login');
			}
			else
			{
				 
				$response=array('success'=>1,'msg'=>'','redirect'=>base_url().$data['role']);
			}
		}
		else
		{
			$response=array('success'=>0,'msg'=>"Something went wrong..Please Try Again Later");
		}
		}
		else
		{
			$response=array('success'=>0,'msg'=>"",'redirect'=>base_url().'user-registration');
		}
		echo json_encode($response);
	}
	public function rolebased_details($role)
	{	
		if($this->session->userdata('registeredid'))
		{
		$data['role']=$role;
		$table_name='category_master';
		$columns='id,name';
		$limit='';
		$where=" and type='shop'";
		$data['shopcategories']=$this->customer_model->get_lists($table_name,$columns,$limit,$where);

		$table_name='category_master';
		$columns='id,name';
		$where=" and type='job'";
		$data['jobcategories']=$this->customer_model->get_lists($table_name,$columns,$limit,$where);

		$this->load->view('header-intro');
		$this->load->view('userrole-based-details',$data);
		$this->load->view('footer-intro');
		}
		else
		{
			redirect('user-registration');
		}
	}
	public function user_final_registration()
	{
		if($this->session->userdata('registeredid'))
		{
			$data1['user_id']=$data['id']=$this->session->userdata('registeredid');
			$data['status']='pending';
			$upd=$this->customer_model->update_user($data);
			$role=$this->input->post('role');
			if($role=="individual")
			{
				$data1['job_category']=$this->input->post('job_category');
			}
			else if($role=="shop")
			{
				$data1['shop_name']=$this->input->post('shop_name');
				$data1['shop_category']=$this->input->post('shop_category');
			}
			$upd1=$this->customer_model->update_user_additional_data($data1);
			if($upd && $upd1)
			{
				$customername=$this->admin_model->get_display_name($data['id']);
				$response=array('success'=>1,'msg'=>"Registration Successfull. Finish Payment Through G-Pay",'redirect'=>'upi://pay?pa=9746440467@okaxis&pn='.$customername.'&am=5');
			}
			else
			{
				$response=array('success'=>0,'msg'=>"Some Error Occured.. Please Try Again Later");
			}
			
		}
		else
		{
			$response=array('success'=>0,'msg'=>"",'redirect'=>base_url().'user-registration');
		}
		echo json_encode($response);
	}
     public function user_login()
     {
         $username=$this->input->post('username');
         $password=$this->input->post('password');
         $requrl="home";
         if($this->input->post('requrl'))
         {
            $requrl=$this->input->post('requrl');
         }
        
         $sucess=$this->customer_model->check_user_exist($username,md5($password));
         if($sucess==1)
         {
            $response=array('success'=>$sucess,'redirect_url'=>base_url().$requrl);
         }
         else
         {
            $response=array('success'=>$sucess,'redirect_url'=>'');
         }
         echo json_encode($response);
       
     }
	 public function logout()
	 {
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
		$this->session->unset_userdata($key);
		}
		$this->session->sess_destroy();
		redirect('login');
	 }
	 public function forgot_password_view()
	 {
		$this->load->view('header-intro'); 
		$this->load->view('forgot-password');
		$this->load->view('footer-intro');
	 }
	 public function forgot_password()
	{
		$message="";
		$email=$this->input->post('email_id');
		$result=$this->customer_model->check_user_email_exist($email);
		if($result)
		{
			$data['otp']=rand(1000,9999);
			$data['name']=$result->display_name;
		
			$data['email']=$email;


			
		$config=array(
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);

		$this->email->initialize($config);
		$this->email->from('forgotpassword@adis.com', 'Forgot Password');
		$this->email->to($email);
		$this->email->subject('Forgot Password Mail');
		$emaildescription=$this->load->view('email/forgot_password',$data,TRUE);
		$this->email->message($emaildescription);
		$result1=$this->email->send(); 
		$result1=1;
		if($result1)
		{
			$message="";
			$this->session->set_userdata('fp_otp',$data['otp']);
			$this->session->set_userdata('fp_email',$email);
		
		}
		}
		else
		{
			$message="Email Id Not Fround";
		}

		echo json_encode(array('message'=>$message,'otp'=>$this->session->userdata('fp_otp')));

	}
 	public function forgot_password_success()
	 {
		$this->load->view('header-intro'); 
		$this->load->view('forgot-password-success');
		$this->load->view('footer-intro');
	 }

	public function update_password()
	{
		$redirect="";
		$message="";
		$otp=$this->input->post('otp');
		
		
		if($this->session->userdata('fp_otp'))
		{
			if($this->session->userdata('fp_otp')==$otp)
			{
				$data['email']=$this->session->userdata('fp_email');
				$data['password']=$this->input->post('password');
				$result=$this->customer_model->update_password($data);
				if($result >= 0)
				{
				$redirect=base_url().'login';
				$message="success";
				}
				else
				{
				$message="Password Reset Failed";
				}
			}
			else
			{
				$message="OTP entered is incorrect";
			}
		}


		echo json_encode(array('redirect'=>$redirect,'message'=>$message));

	}

	public function change_password_view()
	{
	$this->load->view('header-intro');	
	$this->load->view('change-password');	
	$this->load->view('footer-intro');	

	}

	public function get_coupon_details($adid)
	{
		$login=$this->customer_model->is_user_loggedin(array('individual','admin','shop'));
		if($login)
		{	
		if($adid !="")
		{
		$userdata['display_name']=$_SESSION['userdata']['display_name'];
		$userdata['role']=$_SESSION['userdata']['role'];		
		$single['table']='tbl_advertisement';
		$single['columnlist']='*';
		$single['where']=" ad_id='".$adid."'";	
		$single['type']='advertisement';
		$data['coupondetails']=$this->admin_model->get_single_view($single);
		$this->load->view('header',$userdata);
        $this->load->view('coupon-details',$data);
        $this->load->view('footer');
		}
	}
	else
	{
		redirect('login');
	}
	}

	

     public function home()
     {
		$data=array();
        $login=$this->customer_model->is_user_loggedin(array('individual','admin','free','shop'));
		if($login)
		{	 
		$userdata['display_name']=$_SESSION['userdata']['display_name'];
		$userdata['role']=$_SESSION['userdata']['role'];
		if($userdata['role']=='free')
		{
			$this->get_channel();
		}
		else
		{
		$table_name='tbl_advertisement';
		$columns='*';
		$limit=100;
		$data['adlist']=$this->admin_model->get_lists($table_name,$columns,$limit);
		foreach($data['adlist'] as $index=>$value)
		{
			$value->video_closing_time=(float)$value->video_closing_time * 60000;
			$value->video_duration=(float)$value->video_duration * 60000;
		}
        $this->load->view('header',$userdata);
        $this->load->view('home',$data);
        $this->load->view('footer');
        }}
        else
        {
            redirect('login');
        }
    }
	public function wallet()
	{
		$login=$this->customer_model->is_user_loggedin(array('individual','admin','free','shop'));
		if($login)
		{
		$userdata=$this->get_user_name_role();	 
        //$data=$this->customer_model->get_home_lists();    
		$data=array();
        $this->load->view('header');
        $this->load->view('wallet',$data);
        $this->load->view('footer');
        }
        else
        {
            redirect('login');
        }
	}
	public function get_my_network()
	{
		$login=$this->customer_model->is_user_loggedin(array('individual','admin','free','shop'));
		if($login)
		{
		// $data['networklist']=$this->customer_model->get_my_network($this->session->userdata('user_id'));		
		$data=array();
        $this->load->view('header');
        $this->load->view('my-network',$data);
        $this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	public function get_profile_details()
	{
		$login=$this->customer_model->is_user_loggedin(array('individual','free','shop'));
		if($login)
		{
			$data['profile_details']=$this->customer_model->get_single_customer($this->session->userdata('user_id'),$_SESSION['userdata']['role']);
			if(in_array($_SESSION['userdata']['role'],array('individual','shop')))
			{
				$data['ref_count']=0;
				$data['referral_list']=$this->customer_model->get_referral_details($this->session->userdata('user_id'));
				if($data['referral_list'])
				{
					$data['ref_count']=count($data['referral_list']);
				}
			}
			$this->load->view('header');
			$this->load->view('profile',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	public function get_channel()
	{
			$table_name='tbl_channelvideos';
			$columns='id,title,video_url';
			$data['videolist']=$this->customer_model->get_lists($table_name,$columns);
			$this->load->view('header');
			$this->load->view('my-channel',$data);
			$this->load->view('footer');
	}
   
	public function under_construction()
	{
			$this->load->view('header-intro');
			$this->load->view('under-construction');
			$this->load->view('footer-intro');
	}
   
 public function settings_view()
 {
	$login=$this->customer_model->is_user_loggedin(array('customer','admin','guest'));
	if($login)
	{
	$data1['page_head']='Settings';
	$data['productlist']="";
	
	$userdata=$this->get_user_name_role();
	$this->load->view('customer/header',$data1);
	$this->load->view('customer/header-navbar',$userdata);
	$this->load->view('customer/settings',$data);
	$this->load->view('customer/footer-navbar');
	$this->load->view('customer/footer');
}
else
{
	redirect('login');
}
 }


 public function language_view()
 {
	$login=$this->customer_model->is_user_loggedin(array('customer','admin','guest'));
	if($login)
	{
	$userdata=$this->get_user_name_role();
	$data1['page_head']='Select Language';
	$this->load->view('customer/header',$data1);
	$this->load->view('customer/header-navbar',$userdata);
	$this->load->view('customer/language');
	$this->load->view('customer/footer-navbar');
	$this->load->view('customer/footer');
}
else
{
	redirect('login');
}
 }
 public function privacy_policy_view()
 {
	$login=$this->customer_model->is_user_loggedin(array('customer','admin','guest'));
	if($login)
	{
	$userdata=$this->get_user_name_role();	
	$data1['page_head']='Privacy Policy';
	$this->load->view('customer/header',$data1);
	$this->load->view('customer/header-navbar',$userdata);
	$this->load->view('customer/privacy-policy');
	$this->load->view('customer/footer-navbar');
	$this->load->view('customer/footer');
}
else
{
	redirect('login');
}
 }
 	public function get_user_name_role()
	{
		$login=$this->customer_model->is_user_loggedin(array('shop','admin','free','individual'));
		if($login)
		{
			$data['display_name']=$_SESSION['userdata']['display_name'];
			$data['role']=$_SESSION['userdata']['role'];
			return $data;
		}

	}


}