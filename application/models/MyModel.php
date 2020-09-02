<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function login($username,$password)
    {
		$password;
        $q  = $this->db->select('password,id')->from('users')->where('username',$username)->get()->row();
       
        if($q == ""){
            return array('status' => 204,'message' => 'Username not found.');
        } else {
             $hashed_password = $q->password;
            $id              = $q->id;
        $hashed_password ." ".$password;
        //exit;
            if ($hashed_password!='') {
               $last_login = date('Y-m-d H:i:s');
			   $token = substr( md5(rand()), 0, 7);
               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
			   //echo $expired_at;
			   //exit;
               $user=$this->db->where('id',$id)->update('users',array('last_login' => $last_login));
               $authentication=$this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
               //exit;
			   if ($authentication === FALSE){
                  
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
            } else {
                echo "Wrong password";
                exit();
               return array('status' => 204,'message' => 'Wrong password.');
            }
        }
    }

    public function logout()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
       
		if($q == "")
		{ 
			return array('status' => 401,'message' => 'Unauthorized.');
		}
		else
		{
			//echo $qw = $q->expired_at;
            if($q->expired_at < date('Y-m-d H:i:s'))
			{
				return array('status' => 401,'message' => 'Your session has been expired.');
            } 
			else 
			{
				
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id',$users_id)->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

    public function admin_all_data()
    {
        return $this->db->select('*')->from('users')->order_by('id','desc')->get()->result();
    }

    public function admin_detail_data($id)
    {
        return $this->db->select('*')->from('users')->where('id',$id)->order_by('id','desc')->get()->row();
    }

    public function admin_create_data($username,$newpass,$name)
    {
		
        $this->db->insert('users',array('username' => $username,'password' => $newpass, 'name' => $name));
        return array('status' => 200,'message' => 'Data has been created.');
    }

    public function admin_update_data($id,$name)
    {
		//echo $id;
		$updated_at = date('Y-m-d H:i:s');
        $this->db->where('id',$id)->update('users',array('name' => $name, 'updated_at' => $updated_at));
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function admin_delete_data($id)
    {
        $this->db->where('id',$id)->delete('users');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

	//------------------------------------------------------
	//-----------------------PRODUCT-------------------------------
	
	public function product_all_data()
    {
        return $this->db->select('*')->from('products')->order_by('product_id','desc')->get()->result();
    }

    public function product_detail_data($id)
    {
        return $this->db->select('*')->from('products')->where('product_id',$id)->order_by('product_id','desc')->get()->row();
    }

    public function product_create_data($productname ,$cat_id, $description, $price, $quantity , $stock, $updatedon)
    {
		
        $this->db->insert('products',array('product_name' => $productname,'cat_id' => $cat_id, 'description' => $description, 'price' => $price,'quantity' => $quantity, 'stock' => $stock, 'updatedon' => $updatedon));
        return array('status' => 200,'message' => 'Data has been created.');
    }

    public function product_update_data($id,$productname , $description, $price, $quantity , $stock)
    {
		$product_id=$id;
		$updatedon = date('Y-m-d H:i:s');
		
        $res=$this->db->where('product_id',$product_id)->update('products',array('product_name' => $productname, 'description' => $description, 'price' => $price,'quantity' => $quantity, 'stock' => $stock, 'updatedon' => $updatedon));
       
		return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function product_delete_data($id)
    {
        $this->db->where('product_id',$id)->delete('products');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

	//------------------------------------------------------
	//----------------------CATEGORY-----------------------------
	
	public function category_all_data()
    {
        return $this->db->select('*')->from('productcategory')->order_by('cat_id','desc')->get()->result();
    }

    public function category_detail_data($id)
    {
        return $this->db->select('*')->from('productcategory')->where('cat_id',$id)->order_by('cat_id','desc')->get()->row();
    }

    public function category_create_data($catname)
    {
		
        $this->db->insert('productcategory',array('cat_name' => $catname));
        return array('status' => 200,'message' => 'Data has been created.');
    }

    public function category_update_data($id,$cat_name)
    {
		$cat_id=$id;
		$updatedon = date('Y-m-d H:i:s');
		
        $res=$this->db->where('cat_id',$cat_id)->update('productcategory',array('cat_name' => $cat_name));
       
		return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function category_delete_data($id)
    {
        $this->db->where('cat_id',$id)->delete('productcategory');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }




}
