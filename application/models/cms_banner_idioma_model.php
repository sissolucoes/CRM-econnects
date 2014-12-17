<?php
Class Cms_Banner_Idioma_Model extends MY_Model
{

    protected $_table = 'cms_banner_idioma';
    protected $primary_key = 'cms_banner_idioma_id';

    protected $return_type = 'array';
    protected $soft_delete = FALSE;

    protected $soft_delete_key = 'deletado';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';





    public $validate = array(
        array(
            'field' => 'conteudo',
            'label' => 'Conteudo',
            'rules' => 'required',
            'groups' => 'default'
        )

    );

    public function get_form_data(){

        $data =  array(

        );


        return $data;
    }

    public function insert_by_banner($cms_banner_id, $idiomasData){

        $data = array();

        foreach($idiomasData as $idioma_id => $idioma_data){
            $data[]= array(
                'cms_banner_id' => $cms_banner_id,
                'idioma_id' => $idioma_id,
                'conteudo' => $idioma_data['conteudo']

            );

        }


        if($data){
           
            $this->delete_by_banner($cms_banner_id);
            $this->insert_array($data);
            return true;
        }

        return false;

    }

    public function update_by_banner($cms_banner_id, $idiomasData){



        foreach($idiomasData as $idioma_id => $idioma_data){
            $data = array(


                'conteudo' => $idioma_data['conteudo']
            );


            $this->update_by( array('cms_banner_id' => $cms_banner_id, 'idioma_id' => $idioma_id ), $data);

        }


    }

    function delete_by_banner($cms_banner_id){

        return $this->delete_by( array('cms_banner_id' => $cms_banner_id));

    }

    function get_by_banner($pagina_id){

        $data = array();

        $this->_database->where("cms_banner_id", $pagina_id);
        $rows = $this->get_all();



        if($rows){

            foreach($rows as $row){

                $data[$row['idioma_id']] = $row;
            }


        }

        return $data;

    }



}
