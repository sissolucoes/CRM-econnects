<?php
Class Pagina_Model extends MY_Model
{

    protected $_table = 'pagina';
    protected $primary_key = 'pagina_id';

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
        )

    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' => app_parse_slug($this->input->post('slug')),
            'ativo' => $this->input->post('ativo'),
            'pagina_parent_id' => $this->input->post('pagina_parent_id')
        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('pagina_idioma_model', 'pagina_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');


        $pagina_id =  $this->insert($data);

        $this->pagina_idioma->insert_by_pagina($pagina_id, $idiomas);

        return $pagina_id;

    }

    public function update_form(){

        $this->load->model('pagina_idioma_model', 'pagina_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $pagina_id = $this->input->post($this->primary_key);

        $this->update( $pagina_id,  $data);

        $this->pagina_idioma->insert_by_pagina($pagina_id, $idiomas);

    }


    function get_pagina_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_pagina_by_id($id){

        return $this->get($id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'pagina_idioma';
        $prefix = '';
        $foreing_key = $this->primary_key;
        $join = 'inner';

        $fields = array(
            'titulo',
            'conteudo',
            'meta_description',
            'meta_keywords',
            'idioma_id',
            'subtitulo'

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

    public function get_filhos_of($pai){

        $this->_database->where('pagina_parent_id', $pai);
        return $this->get_all();

    }


    public function get_parents($pai){

        $data = array();
        $pais =  $this->get_filhos_of($pai);


        foreach($pais as $pai){

            $data[$pai[$this->primary_key]] = $pai;
            $data[$pai[$this->primary_key]]['filhos'] = $this->get_parents($pai[$this->primary_key]);

        }

        return $data;

    }


}
