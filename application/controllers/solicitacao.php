<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solicitacao extends Site_Controller {


    public function index()
    {
        $this->lang->load('contato');
        $this->template->set('title', 'Solicitação');
        $data = array();



        $this->template->load('site/layouts/base', "site/solicitacao/index", $data );

    }



}
