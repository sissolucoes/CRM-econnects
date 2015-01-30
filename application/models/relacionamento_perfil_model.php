<?php
Class Relacionamento_Perfil_Model extends MY_Model
{

    protected $_table = 'relacionamento_perfil';
    protected $primary_key = 'relacionamento_perfil_id';

    protected $return_type = 'array';
    protected $soft_delete = TRUE;

    protected $soft_delete_key = 'deletado';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';


    public $validate = array(
        array(
            'field' => 'tipo_pessoa',
            'label' => 'Tipo de Pessoa',
            'rules' => 'required',
            'groups' => 'default, pf, pj'
        ),
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required',
            'groups' => 'pf'
        ),
        array(
            'field' => 'cpf',
            'label' => 'CPF',
            'rules' => 'required',
            'groups' => 'pf'
        ),
        array(
            'field' => 'nome_fantasia',
            'label' => 'Nome Fantasia',
            'rules' => 'required',
            'groups' => 'pj'
        ),
        array(
            'field' => 'cnpj',
            'label' => 'CNPJ',
            'rules' => 'required',
            'groups' => 'pj'
        )

    );

    public function get_form_data(){

        $data =  array(
            'tipo_pessoa' => $this->input->post('tipo_pessoa'),
            'ativo' => $this->input->post('ativo'),
            'relacionamento_usuario_id' => $this->input->post('relacionamento_usuario_id'),

        );
        $tipo_pessoa = $this->input->post('tipo_pessoa');

        if($tipo_pessoa == 'PF'){

            $data['nome'] =  $this->input->post('nome');
            $data['cpf'] =  $this->input->post('cpf');

        }elseif($tipo_pessoa == 'PJ'){

            $data['nome_fantasia'] =  $this->input->post('nome_fantasia');
            $data['cnpj'] =  $this->input->post('cnpj');
        }


        return $data;
    }


    public function filter_by_usuario($usuario_id){

        $this->_database->where('relacionamento_usuario_id', $usuario_id);
        return $this;

    }


}
