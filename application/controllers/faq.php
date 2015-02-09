<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends Site_Controller {


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

    public function buscar_por_categoria($categoria_id){

      $this->load->model('faq_categoria_model', 'faq_categoria');
      $this->load->model('faq_duvida_model', 'faq_duvida');

      $data = array();

      $categoria = $this->faq_categoria
          ->set_ativos()
          ->with_idioma()
          ->set_select()
          ->filter_idioma($this->lang->lang())
          ->get($categoria_id);

       $data['faq_categoria']= $categoria;

      $subCategorias =   $this->faq_categoria
            ->set_ativos()
            ->with_idioma()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->get_filhos_of($categoria_id);

       foreach($subCategorias as $index => $subCategoria){

           $subCategorias[$index]['duvidas'] = $this->faq_duvida
               ->with_idioma()
               ->set_select()
               ->filter_idioma($this->lang->lang())
               ->get_all_by_categoria_id($subCategoria['faq_categoria_id']);

       }

        $data['faq_sub_categorias'] = $subCategorias;

        $this->load->view('site/faq/row_item', $data);
    }

    public function buscar_por_texto(){

        $this->load->model('faq_categoria_model', 'faq_categoria');
        $this->load->model('faq_duvida_model', 'faq_duvida');


        $term = $this->input->post('term');

        $duvidas = $this->faq_duvida
            ->with_idioma()
            ->with_categorias()
            ->set_select()
            ->filter_idioma($this->lang->lang())
            ->buscar_by_termo($term);

        $data = array(
            'duvidas' => $duvidas
        );

        $this->load->view('site/faq/resultado_texto', $data);


    }

}
