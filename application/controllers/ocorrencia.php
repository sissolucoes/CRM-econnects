<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ocorrencia extends Site_Controller {


    public function index()
    {
        $this->lang->load('contato');
        $this->template->set('title', 'Ocorrência');
        $data = array();



        $this->template->load('site/layouts/base', "site/ocorrencia/index", $data );

    }



}
