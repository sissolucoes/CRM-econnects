<?php
Class Cms_Menu_Model extends MY_Model
{

    protected $_table = 'cms_menu';
    protected $primary_key = 'cms_menu_id';

    protected $return_type = 'array';
    protected $soft_delete = TRUE;

    protected $soft_delete_key = 'deletado';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';


    public $validate = array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required',
            'groups' => 'default'
        ),
        array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'required',
            'groups' => 'default'
        )

    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' => app_parse_slug($this->input->post('slug')),
        );


        return $data;
    }

    function get_by_slug($slug){

        return $this->get_by('slug', $slug);

    }

    public function build_menu($slug){

        $menu = $this->get_by_slug($slug);

        $this->load->model('cms_menu_item_model', 'cms_menu_item');

        $itens = $this->cms_menu_item
            ->with_idioma()
            ->filter_idioma($this->lang->lang())
            ->set_default_order()
            ->get_menu_item_parents(0, $menu[$this->primary_key] );


        return $itens;
    }

    public function get_menu_item_url($menu){




        $url = '';

        if($menu){


            $url =  str_replace('{{base_url}}', site_url(''), $menu );


        }

        return $url;

    }

}
