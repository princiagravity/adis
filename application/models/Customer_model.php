<?php 
class Customer_model extends CI_Model{	

	public function __construct(){ 
		$this->load->database();
	}
	public function is_user_loggedin($role_array)
 {
         if($this->session->userdata('user_id') && in_array($_SESSION['userdata']['role'],$role_array))
         {

                return 1;
         }
         else
         {
                 return 0;
         }
 }
 public function check_user_exist($username,$password)
{
$sucess=1;        
$query=$this->db->query("select id,username,mob_no,display_name,email_id,role from user_details where (username='$username' OR email_id='$username')  and password='$password' and status='Active'");
$result=$query->row();
if($result)
{
        $userdata=array(
                'user_id'=>$result->id,
                'username'=>$result->username,
                'display_name'=>$result->display_name,
                'email_id'=>$result->email_id,
                'mob_no'=>$result->mob_no,
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
public function check_username_exist($username)
{
$sucess=1;        
$query=$this->db->query("select username from user_details where username='$username'");
$result=$query->row();
if($result)
{
      
        $sucess=1;
}
else
{
        $sucess=0;
}

return $sucess;

}
public function check_referrer_exists($mobile)
{
        $result=array();        
        $query=$this->db->query("select mob_no,display_name,id from user_details where mob_no='$mobile'");
        $result=$query->row();
        return $result;
}
public function get_referral_details($ref_id)
{
        $ref_details=array();        
        $ref_details=$this->db->query("select display_name,user_id,mobile from user_add_details where referrer_id=$ref_id")->result();
        return $ref_details;
}
public function insert_user($data=array())
{
        $result= $this->db->insert('user_details',$data);
        return $this->db->insert_id();
}
public function insert_user_additional_data($data=array())
{
        $result= $this->db->insert('user_add_details',$data);
        return $this->db->insert_id();
}
public function update_user_additional_data($data=array())
{
        $this->db->where('user_id', $data['user_id']);
        $result= $this->db->update('user_add_details',$data);
        if($this->db->affected_rows() >= 0)
        return 1;
        else
        return 0;
}
public function update_user($data=array())
{
        $success=0;
        $this->db->where('id', $data['id']);
        $result= $this->db->update('user_details',$data);
        $this->db->where('user_id', $data['id']);
        if($this->db->affected_rows() >= 0)
        {$success=1;}
        $result= $this->db->update('user_add_details',$data);
        if($this->db->affected_rows() >= 0)
        {$success=1;}
        return $success;
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
        $query   = $this->db->query("SELECT id,name FROM area_master where status !='Deleted'");
        $results = $query->result();
        foreach ($results as $row)
        {
        $data[$row->id]=$row->name;
        }
        return $data;

 }

public function get_single_product($prod_id)
{
      
        $query   = $this->db->query("SELECT * from product_details where id=$prod_id and status !='Deleted' ");
        $result = $query->row();
        return $result;   
}



public function get_user_details($user_id="")
{
        $query   = $this->db->query("SELECT * from user_add_details where user_id=$user_id");
        $result = $query->result();
        return $result;  

}


public function check_user_email_exist($email="")
 {
        $query=$this->db->query("select id,email_id,display_name from user_details where email_id='".$email."' and status='Active'");
        $results=$query->row();
        if($results)
        {
                return $results;
        }
        else
        {
                return 0;
        }
 }

 public function update_password($data="")
 {
         $result="";
        if($data)
        {
                $this->db->where(array('email_id'=> $data['email']));
                $result= $this->db->update('user_details',array('password'=>md5($data['password'])));

        }
        return $this->db->affected_rows();
 }
 
 public function get_single_customer($user_id,$role="")
 {

        $where=" user_id=".$user_id." and role='".$role."'";
     
        $query=$this->db->query("select * from user_add_details where $where");
        $results=$query->row();
        if($results)
        {
                return $results;
        }
        else
        {
                return 0;
        }
 }

 public function update_customer($data=array())
 {
         $this->db->where('id', $data['id']);
         $result= $this->db->update('customer_details',$data);
         return $this->db->affected_rows();
 }

 public function get_area_list()
 {
         $query=$this->db->query("SELECT id,name from area_master where status !='Deleted'");
         $data = $query->result();
         return $data;
 }

 public function get_profile_details($user_id,$role)
 { 
      
        $query=$this->db->query("SELECT CONCAT( customer_details.first_name, ' ', customer_details.last_name ) AS name,customer_details.*,user_details.username,user_details.email_id,user_details.id as user_id from customer_details join user_details on user_details.id=customer_details.user_id  where customer_details.status !='Deleted' and user_details.status='Active' and customer_details.user_id=".$user_id);
        
        $data = $query->result();
        return $data;

 }
 
}