<?php 
class Admin_model extends CI_Model{	

	public function __construct(){ 
		$this->load->database();
	}
	public function insert_user($data=array())
	{
		$result= $this->db->insert('user_details',$data);
		return $this->db->insert_id();
	}
	public function update_user($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update('user_details',$data);
		return $this->db->affected_rows();
	}
	public function insert_category($data=array())
	{
		$result= $this->db->insert('category_master',$data);
		return $result;
	}
	public function update_category($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update('category_master',$data);
		return $result;
	}
	public function insert_area($data=array())
	{
		$result= $this->db->insert('area_master',$data);
		return $result;
	}
	public function update_area($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update('area_master',$data);
		return $result;
	}
	public function insert_district($data=array())
	{
		$result= $this->db->insert('district_master',$data);
		return $result;
	}
	public function update_district($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update('district_master',$data);
		return $result;
	}

	public function insert_advertisement($data=array())
	{
		$result= $this->db->insert('tbl_advertisement',$data);
		return $result;
	}
	public function update_advertisement($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update('tbl_advertisement',$data);
		return $result;
	}
	public function insert_channel_video($data=array())
	{
		$result= $this->db->insert('tbl_channelvideos',$data);
		return $result;
	}
	public function update_channel_video($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update('tbl_channelvideos',$data);
		return $result;
	}

	public function check_user_exist($username,$password)
	{
	$sucess=1;        
	$query=$this->db->query("select id,display_name,username,email_id,role from user_details where username='$username' and password='$password' and role='admin'");
	$result=$query->row();
	if($result)
	{   
	$userdata=array(
		  
			'username'=>$result->username,
			'display_name'=>$result->display_name,
			'email_id'=>$result->email_id,
			'role'=>$result->role
	);

	$this->session->set_userdata('userdata',$userdata);
	$this->session->set_userdata('user_id',$result->id);
  
	$sucess=1;
	}
	else
	{
			$sucess=0;
	}

	return $sucess;
	}
	public function get_lists($table,$columns,$limit="",$orderby="")
	{
		if($limit !="")
		{
			$limit='limit '.$limit;
		}
		if($orderby=="")
		{
			$orderby=' order by created_on desc';
		}
	  
		$query   = $this->db->query("SELECT $columns from $table where status != 'Deleted' $orderby $limit");
		$results = $query->result();
		return $results;
	}
	public function get_arealist()
	{
		$data=array();
		$query   = $this->db->query("SELECT id,name FROM area_master where status !='Deleted'");
		$results = $query->result();
		if($results)
		{
		foreach ($results as $row)
		{
		$data[$row->id]=$row->name;
		}
		}
	   return $data;

	}
	public function get_districtlist()
	{
		$data=array();
		$query   = $this->db->query("SELECT id,name FROM district_master where status !='Deleted'");
		$results = $query->result();
		if($results)
		{
		foreach ($results as $row)
		{
		$data[$row->id]=$row->name;
		}
		}
	   return $data;

	}
	

	public function get_area_name($id="")
	{
		$query   = $this->db->query("SELECT name from area_master where id=$id");
		$results = $query->row();
		if($results)
		{
			return $results->name;
		}
		else
		{
			return null;
		}
	}
	public function get_district_name($id="")
	{
		$query   = $this->db->query("SELECT name from district_master where id=$id");
		$results = $query->row();
		if($results)
		{
			return $results->name;
		}
		else
		{
			return null;
		}
	}



	public function get_dashboard_count()
	{
		$result=array();
		$res=$this->db->query("SELECT role, COUNT(*) as count FROM user_add_details GROUP BY role")->result();
		if($res)
		{
			foreach($res as $index=>$value)
			{
				$result[$value->role]=$value->count;
			}
		}
		return $result;
	}

	public function get_single_customer($customerid)
	{
		$query=$this->db->query("select * from user_add_details where user_id='".$customerid."' and status !='inactive'");
		$results=$query->result();
		return $results;
	}
	public function get_single_view($data=array())
	{
		$result=array();
		if($data)
		{
		if($data['type']=='products' || $data['type']=='customer' || $data['type']=='agent')
		{
			$this->db->where($data['where'][0]);
			$this->db->select($data['columnlist'][0]);
			$query = $this->db->get($data['table'][0]);
			$result['data']=$query->result();

		   
		   

			$this->db->where($data['where'][1]);
			$this->db->select($data['columnlist'][1]);
			$query = $this->db->get($data['table'][1]);
			$result['data2']=$query->result();

		   /*  print_r($result['data2']); exit; */
		   

		}  
		else
		{ 
			$this->db->where($data['where']);
			$this->db->select($data['columnlist']);
			$query = $this->db->get($data['table']);
			$result['data']=$query->result();
		  
		}
		}
	  
		return $result;
	}
	

	public function get_display_name($user_id)
	{
		$query   = $this->db->query("SELECT display_name as name from user_details where id='$user_id'");
		$results = $query->row();
		if($results)
		{
			return $results->name;
		}
		else
		{
			return null;
		}

	}

	public function delete_item($data=array())
	{
		$this->db->where('id', $data['id']);
		$result= $this->db->update($data['table'],array('status'=>'Deleted'));
		return $result;

	}


	public function check_user_email_exist($email="")
	{
		   $query=$this->db->query("select id from user_details where email_id='".$email."'");
		   $results=$query->row();
		   if($results)
		   {
				   return 1;
		   }
		   else
		   {
				   return 0;
		   }
	}
	public function check_username_exist($username="")
	{
		   $query=$this->db->query("select id from user_details where username='".$username."'");
		   $results=$query->row();
		   if($results)
		   {
				   return 1;
		   }
		   else
		   {
				   return 0;
		   }
	}
	public function delete_user($user_id,$role,$other_table="")
	{
		$sucess=1;
		$this->db->trans_start();
		$query=$this->db->query("update  user_details set status='Deleted' where id=".$user_id." and role='".$role."'");
		if($this->db->affected_rows()>0)
		{
			$sucess=1;
		}
		else
		{
			$sucess=0;
		}
		
		if($other_table)
		{
			$query=$this->db->query("update  ".$other_table." set status='Deleted' where user_id=".$user_id);
			if($this->db->affected_rows() >0)
			{
				$sucess=1;
			}
			else
			{
				$sucess=0;
			}
			
		}
		$this->db->trans_complete();
		echo $sucess;
		
	}



	}