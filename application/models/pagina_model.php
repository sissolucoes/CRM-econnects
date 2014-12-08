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

    protected $idioma_model = 'pagina_idioma';




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
            'slug' => $this->input->post('slug'),
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





}
