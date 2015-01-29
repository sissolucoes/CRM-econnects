<?php
Class Faq_Duvida_Model extends MY_Model
{

    protected $_table = 'faq_duvida';
    protected $primary_key = 'faq_duvida_id';

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
            'field' => 'ativo',
            'label' => 'Ativo',
            'rules' => 'required',
            'groups' => 'default'
        ),
        array(
            'field' => 'faq_categoria_id',
            'label' => 'Categoria',
            'rules' => 'required',
            'groups' => 'default'
        )


    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' => app_parse_slug($this->input->post('slug')),
            'ativo' => $this->input->post('ativo'),
            'faq_categoria_id' => $this->input->post('faq_categoria_id')
        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('faq_duvida_idioma_model', 'faq_duvida_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');


        $faq_duvida_id =  $this->insert($data);

        $this->faq_duvida_idioma->insert_by_faq_duvida($faq_duvida_id, $idiomas);

        return $faq_duvida_id;

    }

    public function update_form(){

        $this->load->model('faq_duvida_idioma_model', 'faq_duvida_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $faq_duvida_id = $this->input->post($this->primary_key);

        $this->update( $faq_duvida_id,  $data);

        $this->faq_duvida_idioma->insert_by_faq_duvida($faq_duvida_id, $idiomas);

    }


    function get_faq_duvida_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_faq_duvida_by_id($id){

        return $this->get($id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'faq_duvida_idioma';
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

    public function get_filhos_of($pai){

        $this->_database->where('faq_duvida_parent_id', $pai);
        return $this->get_all();

    }


    public function get_parents($pai){

        $data = array();
        $pais =  $this->get_filhos_of($pai);


        foreach($pais as $pai){

            $data[$pai[$this->primary_key]] = $pai;
            $data[$pai[$this->primary_key]]['filhos'] = $this->get_parents($pai[$this->primary_key]);

        }

        return $data;

    }


}
