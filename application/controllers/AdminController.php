<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
        $this->load->model('admin_model');	 
		$this->load->model('customer_model');
     }
     public function index()
     {
	/* 	if($this->session->userdata('user_id')==1 && $this->session->userdata('user_id'))
		{
			redirect('admin/dashboard');
		}
		else
		{ */
		 $this->load->view('admin/header');
         $this->load->view('admin/index');
		 $this->load->view('admin/footer');
		/* } */
     }

	 public function activate_user()
	 {
		 $data['id']=$this->input->post('user_id');
		 $data['status']='Active';
		 echo $this->customer_model->update_user($data);
		 
	 }

	 public function user_login()
	 {
		 $username=$this->input->post('username');
		 $password=$this->input->post('password');
	 
		 $sucess=$this->admin_model->check_user_exist($username,md5($password));
		 if($sucess==1)
		 {
 
			 $response=array('success'=>$sucess,'redirect_url'=>base_url().'admin/dashboard');
		 }
		 else
		 {
			 $response=array('success'=>$sucess,'redirect_url'=>'');
		 }
		 echo json_encode($response);
		 die();
	 }
 
	 public function user_logout()
	 {
		 $user_data = $this->session->all_userdata();
		 foreach ($user_data as $key => $value) {
				 $this->session->unset_userdata($key);
		 }
		 $this->session->sess_destroy();
		 redirect('AdminController');
	 }
	 public function dashboard()
	 {
		$table_name='user_add_details';
		$columns='id,user_id,display_name';
		$where=" and status='Active' and role ='individual'";
		$limit=5;
		$data['individual_list']=$this->admin_model->get_lists($table_name,$columns,$limit,$where);


		$table_name='user_add_details';
		$columns='id,user_id,display_name,shop_name';
		$where=" and status='Active' and role ='shop'";
		$limit=5;
		$data['shop_list']=$this->admin_model->get_lists($table_name,$columns,$limit,$where);

		$table_name='user_add_details';
		$columns='id,user_id,display_name';
		$where=" and status='Active' and role ='free'";
		$limit=5;
		$data['free_list']=$this->admin_model->get_lists($table_name,$columns,$limit,$where);


		$data['dash_count']=$this->admin_model->get_dashboard_count();	
	
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer'); 
	 }
	 
	

	 public function get_page($page_name,$id="",$param1="",$param2="")
	 {
		 $data=array();
		 if($id)
		 {
			 $id=$id;
		 }
		 if($page_name=='add-shop-category')
		 {
			if($id != "")
			{
			$single['table']='category_master';
			$single['columnlist']='*';
			$single['where']=" id=".$id." and type='shop'";	
			$single['type']='category';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			 $table_name='category_master';
			 $columns='id,name';
			 $limit=100;
			 $where=" and type='shop'";
			 $data['categorylist']=$this->admin_model->get_lists($table_name,$columns,$limit,$where);

		 }
		 else  if($page_name=='add-job-category')
		 {
			if($id != "")
			{
			$single['table']='category_master';
			$single['columnlist']='*';
			$single['where']=" id=".$id." and type='job'";	
			$single['type']='category';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			 $table_name='category_master';
			 $columns='id,name';
			 $limit=100;
			 $where=" and type='job'";
			 $data['categorylist']=$this->admin_model->get_lists($table_name,$columns,$limit,$where);

		 }
		 else if($page_name=='customer-profile')
		 {
			 if($id !="")
			 {
			 $data['customer_details']=$this->admin_model->get_single_customer($id);
			 foreach($data['customer_details'] as $index=>$value)
			 {
			 if( $value->area)
			 {
				$value->area_name=$this->admin_model->get_area_name($value->area);
			 }
			 if( $value->district)
			 {
				$value->district_name=$this->admin_model->get_district_name($value->district);
			 }
			 if(in_array($value->role,array('individual','shop')))
			{
				$data['ref_count']=0;
				$data['referral_list']=$this->customer_model->get_referral_details($this->session->userdata('user_id'));
				if($data['referral_list'])
				{
					$data['ref_count']=count($data['referral_list']);
				}
			}
			}
			 }


		 }
		 
		 else if($page_name=='area-add')
		 {
			if($id != "")
			{
			$single['table']='area_master';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='area';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='area_master';
			$columns='id,name';
			$limit=100;
			$data['area_list']=$this->admin_model->get_lists($table_name,$columns,$limit);
		 }
		 else if($page_name=='district-add')
		 {
			if($id != "")
			{
			$single['table']='district_master';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='district';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='district_master';
			$columns='id,name';
			$limit=100;
			$data['district_list']=$this->admin_model->get_lists($table_name,$columns,$limit);
		 }
		
	
		 else if($page_name=='add-advertisement')
		 {
			if($id != "")
			{
			$single['table']='tbl_advertisement';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='advertisement';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='tbl_advertisement';
			$columns='id,title,shop_link,description,image_url';
			$limit=100;
			$data['advertisementlist']=$this->admin_model->get_lists($table_name,$columns,$limit); 
		 }
		 else if($page_name=='add-channel-videos')
		 {
			if($id != "")
			{
			$single['table']='tbl_channelvideos';
			$single['columnlist']='*';
			$single['where']='id='.$id;	
			$single['type']='videos';
			$data['update']=$this->admin_model->get_single_view($single);
			}
			$table_name='tbl_channelvideos';
			$columns='id,title,video_url';
			$limit=100;
			$data['videolist']=$this->admin_model->get_lists($table_name,$columns,$limit); 
			
		 }
		 
		 $this->load->view('admin/header');
		 $this->load->view('admin/navbar');
		 $this->load->view('admin/'.$page_name,$data);
		 $this->load->view('admin/footer');
 
	 }

	 public function add_category()
	 {
		$data=array();
		$data['name']=$this->input->post('name');
		$data['type']=$this->input->post('type');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->insert_category($data);
		echo json_encode($result);
	 }
	 public function update_category()
	 {
		$data=array();
		$data['id']=$this->input->post('id');
		$data['name']=$this->input->post('name');
		$data['type']=$this->input->post('type');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->update_category($data);
		echo json_encode($result);
	 }


	
public function add_area()
{
		$data=array();
		$data['name']=$this->input->post('name');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->insert_area($data);
		echo json_encode($result);
}
public function update_area()
{
		$data=array();
		$data['id']=$this->input->post('id');
		$data['name']=$this->input->post('name');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->update_area($data);
		echo json_encode($result);
}
public function add_district()
{
		$data=array();
		$data['name']=$this->input->post('name');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->insert_district($data);
		echo json_encode($result);
}
public function update_district()
{
		$data=array();
		$data['id']=$this->input->post('id');
		$data['name']=$this->input->post('name');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->update_district($data);
		echo json_encode($result);
}

	
	public function add_advertisement()
    {
			$data['image_url']=$this->image_upload($_FILES['image_url'],'advertisement-images','AD');
			$data['video_url']=$this->input->post('video_url');	
			$data['video_closing_time']=$this->input->post('video_closing_time');
			$data['video_duration']=$this->input->post('video_duration');
			$data['title']=$this->input->post('title');
			$data['description']=$this->input->post('description');
			$data['shop_link']=$this->input->post('shop_link');
			$data['coupon_code']=$this->input->post('coupon_code');
			$data['coupon_details']=$this->input->post('coupon_details');
			$data['status']=$this->input->post('status');
			$data['ad_id']='ad_'.rand(1,10000);
			$result= $this->admin_model->insert_advertisement($data);
			echo json_encode($result);
    }

	public function update_advertisement()
    {
		if($_FILES['image_url']['name'])
		{
		
			$data['image_url']=$this->image_upload($_FILES['image_url'],'slider-images','SLIDER');
		}
		else
		{
			$data['image_url']=$this->input->post('old_image');
		}
		
			$data['video_url']=$this->input->post('video_url');
			$data['video_closing_time']=$this->input->post('video_closing_time');
			$data['video_duration']=$this->input->post('video_duration');
			$data['id']=$this->input->post('id');
			$data['title']=$this->input->post('title');
			$data['description']=$this->input->post('description');
			$data['shop_link']=$this->input->post('shop_link');
			$data['coupon_code']=$this->input->post('coupon_code');
			$data['coupon_details']=$this->input->post('coupon_details');
			$data['status']=$this->input->post('status');
			$result= $this->admin_model->update_advertisement($data);
			echo json_encode($result);
    }

	public function add_channel_video()
	{
		$data=array();
		$data['title']=$this->input->post('title');
		$data['video_url']=$this->input->post('video_url');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->insert_channel_video($data);
		echo json_encode($result);
	}

	public function update_channel_video()
	{
		$data=array();
		$data['id']=$this->input->post('id');
		$data['title']=$this->input->post('title');
		$data['video_url']=$this->input->post('video_url');
		$data['status']=$this->input->post('status');
		$result= $this->admin_model->update_channel_video($data);
		echo json_encode($result);
	}
	
	
	
public function image_upload($image,$directory,$path_prefix,$type="")
{
	
		$this->load->library('upload');
		
		if (!is_dir('uploads/'.$directory)) {
			mkdir('uploads/'.$directory, 0777, TRUE);		   
		}
		if($type=='video')
		{
			$config['allowed_types'] = 'mp4|MP4|ogg|OGG|ogv|OGV';
		}
		else
		{
			$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
		}
			$config['upload_path'] = 'uploads/'.$directory;
			$this->load->library('upload',$config);

			$ext = explode(".",$image['name']);
			$imagename=$path_prefix.'_'.strtotime('now').rand(0,9);
			$_FILES['file']['name']=$imagename.".".$ext[1];
			$_FILES['file']['type']=$image['type'];
			$_FILES['file']['tmp_name']=$image['tmp_name'];
			$_FILES['file']['size']=$image['size']; 
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$uploadData=$this->upload->data();
			$image_url=$uploadData['file_name'];
			return $image_url;
}

	public function single_view($type,$id)
	{
		$imagepath="";
		
		
		if($type=='area')
		{
			$page_name='update-area';
			$data['table']='area_master';
			$data['columnlist']=array('id','name','status');
			$data['where']='id='.$id;
		}
	
		else if($type=='district')
		{
			$page_name='update-district';
			$data['table']='district_master';
			$data['columnlist']=array('id','name','status');
			$data['where']='id='.$id;
		}
		else if($type=='advertisement')
		{
			$page_name='update-advertisement';
			$data['table']='tbl_advertisement';
			$data['columnlist']=array('*');
			$data['where']='id='.$id;
		}
	
		
		$data['type']=$type;
		$result=$this->admin_model->get_single_view($data);

		$result['page_name']=$page_name;
		$result['image']=$imagepath;
		/* print_r($result); exit; */
		if(isset($result['data'][0]->category))
		{
			$result['data'][0]->category=$this->admin_model->get_category_name($result['data'][0]->category);
		}
		if(isset($result['data'][0]->area))
		{
			$result['data'][0]->area=$this->admin_model->get_area_name($result['data'][0]->area);
		}
		$result['type']=$data['type'];
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
        $this->load->view('admin/single-view',$result);
		$this->load->view('admin/footer');
	}
	public function delete_item()
	{
		$data=array();
		$redirect="";
		$type=$this->input->post('type');
		$data['id']=$this->input->post('id');
		
		if($type=="area")
		{
			$data['table']="area_master";
			$redirect=base_url().'admin/add-area';
		}
		else if($type=="district")
		{
			$data['table']="district_master";
			$redirect=base_url().'admin/add-district';
		}
		else if($type=="advertisement")
		{
			$data['table']="tbl_advertisement";
			$redirect=base_url().'admin/add-advertisement';
		}
		else if($type=="job-category")
		{
			$data['table']="category_master";
			$redirect=base_url().'admin/add-job-category';
		}
		else if($type=="shop-category")
		{
			$data['table']="category_master";
			$redirect=base_url().'admin/add-shop-category';
		}
		else if($type=="channel-video")
		{
			$data['table']="tbl_channelvideos";
			$redirect=base_url().'admin/add-channel-videos';
		}
		
		
		$result=$this->admin_model->delete_item($data);
		if($result)
		{
			$success=1;
		}
		else
		{
			$success=0;
		}
		echo json_encode(array('success'=>$success,'redirect_url'=>$redirect));

	
	}
	

	public function is_username_email_existing()
	{
		$error=1;   
		$email_id=$this->input->post('email_id');
		$emailres=$this->admin_model->check_user_email_exist($email_id);
		
		$username=$this->input->post('username');
		$usernameres=$this->admin_model->check_username_exist($username);
      if($emailres==0 && $usernameres==0)
      {
         $error=0;
      }
		echo json_encode(array('email_id'=>$emailres,'username'=>$usernameres,'error'=>$error));
	}
	
	
	public function get_customers_list($role)
	{
		$table_name='user_add_details';
		$columns='*';
		$limit=100;
		$where=" and role='$role' and status !='inactive'  ORDER BY field(status, 'pending') DESC";
		$data['customers_list']=$this->admin_model->get_lists($table_name,$columns,$limit,$where);
		foreach($data['customers_list'] as $index=>$value)
		{
			$value->area_name=$this->admin_model->get_area_name($value->area);
			$value->district_name=$this->admin_model->get_district_name($value->district);
		}
		$data['title']=$role.' List';
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
        $this->load->view('admin/customers-list',$data);
		$this->load->view('admin/footer');
	}
	public function customer_profile($name,$customer_id)
	{
		$data['customer_details']=$this->admin_model->get_single_customer($customer_id);
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
        $this->load->view('admin/user-profile',$data);
		$this->load->view('admin/footer');
	}
	
}
