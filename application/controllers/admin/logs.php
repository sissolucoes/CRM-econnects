<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends Admin_Controller {


	public function index()
	{
        $data = array();
        $this->template->load('admin/layouts/base', "admin/logs/index", $data );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */