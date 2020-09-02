<?php
class Model_login extends CI_Model {

        public function __construct()
        {
			parent::__construct();
                $this->load->database();
        }

//----------------------Login FUNCTIONS------------------- 
    function login_user($username, $password)
    {
		
	    $sql = ("select * from actors where username='$username' and password='$password'");
	    $query = $this->db->query($sql);
		if($query->num_rows())
		{
			foreach($query->result_array() as $row)
			{
				 $id = $row['id'];
				// $token = crypt(substr( md5(rand()), 0, 7));
				 //return $id;
				 return array('status' => 200,'message' => 'Successfully login.','id' => $id);
			}
		}
		else
		{
			//return "false";
			                echo "Wrong password";
                exit();
               return array('status' => 204,'message' => 'Wrong password.');
		}
    }
	//------------------------------------------------------
	//----------------------USER FUNCTIONS------------------ 
	function user_list_view()
    {
		
		$query = $this->db->query("select * from actors order by id asc");
        /*if ($query->num_rows > 0) 
		{
            
            foreach ($query->result_array() as $row) 
			{
                
                $result[] = $row;
                
            }
            return $result;
            
        } 
		else 
		{
            return false;
        }*/
		if($query->num_rows() > 0)
		{
          return $query->result_array();
        }
		else
		{
          return 0;
        }
        
    }
	
	
	function user_list_view1()
    {
		
		$query   = $this->db->query("select * from actors order by id asc");
		//return $query;
		 return array('status' => 200,'message' => 'Successfully login.','query' => $query);
	        
    }
	
	function user_view_id($id)
    {
        $sql   = "select * from actors where id='$id'";
        $query = $this->db->query("select * from actors where id='$id'");
        return $query;
        
    }
	 
	function add_user($data)
    {
       	$insert = $this->db->insert('actors', $data);
		$result=$this->db->insert_id();
		return $result;
    } 
	
	
	function update_users($id, $data)
    {
        $this->db->where('id', $id);
        $result=$this->db->update('actors', $data);
		return $result;
    }
	
	
	function deleteuser($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('actors');
        if ($result) 
		{
            return true;
        }
		else 
		{
            return false;
        }
    }
	
	//--------------------------------------------------------
	//---------------------PRODUCT FUNCTIONS----------------
	
	function add_new_product($data)
    {
       	$insert = $this->db->insert('products', $data);
		$result=$this->db->insert_id();
		return $result;
    } 
	
	function product_list_view()
    {
		
		$query   = $this->db->query("select * from products order by product_id asc");
		return $query;
	        
    }
	
	
	function product_view_id($id)
    {
        //$sql   = "select * from products where id='$id'";
        $query = $this->db->query("select * from products where product_id='$id'");
        return $query;
        
    }
	
	
	function update_product($id, $data)
    {
        $this->db->where('product_id', $id);
        $result=$this->db->update('products', $data);
		return $result;
    }
	
	
	function deleteproduct($id)
    {
        $this->db->where('product_id', $id);
        $result = $this->db->delete('products');
        if ($result) 
		{
            return true;
        }
		else 
		{
            return false;
        }
    }
	
	//--------------------------------------------------------
	//---------------------CATEGORY FUNCTIONS----------------
	 
	function add_category($data)
    {
       	$insert = $this->db->insert('productcategory', $data);
		$result=$this->db->insert_id();
		return $result;
    } 
	
	
	function category_view_id()
	{
		$query   = $this->db->query("select * from productcategory order by cat_id asc");
		return $query;
	        
        
    }
	
	function category_updateview_id($id)
    {
        $sql   = "select * from productcategory where cat_id='$id'";
        $query = $this->db->query("select * from productcategory where cat_id='$id'");
        return $query;
        
    }
	
	
	function update_category($id, $data)
    {
        $this->db->where('cat_id', $id);
        $result=$this->db->update('productcategory', $data);
		return $result;
    }
	
	
	
	function deletecategory($id)
    {
        $this->db->where('cat_id', $id);
        $result = $this->db->delete('productcategory');
        if ($result) 
		{
            return true;
        }
		else 
		{
            return false;
        }
    }
	
	
}

?>