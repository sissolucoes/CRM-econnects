<?php
Class Faq_Duvida_Idioma_Model extends MY_Model
{

    protected $_table = 'faq_duvida_idioma';
    protected $primary_key = 'faq_duvida_idioma_id';

    protected $return_type = 'array';
    protected $soft_delete = FALSE;

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

        );


        return $data;
    }

    public function insert_by_faq_duvida($faq_duvida_id, $idiomasData){

        $data = array();

        foreach($idiomasData as $idioma_id => $idioma_data){
            $data[]= array(
                'faq_duvida_id' => $faq_duvida_id,
                'idioma_id' => $idioma_id,
                'pergunta' => $idioma_data['pergunta'],
                'resposta' => $idioma_data['resposta']

            );

        }
        if($data){

            $this->delete_by_faq_duvida($faq_duvida_id);
            $this->insert_array($data);
            return true;
        }

        return false;

    }

    public function update_by_faq_duvida($faq_duvida_id, $idiomasData){



        foreach($idiomasData as $idioma_id => $idioma_data){
            $data = array(

                'titulo' => $idioma_data['titulo']

            );


            $this->update_by( array('faq_duvida_id' => $faq_duvida_id, 'idioma_id' => $idioma_id ), $data);

        }


    }

    function delete_by_faq_duvida($faq_duvida_id){

        return $this->delete_by( array('faq_duvida_id' => $faq_duvida_id));

    }

    function get_by_faq_duvida($faq_duvida_id){

        $data = array();

        $this->_database->where("faq_duvida_id", $faq_duvida_id);
        $rows = $this->get_all();

        if($rows){

            foreach($rows as $row){

                $data[$row['idioma_id']] = $row;
            }


        }

        return $data;

    }



}
