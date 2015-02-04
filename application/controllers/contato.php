<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends Site_Controller {


    public function index()
    {
        $this->lang->load('contato');
        $this->template->set('title', 'Contato');
        $data = array();



        $this->template->load('site/layouts/base', "site/contato/index", $data );

    }



}
