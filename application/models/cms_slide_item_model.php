<?php
Class Cms_Slide_Item_Model extends MY_Model
{

    protected $_table = 'cms_slide_item';
    protected $primary_key = 'cms_slide_item_id';

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
            'field' => 'cms_slide_id',
            'label' => 'Slide',
            'rules' => 'required',
            'groups' => 'default'
        )

    );

    public function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'slug' => $this->input->post('slug'),
            'ativo' => $this->input->post('ativo'),
            'cms_slide_id' => $this->input->post('cms_slide_id'),
            'ordem' => $this->input->post('ordem')

        );


        return $data;
    }


    public function insert_form(){


        $this->load->model('cms_slide_item_idioma_model', 'cms_slide_item_idioma');

        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $cms_slide_id= $this->input->post('cms_slide_id');


        $cms_slide_item_id =  $this->insert($data);

        $idiomas = $this->do_upload_imagem_idioma($idiomas, $cms_slide_id,  $cms_slide_item_id);


        $this->cms_slide_item_idioma->insert_by_slide_item($cms_slide_item_id, $idiomas);

        return $cms_slide_item_id;

    }

    public function do_upload_imagem_idioma($idiomas, $cms_slide_id,  $cms_slide_item_id){

        foreach($idiomas as $idioma_id => $idioma_data){

            $upload_field = 'imagem_'. $idioma_id;



            if(isset($_FILES[$upload_field])){

                $config['upload_path'] = PUBLIC_UPLOAD_PATH . "slides/{$cms_slide_id}/{$cms_slide_item_id}";
                if(!file_exists($config['upload_path'])){
                    mkdir($config['upload_path'], 0777, true);
                }

                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

               


                if ( ! $this->upload->do_upload($upload_field))
                {
                    //throw new Exception($this->upload->display_errors('', ''));



                }
                else
                {
                    $data = $this->upload->data();
                    $idiomas[$idioma_id]['imagem_data'] = $data;


                }

            }

        }

        return $idiomas;

    }

    public function update_form(){

        $this->load->model('cms_slide_item_idioma_model', 'cms_slide_item_idioma');


        $data = $this->get_form_data();

        $idiomas = $this->input->post('idiomas');

        $cms_slide_id= $this->input->post('cms_slide_id');

        $cms_slide_item_id = $this->input->post($this->primary_key);

        $idiomas = $this->do_upload_imagem_idioma($idiomas, $cms_slide_id,  $cms_slide_item_id);

        $this->update( $cms_slide_item_id,  $data);

        $this->cms_slide_item_idioma->insert_by_slide_item($cms_slide_item_id, $idiomas);

    }


    function get_slide_item_by_slug($slug){

        return $this->get_by('slug', $slug);

    }
    function get_slide_item_by_id($id){

        return $this->get($id);

    }
    public function set_ativos(){

        $this->_database->where("{$this->_table}.ativo", 1);

        return $this;
    }

    public function set_cms_slide($cms_slide_id){

        $this->_database->where("{$this->_table}.cms_slide_id", $cms_slide_id);

        return $this;
    }

    public function with_idioma(){


        $with_table = 'cms_slide_item_idioma';
        $prefix = '';
        $foreing_key = $this->primary_key;
        $join = 'inner';

        $fields = array(
            'titulo',
            'idioma_id',
            'imagem'

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
