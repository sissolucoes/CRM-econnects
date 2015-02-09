<?php
Class Produto_Idioma_Model extends MY_Model
{

    protected $_table = 'produto_idioma';
    protected $primary_key = 'produto_idioma_id';

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

    public function insert_by_produto($produto_id, $idiomasData){

        $data = array();

        foreach($idiomasData as $idioma_id => $idioma_data){
            $data[]= array(
                'produto_id' => $produto_id,
                'idioma_id' => $idioma_id,
                'titulo' => $idioma_data['titulo'],
                'conteudo' => $idioma_data['conteudo'],
                'meta_description' => $idioma_data['meta_description'],
                'meta_keywords' => $idioma_data['meta_keywords'],
                'resumo' => $idioma_data['resumo']

            );

        }
        if($data){

            $this->delete_by_produto($produto_id);
            $this->insert_array($data);
            return true;
        }

        return false;

    }

    public function update_by_produto($produto_id, $idiomasData){



        foreach($idiomasData as $idioma_id => $idioma_data){
            $data = array(

                'titulo' => $idioma_data['titulo'],
                'conteudo' => $idioma_data['conteudo'],


            );


            $this->update_by( array('produto_id' => $produto_id, 'idioma_id' => $idioma_id ), $data);

        }


    }

    function delete_by_produto($produto_id){

        return $this->delete_by( array('produto_id' => $produto_id));

    }

    function get_by_produto($produto_id){

        $data = array();

        $this->_database->where("produto_id", $produto_id);
        $rows = $this->get_all();

        if($rows){

            foreach($rows as $row){

                $data[$row['idioma_id']] = $row;
            }


        }

        return $data;

    }



}
