<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_Controller extends MY_Controller
{
    protected $noLogin = true;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('language');
        $this->load->helper('url');

        $this->lang->load('core');


        $this->controller_name = strtolower(get_class($this) );


        $this->load_menu_principal();

        $this->load_menu_rodape();

        $this->load_produtos();

    }


    protected function load_menu_principal(){

        /**
         * Carrega o menu principal
         */
        $this->load->model('cms_menu_model', 'cms_menu');
        $menu_principal = $this->cms_menu->build_menu('home');
        $this->template->set('menu_principal', $menu_principal);

    }

    protected function load_menu_rodape(){

        /**
         * Carrega o menu principal
         */
        $this->load->model('cms_menu_model', 'cms_menu');
        $menu_footer = $this->cms_menu->build_menu('menu-footer');
        $this->template->set('menu_footer', $menu_footer);

    }

    protected function load_produtos(){

        $this->load->model('produto_model', 'produto');
        $this->load->model('produto_categoria_model', 'produto_categoria');

        $produto_categorias_pf = array();
        $produto_categorias_pj = array();

        $produto_categorias = $this->produto_categoria
            ->set_publicados()
            ->with_idioma()
            ->set_select()
            ->set_default_order()
            ->filter_idioma($this->lang->lang())
            ->get_all();


        foreach($produto_categorias as $produto_categoria){

            $produtos_pf = $this->produto
                ->set_publicados()
                ->with_idioma()
                ->set_select()
                ->filter_idioma($this->lang->lang())
                ->set_by_tipo_pessoa('PF')
                ->get_produtos_by_categoria($produto_categoria['produto_categoria_id']);

            if($produtos_pf){

                $produto_categorias_pf[$produto_categoria['slug']] = $produto_categoria;
                $produto_categorias_pf[$produto_categoria['slug']]['produtos'] = $produtos_pf;

            }

            $produtos_pj = $this->produto
                ->set_publicados()
                ->with_idioma()
                ->set_select()
                ->filter_idioma($this->lang->lang())
                ->set_by_tipo_pessoa('PJ')
                ->get_produtos_by_categoria($produto_categoria['produto_categoria_id']);

            if($produtos_pj){

                $produto_categorias_pj[$produto_categoria['slug']] = $produto_categoria;
                $produto_categorias_pj[$produto_categoria['slug']]['produtos'] = $produtos_pj;
            }


        }

        $this->template->set('produto_categorias_pf', $produto_categorias_pf);
        $this->template->set('produto_categorias_pj', $produto_categorias_pj);

    }
}