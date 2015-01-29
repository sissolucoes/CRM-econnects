<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sac extends Site_Controller {


    public function index()
    {
        $this->load->model('sac_categoria_model', 'sac_categoria');

        $data = array();


        $data['sac_categorias'] = $this->sac_categoria
            ->set_ativos()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->get_filhos_of(0);


        $this->template->load('site/layouts/base', "site/sac/index", $data );

    }

    public function buscar_por_categoria(){


    }

    public function buscar_por_texto(){


    }

}
