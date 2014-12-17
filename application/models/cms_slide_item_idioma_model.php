<?php
Class Cms_Slide_Item_Idioma_Model extends MY_Model
{

    protected $_table = 'cms_slide_item_idioma';
    protected $primary_key = 'cms_slide_item_idioma_id';

    protected $return_type = 'array';
    protected $soft_delete = FALSE;

    protected $soft_delete_key = 'deletado';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';





    public $validate = array(
        array(
            'field' => 'titulo',
            'label' => 'Título',
            'rules' => 'required',
            'groups' => 'default'
        )

    );

    public function get_form_data(){

        $data =  array(

        );


        return $data;
    }

    public function insert_by_slide_item($cms_slide_item_id, $idiomasData){

        $data = array();

        foreach($idiomasData as $idioma_id => $idioma_data){

            $data[$idioma_id]= array(
                'cms_slide_item_id' => $cms_slide_item_id,
                'idioma_id' => $idioma_id,
                'titulo' => $idioma_data['titulo'],
                'imagem' => $idioma_data['imagem']
            );

            if(isset($idioma_data['imagem_data'])){

                $data[$idioma_id]['imagem'] = $idioma_data['imagem_data']['file_name'];

            }

            

        }
        if($data){

            $this->delete_by_slide_item($cms_slide_item_id);
            //@todo apagar imagens nao utilizadas
            $this->insert_array($data);
            return true;
        }

        return false;

    }

    public function update_by_slide_item($cms_slide_item_id, $idiomasData){



        foreach($idiomasData as $idioma_id => $idioma_data){
            $data = array(

                'titulo' => $idioma_data['titulo']

            );


            $this->update_by( array('cms_slide_item_id' => $cms_slide_item_id, 'idioma_id' => $idioma_id ), $data);

        }


    }

    function delete_by_slide_item($cms_slide_item_id){

        return $this->delete_by( array('cms_slide_item_id' => $cms_slide_item_id));

    }

    function get_by_slide_item($cms_slide_item_id){

        $data = array();

        $this->_database->where("cms_slide_item_id", $cms_slide_item_id);
        $rows = $this->get_all();



        if($rows){

            foreach($rows as $row){

                $data[$row['idioma_id']] = $row;
            }


        }

        return $data;

    }



}
