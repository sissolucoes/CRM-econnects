<?php
Class Idioma_Model extends MY_Model
{

    protected $_table = 'idioma';
    protected $primary_key = 'idioma_id';

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
            'field' => 'codigo',
            'label' => 'Código',
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
            'codigo' => $this->input->post('codigo'),
            'ativo' => $this->input->post('ativo')
        );


        return $data;
    }



    public function filter_ativos(){

        $this->_database->where($this->_table. '.ativo', 1);

        return $this;

    }

}
