<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class DF_Controller extends CI_Controller 
{
	protected $debug = true;

    public function __construct()
    {
        parent::__construct();
        if($this->debug)
        {
        	$this->set_debugging();
        }
        $this->validate_session();
    }

    private function set_debugging()
    {
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
    }

    private function validate_session()
    {
    	//Validate if user has a session
    	if($this->session->userdata('userIsLoggedIn'))
    	{
    		//User data exists.
    	}
    	else//User has no session
    	{
    		//Initialize user session and set logged in flag.
    		$userData = array
    		(
    			'userIsLoggedIn' => TRUE
    		);
    	}
    }
}