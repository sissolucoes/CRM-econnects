<?php
Class Cms_Menu_Item_Model extends MY_Model
{

    protected $_table = 'cms_menu_item';
    protected $primary_key = 'cms_menu_item_id';

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
        ),
        array(
            'field' => 'ativo',
            'label' => 'Ativo',
            'rules' => 'required',
            'groups' => 'default'
        ),
        array(
            'field' => 'cms_menu_id',
            'label' => 'Menu',
            'rules' => 'required',
            'groups' => 'default'
        )

    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' => $this->input->post('slug'),
            'ativo' => $this->input->post('ativo'),
            'cms_menu_id' => $this->input->post('cms_menu_id'),
            'cms_menu_item_parent_id' => $this->input->post('cms_menu_item_parent_id'),
            'ordem' => $this->input->post('ordem'),
            'target' => $this->input->post('target'),
            'link' => $this->input->post('link')
        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('cms_menu_item_idioma_model', 'cms_menu_item_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');


        $cms_menu_item_id =  $this->insert($data);

        $this->cms_menu_item_idioma->insert_by_menu_item($cms_menu_item_id, $idiomas);

        return $cms_menu_item_id;

    }

    public function update_form(){

        $this->load->model('cms_menu_item_idioma_model', 'cms_menu_item_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $cms_menu_item_id = $this->input->post($this->primary_key);

        $this->update( $cms_menu_item_id,  $data);

        $this->cms_menu_item_idioma->insert_by_menu_item($cms_menu_item_id, $idiomas);

    }


    function get_menu_item_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_menu_item_by_id($id){

        return $this->get($id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function set_cms_menu($cms_menu_id){

        $this->_database->where("{$this->_table}.cms_menu_id", $cms_menu_id);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'cms_menu_item_idioma';
        $prefix = '';
        $foreing_key = $this->primary_key;
        $join = 'inner';

        $fields = array(
            'titulo',
            'idioma_id'

        );

        foreach($fields as $field){

            $this->_database->select("{$with_table}.$field AS {$prefix}{$field}");
        }

        $this->_database->join($with_table, $this->_table.".{$foreing_key} = {$with_table}.{$foreing_key}", $join);

        $this->_database->select("idioma.codigo AS idioma_codigo");
        $this->_database->join('idioma', "idioma.idioma_id = {$with_table}.idioma_id", $join);

        return $this;

    }

    public function filter_idioma($idioma){

        if (is_numeric($idioma)) {

            $this->_database->where("idioma.idioma_id", $idioma);

        } else {

            $this->_database->where("idioma.codigo", $idioma);
        }

        return $this;


    }

    public function get_filhos_of($pai, $cms_menu_id){

        $this->_database->where('cms_menu_item_parent_id', $pai);
        $this->_database->where('cms_menu_id', $cms_menu_id);
        return $this->get_all();

    }


    public function get_menu_item_parents($pai, $cms_menu_id){

        $data = array();
        $pais =  $this->get_filhos_of($pai, $cms_menu_id);


        foreach($pais as $pai){

           $data[$pai['cms_menu_item_id']] = $pai;
           $data[$pai['cms_menu_item_id']]['filhos'] = $this->get_menu_item_parents($pai['cms_menu_item_id'], $cms_menu_id);

        }

        return $data;

    }


}
