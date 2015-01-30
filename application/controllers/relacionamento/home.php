<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Site_Controller {




	public function index()
	{


        $data = array();

        $this->template->load('relacionamento/layouts/base', "relacionamento/login/index", $data );

    }


}
