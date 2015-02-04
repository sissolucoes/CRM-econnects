<?php
Class Produto_Model extends MY_Model
{

    protected $_table = 'produto';
    protected $primary_key = 'produto_id';

    protected $return_type = 'array';
    protected $soft_delete = TRUE;

    protected $soft_delete_key = 'deletado';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';

    const TIPO_PESSOA_FISICA = 'PF';

    const TIPO_PESSOA_JURIDICA = 'PJ';





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
            'field' => 'produto_categoria_id',
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
            'produto_categoria_id' => $this->input->post('produto_categoria_id'),
            'tipo_pessoa' => $this->input->post('tipo_pessoa'),
            'modelo_pagina' => $this->input->post('modelo_pagina'),
            'url_frame' => $this->input->post('url_frame')
        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('produto_idioma_model', 'produto_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');


        $produto_id =  $this->insert($data);

        $this->do_upload_imagem($produto_id);
        $this->produto_idioma->insert_by_produto($produto_id, $idiomas);

        return $produto_id;

    }

    public function update_form(){

        $this->load->model('produto_idioma_model', 'produto_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $produto_id = $this->input->post($this->primary_key);

        $this->update( $produto_id,  $data);

        $this->do_upload_imagem($produto_id);
        $this->produto_idioma->insert_by_produto($produto_id, $idiomas);

    }


    function get_produto_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_produto_by_id($id){

        return $this->get($id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'produto_idioma';
        $prefix = '';
        $foreing_key = $this->primary_key;
        $join = 'inner';

        $fields = array(
            'titulo',
            'conteudo'


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

    public  function get_produtos_by_tipo_pessoa($tipo){


        $this->_database->where("{$this->_table}.tipo_pessoa", $tipo);
        return $this->get_all();;

    }

    public  function get_produtos_by_categoria($categoria){


        $this->_database->where("{$this->_table}.produto_categoria_id", $categoria);
        return $this->get_all();;

    }

    public function with_categoria(){

        $with_table = 'produto_categoria';
        $prefix = 'categoria_';
        $foreing_key = 'produto_categoria_id';
        $join = 'inner';

        $fields = array(
            'nome',
            'slug'


        );

        foreach($fields as $field){

            $this->_database->select("{$with_table}.$field AS {$prefix}{$field}");
        }

        $this->_database->join($with_table, $this->_table.".{$foreing_key} = {$with_table}.{$foreing_key}", $join);

        //$this->_database->select("idioma.codigo AS idioma_codigo");
        //$this->_database->join('idioma', "idioma.idioma_id = {$with_table}.idioma_id", $join);

        return $this;

    }

    public  function get_produto_url($produto){

        if(!is_array($produto) && is_numeric($produto)){

            return '';
        }

        $url = '';

        if($produto){



            $tipo = '';

            if(isset($produto['tipo_pessoa']) && $produto['tipo_pessoa'] == 'PF' ){

                $tipo = 'bom_para_voce';
            }

            if(isset($produto['tipo_pessoa']) && $produto['tipo_pessoa'] == 'PJ' ){

                $tipo = 'bom_para_sua_empresa';
            }

            $url = site_url("produtos/{$tipo}/{$produto['slug']}");



        }

        return $url;

    }

    public function filter_from_input(){

        if($this->input->get('filter')){

            $filters = $this->input->get('filter');

            if(isset($filters['tipo_pessoa']) && $filters['tipo_pessoa'] != ''){

                $tipo_pessoa = $filters['tipo_pessoa'];
                $this->_database->where("{$this->_table}.tipo_pessoa", $tipo_pessoa);
            }

        }
        return $this;

    }

    public  function set_by_tipo_pessoa($tipo){

        $this->_database->where("{$this->_table}.tipo_pessoa", $tipo);
        return $this;

    }

    public function get_modelos_paginas(){


        return array(
            'frame-and-content' => 'Frame e Conteúdo',
            'frame-only' => 'Apenas Frame',
            'content-only' => 'Apenas Conteúdo'
        );
    }


    public function do_upload_imagem($produto_id){


            $upload_field = 'imagem';

            if(isset($_FILES[$upload_field])){

                $config['upload_path'] = PUBLIC_UPLOAD_PATH . "produtos/{$produto_id}";

                if(!file_exists($config['upload_path'])){
                    mkdir($config['upload_path'], 0777, true);
                }

                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($upload_field))
                {
                    throw new Exception($this->upload->display_errors('', ''));
                }
                else
                {
                    $upload_data = $this->upload->data();


                    $data = array(
                        'imagem' => $upload_data['file_name']
                    );

                    $this->update( $produto_id,  $data,  TRUE);


                }

            }


    }


}
