<?php
Class Blog_Categoria_Idioma_Model extends MY_Model
{

    protected $_table = 'blog_categoria_idioma';
    protected $primary_key = 'blog_categoria_idioma_id';

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

    public function insert_by_blog_categoria($blog_categoria_id, $idiomasData){

        $data = array();

        foreach($idiomasData as $idioma_id => $idioma_data){
            $data[]= array(
                'blog_categoria_id' => $blog_categoria_id,
                'idioma_id' => $idioma_id,
                'titulo' => $idioma_data['titulo']

            );

        }
        if($data){

            $this->delete_by_blog_categoria($blog_categoria_id);
            $this->insert_array($data);
            return true;
        }

        return false;

    }

    public function update_by_blog_categoria($blog_categoria_id, $idiomasData){



        foreach($idiomasData as $idioma_id => $idioma_data){
            $data = array(

                'titulo' => $idioma_data['titulo']

            );


            $this->update_by( array('blog_categoria_id' => $blog_categoria_id, 'idioma_id' => $idioma_id ), $data);

        }


    }

    function delete_by_blog_categoria($blog_categoria_id){

        return $this->delete_by( array('blog_categoria_id' => $blog_categoria_id));

    }

    function get_by_blog_categoria($blog_categoria_id){

        $data = array();

        $this->_database->where("blog_categoria_id", $blog_categoria_id);
        $rows = $this->get_all();

        if($rows){

            foreach($rows as $row){

                $data[$row['idioma_id']] = $row;
            }


        }

        return $data;

    }



}
