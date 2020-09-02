<?php
   
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class Product extends REST_Controller {
    
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
	
	public function user_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("users", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("users")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
	
	
	public function user_post()
    {
        $input = $this->input->post();
        $this->db->insert('users',$input);
     
        $this->response(['User created successfully.'], REST_Controller::HTTP_OK);
    } 
	
	
	public function user_put($id)
    {
		$input = $this->put();
		
        $this->db->update('users', $input, array('id'=>$id));
     
        $this->response(['users updated successfully.'], REST_Controller::HTTP_OK);
    }
	
	
	public function user_delete($id)
    {
        $this->db->delete('users', array('id'=>$id));
       
        $this->response(['Users deleted successfully.'], REST_Controller::HTTP_OK);
    }
	
	
      
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
	
	
	
    public function product_post()
    {
        $input = $this->input->post();
        $this->db->insert('products',$input);
     
        $this->response(['Product created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function product_put($id)
    {
        $input = $this->put();
        $this->db->update('products', $input, array('product_id'=>$id));
     
        $this->response(['Product updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function product_delete($id)
    {
        $this->db->delete('products', array('product_id'=>$id));
       
        $this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK);
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
	
	 public function category_post()
    {
        $input = $this->input->post();
        $this->db->insert('productcategory',$input);
     
        $this->response(['Category created successfully.'], REST_Controller::HTTP_OK);
    } 
     
	 public function category_put($id)
    {
        $input = $this->put();
        $this->db->update('productcategory', $input, array('cat_id'=>$id));
     
        $this->response(['Category updated successfully.'], REST_Controller::HTTP_OK);
    }
	
	
	 public function category_delete($id)
    {
        $this->db->delete('productcategory', array('cat_id'=>$id));
       
        $this->response(['Deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}