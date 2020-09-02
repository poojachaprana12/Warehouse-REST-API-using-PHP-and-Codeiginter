<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoryapi extends CI_Controller {

	function __construct()
    {
        
        // Call the Model constructor
        parent::__construct();
        $this->load->model('MyModel');
		$this->load->database();
        $this->load->helper('Json_output_helper');
		
		
		require(APPPATH.'/libraries/REST_Controller.php');
		
    }
	

	public function category()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
				$response = $this->MyModel->auth();
				if($response['status'] == 200)
				{ 
					$resp = $this->MyModel->category_all_data();
	    			json_output($response['status'],$resp);
		        }
				else
				{
					$resp ="Unauthorized";
					json_output($response['status'], $resp);
				}
				
			}
		}
	}

	public function detail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModel->category_detail_data($id);
					json_output($response['status'],$resp);
		        }
				else
				{
					$resp ="Unauthorized";
					json_output($response['status'], $resp);
				}
			}
			
		}
	}

	public function create()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        $respStatus = $response['status'];
		        if($response['status'] == 200)
				{
					$params = $_REQUEST;
					$cat_name = $params['cat_name'];
					
					
					if ($cat_name == "") {
						
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'Name can\'t empty');
					} 
					else 
					{
						
		        		$resp = $this->MyModel->category_create_data($cat_name);
					}
					json_output($respStatus,$resp);
		        }
				else
				{
					$resp ="Unauthorized";
					json_output($response['status'], $resp);
				}
			}
		}
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		//if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
				
		        $response = $this->MyModel->auth();
		        $respStatus = $response['status'];
		        if($response['status'] == 200)
				{
					
					$cat_name = $_REQUEST['cat_name'];
					
					
						
		        		$resp = $this->MyModel->category_update_data($id, $cat_name);
					json_output($respStatus,$resp);
		        }
				else
				{
					$resp ="Unauthorized";
					json_output($response['status'], $resp);
				}
			}
			
		}
	}

	public function delete($id)
	{
		
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModel->category_delete_data($id);
					json_output($response['status'],$resp);
		        }
			
				else
				{
					$resp ="Unauthorized";
					json_output($response['status'], $resp);
				}
			}
			}
	}

}
