<?php
   
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class Client extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
	   
	   
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	
	
	
	
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	
	public function product_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("products", ['product_id' => $id])->row_array();
        }else{
            $data = $this->db->get("products")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
	
	
	
	public function category_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("productcategory", ['cat_id' => $id])->row_array();
        }else{
            $data = $this->db->get("productcategory")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
	

}