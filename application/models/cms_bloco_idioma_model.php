<?php
Class Cms_Bloco_Idioma_Model extends MY_Model
{

    protected $_table = 'cms_bloco_idioma';
    protected $primary_key = 'cms_bloco_idioma_id';

    protected $return_type = 'array';
    protected $soft_delete = FALSE;

    protected $soft_delete_key = 'deletado';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';





    public $validate = array(


    );

    public function get_form_data(){

        $data =  array(

        );


        return $data;
    }

    public function insert_by_bloco($cms_bloco_id, $idiomasData){

        $data = array();

        foreach($idiomasData as $idioma_id => $idioma_data){
            $data[]= array(
                'cms_bloco_id' => $cms_bloco_id,
                'idioma_id' => $idioma_id,
                'titulo' => $idioma_data['titulo'],
                'subtitulo' => $idioma_data['subtitulo'],
                'conteudo' => $idioma_data['conteudo']

            );

        }
        if($data){

            $this->delete_by_bloco($cms_bloco_id);
            $this->insert_array($data);
            return true;
        }

        return false;

    }

    public function update_by_bloco($cms_bloco_id, $idiomasData){



        foreach($idiomasData as $idioma_id => $idioma_data){
            $data = array(

                'titulo' => $idioma_data['titulo'],
                'conteudo' => $idioma_data['conteudo'],
                'subtitulo' => $idioma_data['subtitulo'],
            );


            $this->update_by( array('cms_bloco_id' => $cms_bloco_id, 'idioma_id' => $idioma_id ), $data);

        }


    }

    function delete_by_bloco($cms_bloco_id){

        return $this->delete_by( array('cms_bloco_id' => $cms_bloco_id));

    }

    function get_by_bloco($pagina_id){

        $data = array();

        $this->_database->where("cms_bloco_id", $pagina_id);
        $rows = $this->get_all();



        if($rows){

            foreach($rows as $row){

                $data[$row['idioma_id']] = $row;
            }


        }

        return $data;

    }



}
