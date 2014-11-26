<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Usuario_Acl_Tipo_Model
 *
 */
class Usuario_Acl_Tipo_Model extends MY_Model {


    protected $_table = 'usuario_acl_tipo';
    protected $primary_key = 'usuario_acl_tipo_id';

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
        )

    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
        );


        return $data;
    }

}