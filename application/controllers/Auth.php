<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   
class Auth extends CI_Controller {
	
	function __construct()
    {
        
        // Call the Model constructor
        parent::__construct();
        $this->load->model('MyModel');
		$this->load->database();
        $this->load->helper('Json_output_helper');
		
		
		require(APPPATH.'/libraries/REST_Controller.php');
		
    }
	
	
	
	

	public function login()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$check_auth_client = $this->MyModel->check_auth_client();
			
			if($check_auth_client == true){
				$params = $_REQUEST;
		        
		        $username = $params['username'];
		        $password = $params['password'];

		        	
		        $response = $this->MyModel->login($username,$password);
				//echo $response;
				json_output($response['status'],$response);
			}
		}
	}

	public function logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->logout();
				json_output($response['status'],$response);
			}
		}
	}
	
	
	
	
}
