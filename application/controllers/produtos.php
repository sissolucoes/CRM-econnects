<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends Site_Controller {


    public function index()
    {
        $this->load->model('produto_model', 'produto');
        $this->load->model('produto_categoria_model', 'produto_categoria');


        $produto_categorias = $this->produto_categoria
            ->set_publicados()
            ->with_idioma()
            ->set_select()
            ->set_default_order()
            ->filter_idioma($this->lang->lang())
            ->get_all();


        foreach($produto_categorias as $index => $produto_categoria){


            $produtos_pf = $this->produto
                ->set_publicados()
                ->with_idioma()
                ->set_select()
                ->filter_idioma($this->lang->lang())
                ->set_by_tipo_pessoa('PF')
                ->get_produtos_by_categoria($produto_categoria['produto_categoria_id']);

            if($produtos_pf){


                $produto_categorias[$index]['produtos_pf'] = $produtos_pf;

            }

            $produtos_pj = $this->produto
                ->set_publicados()
                ->with_idioma()
                ->set_select()
                ->filter_idioma($this->lang->lang())
                ->set_by_tipo_pessoa('PJ')
                ->get_produtos_by_categoria($produto_categoria['produto_categoria_id']);

            if($produtos_pj){

                $produto_categorias[$index]['produtos_pj'] = $produtos_pj;
            }

            /**
             * Se não houver produtos na categoria, não exibe.
             */
            if( empty($produtos_pf) && empty($produtos_pj) ){

                unset($produto_categorias[$index]);
            }


        }

        $this->template->css(app_assets_url('modulos/produtos/css/base.css',  'site'));
        $data = array();

        $data['produto_categorias'] = $produto_categorias;




        $this->template->load('site/layouts/base', "site/produtos/index", $data );

    }

    public function bom_para_voce($slug){

        $this->load->model('produto_model', 'produto');
        $this->load->model('produto_categoria_model', 'produto_categoria');

        $this->template->js(app_assets_url('modulos/produtos/js/base.js',  'site'));


        $produto = $this->produto
            ->set_publicados()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->set_by_tipo_pessoa('PF')
            ->get_produto_by_slug($slug);

        if(!$produto){
            $this->template->load('site/layouts/base', "site/paginas/not-found");
            return;
        }

        $modelo_pagina = $produto['modelo_pagina'];

        $data['produto'] = $produto;


        $categoria = $this->produto_categoria
            ->set_publicados()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->get_produto_categoria_by_id($produto['produto_categoria_id']);

        $data['categoria'] = $categoria;


        if( in_array($slug, array('viagem-turismo', 'viagem-estudo', 'viagem-negocio')) ){
            $modelo_pagina = 'produto_online_viagem';
        }

        $this->template->load('site/layouts/base', "site/produtos/modelos/{$modelo_pagina}", $data );
    }
    public function bom_para_sua_empresa($slug){


        $this->load->model('produto_model', 'produto');
        $this->load->model('produto_categoria_model', 'produto_categoria');

        $this->template->js(app_assets_url('modulos/produtos/js/base.js',  'site'));


        $produto = $this->produto
            ->set_publicados()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->set_by_tipo_pessoa('PJ')
            ->get_produto_by_slug($slug);

        if(!$produto){
            $this->template->load('site/layouts/base', "site/paginas/not-found");
            return;
        }

        $modelo_pagina = $produto['modelo_pagina'];

        $data['produto'] = $produto;


        $categoria = $this->produto_categoria
            ->set_publicados()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->get_produto_categoria_by_id($produto['produto_categoria_id']);

        $data['categoria'] = $categoria;

        if( in_array($slug, array('viagem-turismo', 'viagem-estudo', 'viagem-negocio')) ){
            $modelo_pagina = 'produto_online_viagem';
        }

        $this->template->load('site/layouts/base', "site/produtos/modelos/{$modelo_pagina}", $data );
    }

    public function dummy_form(){

        echo 'Dummy Page';
    }

}
