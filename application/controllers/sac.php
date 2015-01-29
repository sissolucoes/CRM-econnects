<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sac extends Site_Controller {


    public function index()
    {
        $this->load->model('faq_categoria_model', 'faq_categoria');

        $data = array();


        $data['faq_categorias'] = $this->faq_categoria
            ->set_ativos()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->get_filhos_of(0);


        $this->template->load('site/layouts/base', "site/sac/index", $data );

    }



}
