<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Site_Controller {


	public function index()
	{
        $this->load->model('produto_model', 'produto');
        $this->load->model('produto_categoria_model', 'produto_categoria');
        $this->load->model('cms_slide_model', 'cms_slide');
        $this->load->model('cms_slide_item_model', 'cms_slide_item');

        $data = array();

        /**
         * Inicio alteração
         */

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

        $data['produto_categorias_pf'] = $produto_categorias_pf;
        $data['produto_categorias_pj'] = $produto_categorias_pj;


        $slide_home = $this->cms_slide->get_by_slug('home-principal');

        if($slide_home){

            $slide_home_itens = $this->cms_slide_item
                ->set_cms_slide($slide_home['cms_slide_id'])
                ->set_ativos()
                ->with_idioma()
                ->filter_idioma($this->lang->lang())
                ->get_all();

            if($slide_home_itens){

                $slide_home['itens'] = $slide_home_itens;
            }else {

                $slide_home['itens'] = array();
            }


        }

        $data['slide_home_principal'] = $slide_home;



        $slide_home_produtos = $this->cms_slide->get_by_slug('home-produtos');



        if($slide_home_produtos){

            $slide_home_produtos_itens = $this->cms_slide_item
                ->set_cms_slide($slide_home_produtos['cms_slide_id'])
                ->set_ativos()
                ->with_idioma()
                ->filter_idioma($this->lang->lang())
                ->get_all();

            if($slide_home_produtos_itens){

                $slide_home_produtos['itens'] = $slide_home_produtos_itens;
            }else {

                $slide_home_produtos['itens'] = array();
            }


        }

        $data['slide_home_produtos'] = $slide_home_produtos;



        $this->lang->load('home');
        $this->template->load('site/layouts/base', "site/home/index", $data );
	}
}
