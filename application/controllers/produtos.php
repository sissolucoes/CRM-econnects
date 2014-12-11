<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends Site_Controller {


    public function index()
    {
        $data = array();
        $this->template->load('site/layouts/base', "site/produtos/index", $data );

    }

}
