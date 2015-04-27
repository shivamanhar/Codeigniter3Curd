<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library(array('tank_auth','Datatables'));
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