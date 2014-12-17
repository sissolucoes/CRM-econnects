<?php
Class Blog_Post_Model extends MY_Model
{

    protected $_table = 'blog_post';
    protected $primary_key = 'blog_post_id';

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
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'required',
            'groups' => 'default'
        ),
        array(
            'field' => 'publicado',
            'label' => 'Publicado',
            'rules' => 'required',
            'groups' => 'default'
        ),
        array(
            'field' => 'blog_categoria_id',
            'label' => 'Categoria',
            'rules' => 'required',
            'groups' => 'default'
        )


    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' =>  app_parse_slug($this->input->post('slug')),
            'publicado' => $this->input->post('publicado'),
            'blog_categoria_id' => $this->input->post('blog_categoria_id')
        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('blog_post_idioma_model', 'blog_post_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');


        $blog_post_id =  $this->insert($data);

        $this->blog_post_idioma->insert_by_blog_post($blog_post_id, $idiomas);

        return $blog_post_id;

    }

    public function update_form(){

        $this->load->model('blog_post_idioma_model', 'blog_post_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $blog_post_id = $this->input->post($this->primary_key);

        $this->update( $blog_post_id,  $data);

        $this->blog_post_idioma->insert_by_blog_post($blog_post_id, $idiomas);

    }


    function get_blog_post_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_blog_post_by_id($id){

        return $this->get($id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'blog_post_idioma';
        $prefix = '';
        $foreing_key = $this->primary_key;
        $join = 'inner';

        $fields = array(
            'titulo'


        );

        foreach($fields as $field){

            $this->_database->select("{$with_table}.$field AS {$prefix}{$field}");
        }

        $this->_database->join($with_table, $this->_table.".{$foreing_key} = {$with_table}.{$foreing_key}", $join);

        $this->_database->select("idioma.codigo AS idioma_codigo");
        $this->_database->join('idioma', "idioma.idioma_id = {$with_table}.idioma_id", $join);

        return $this;

    }

    public function filter_idioma($idioma){

        if (is_numeric($idioma)) {

            $this->_database->where("idioma.idioma_id", $idioma);

        } else {

            $this->_database->where("idioma.codigo", $idioma);
        }

        return $this;


    }





}
