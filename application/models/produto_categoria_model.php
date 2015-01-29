<?php
Class Produto_Categoria_Model extends MY_Model
{

    protected $_table = 'produto_categoria';
    protected $primary_key = 'produto_categoria_id';

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
        )

    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' => app_parse_slug($this->input->post('slug')),
            'publicado' => $this->input->post('publicado'),
            'css_class_icone' => $this->input->post('css_class_icone'),
            'ordem' => $this->input->post('ordem')

        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('produto_categoria_idioma_model', 'produto_categoria_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');


        $produto_categoria_id =  $this->insert($data);

        $this->produto_categoria_idioma->insert_by_produto_categoria($produto_categoria_id, $idiomas);

        return $produto_categoria_id;

    }

    public function update_form(){

        $this->load->model('produto_categoria_idioma_model', 'produto_categoria_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $produto_categoria_id = $this->input->post($this->primary_key);

        $this->update( $produto_categoria_id,  $data);

        $this->produto_categoria_idioma->insert_by_produto_categoria($produto_categoria_id, $idiomas);

    }


    function get_produto_categoria_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_produto_categoria_by_id($id){

        return $this->get_by("{$this->_table}.{$this->primary_key}", $id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'produto_categoria_idioma';
        $prefix = '';
        $foreing_key = $this->primary_key;
        $join = 'inner';

        $fields = array(
            'titulo',
            'descricao'


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



    public function set_publicados(){

        $this->_database->where("{$this->_table}.publicado", 1);

        return $this;
    }

    public function filter_from_input(){

        if($this->input->get('filter')){

            $filters = $this->input->get('filter');

            if(isset($filters['nome']) && $filters['nome'] != ''){

                $nome = $filters['nome'];
                $this->_database->where("{$this->_table}.nome", $nome);
            }

        }
        return $this;

    }


}
