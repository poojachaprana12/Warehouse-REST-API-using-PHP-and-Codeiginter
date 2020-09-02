<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productapi extends CI_Controller {

	function __construct()
    {
        
        // Call the Model constructor
        parent::__construct();
        $this->load->model('MyModel');
		$this->load->database();
        $this->load->helper('Json_output_helper');
		
		
		require(APPPATH.'/libraries/REST_Controller.php');
		
    }
	

	public function product()
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
					$resp = $this->MyModel->product_all_data();
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
			if($check_auth_client == true)
			{
		        $response = $this->MyModel->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModel->product_detail_data($id);
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
		        if($response['status'] == 200){
					$params = $_REQUEST;
					$productname = $params['product_name'];
					$cat_id = $params['cat_id'];
					$description = $params['description'];
					$price = $params['price'];
					$quantity = $params['quantity'];
					$stock = $params['stock'];
					$updatedon = date('Y-m-d H:i:s');
					
					if ($productname == "" || $cat_id == "" || $description == "" || $price == "" || $quantity == "" || $stock == "") {
						
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'Username,Password,Name can\'t empty');
					} else 
					{
						
		        		$resp = $this->MyModel->product_create_data($productname ,$cat_id, $description,$price, $quantity , $stock, $updatedon);
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
		        if($response['status'] == 200){
					
					$productname = $_REQUEST['product_name'];
					$description = $_REQUEST['description'];
					$price = $_REQUEST['price'];
					$quantity = $_REQUEST['quantity'];
					$stock = $_REQUEST['stock'];
					
					
						
		        		$resp = $this->MyModel->product_update_data($id, $productname,$description,$price, $quantity , $stock);
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
		        	$resp = $this->MyModel->product_delete_data($id);
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
