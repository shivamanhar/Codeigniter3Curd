<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form','url'));
		$this->load->library(array('tank_auth','Datatables','form_validation'));
                $this->load->model('User_model');
                $this->lang->load('tank_auth');
	}

	function index()
	{
		$data = $this->verify_for_direct_request();
                $this->load->view('user/UserList');
	}
        
        
        
        function get_user_list()
        {
             $this->verify_for_ajax_request();
             $this->datatables->select('username,email,activated,last_login,created,id')
                   ->from('users');
 
             echo $this->datatables->generate();
        }
        
          public function view_user($user_id)
    {
        $this->verify_for_ajax_request();
        $data["details"] = $this->User_model->view_user($user_id);
        $this->load->view('user/view_user', $data);
    }
        
        public function ban_user()
    {
       
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $this->form_validation->set_rules('ban_reason', 'Ban Reason', 'trim|required|xss_clean');
        
        if ($this->form_validation->run()) { // validation ok
        
        $is_ban = $this->User_model->ban_user();
        if ($is_ban) {
            $result["status"] = 1;
            $result["message"] = $this->lang->line('user_ban_success');
        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
        }

       
        }
        else
        {
            $result["status"] = 0;
            $result["message"] = validation_errors();
        }
       
         echo json_encode($result);
        die();
    }
    
    public function un_ban_user($user_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $is_un_ban = $this->User_model->un_ban_user($user_id);
        if ($is_un_ban) {
            $result["status"] = 1;
            $result["message"] = $this->lang->line('user_un_ban_success');
        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
        }

        echo json_encode($result);
        die();
    }
    
    
     /* * Verify if user is logged in and is admin (for direct requests)
     * 
     **/
    private function verify_for_direct_request()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
            die();
        }
        return $this->session->all_userdata();
    }


    /**
     * Verify if user is logged in and is admin (for ajax requests)
     * 
     **/
    private function verify_for_ajax_request()
    {
        if (!$this->tank_auth->is_logged_in()) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
        }
   }
        
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */