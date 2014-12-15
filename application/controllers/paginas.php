<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Paginas
 *
 * @property Pagina_Model $pagina
 */
class Paginas extends Public_Controller
{


    function __construct()
    {

        parent::__construct();
        $this->load->model('pagina_model', 'pagina');

    }



    public function _remap($method, $params = array())
    {

        $page = false;
        $data = array();

        /**
         * @todo verificar se tem/não o idioma na url
         * @todo pegar sempre o ultimo segmento, devido a submenus
         */

        $last = $this->uri->total_segments();
        $slug = $this->uri->segment($last);

        if ($slug) {



            if (is_numeric($slug)) {

                $id = (int) $slug;
                $page = $this->pagina
                    ->set_ativos()
                    ->with_idioma()
                    ->set_select()
                    ->filter_idioma($this->lang->lang())
                    ->get_pagina_by_id($id);

            } else {

                $page = $this->pagina
                    ->set_ativos()
                    ->with_idioma()
                    ->set_select()
                    ->filter_idioma($this->lang->lang())
                    ->get_pagina_by_slug($slug);

            }

        }

        

        if ($page) {

            $data['pagina'] = $page;

            //var_dump($page);


            $slug = $page['slug'];

            $view_path = APPPATH.'views/site/paginas/';
            $view_name = 'default';

            if(file_exists("$view_path{$slug}.php")){
                $view_name = $slug;
            }
            $this->template->set('meta_keywords', $page['meta_keywords']);
            $this->template->set('meta_description', $page['meta_description']);
            $this->template->set('title', $page['nome']);

            $this->template->load('site/layouts/base', "site/paginas/{$view_name}", $data );

        }else {

            $this->template->load('site/layouts/base', "site/paginas/not-found", $data );
        }


    }


}
