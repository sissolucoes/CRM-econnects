<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relacionamento_Perfis extends Admin_Controller {


    protected $current_model;

    function __construct(){

        parent::__construct();
        $this->load->model('relacionamento_usuario_model', 'relacionamento_usuario');
        $this->load->model('relacionamento_perfil_model', 'relacionamento_perfil');



        $this->template->set('title', $this->config->item('app_name').' - Perfis');

    }

    public function view($id, $offset = 0)
    {
        $this->load->library('form_validation');


        $relacionamento_usuario =  $this->relacionamento_usuario->get($id);

        if(! $relacionamento_usuario ){
            $this->session->set_flashdata('fail_msg', 'Não foi possível encontrar o Registro.');
            redirect('admin/relacionamento_usuarios/');
        }



        $this->template->set('page_title_info', '');
        $this->template->set('page_subtitle', 'List');

        $this->template->set_breadcrumb('List', base_url("$this->controller_uri/index"));

        $this->load->library('pagination');
        $config['base_url'] = base_url("$this->controller_uri/index");
        $config['uri_segment'] = 4;
        $config['total_rows'] =  $this->relacionamento_perfil->count_all();
        $config['per_page'] = 10;
        $this->pagination->initialize($config);


        $data = array();

        $data['page_title'] = 'Relacionamento / Perfis';
        $data['primary_key'] = $this->relacionamento_perfil->primary_key();
        $data["pagination_links"] = $this->pagination->create_links();


        $data['rows'] = $this->relacionamento_perfil
            ->limit($config['per_page'], $offset )
            ->filter_by_usuario($id)
            ->get_all();

        $data['relacionamento_usuario_id'] = $id;

        $this->template->load('admin/layouts/base', 'admin/relacionamento_perfis/view', $data );
    }

    public function add($usuario_id, $tipo_pessoa){


        $this->load->library('form_validation');

        $this->template->set('page_title_info', '');
        $this->template->set('page_subtitle', 'Add');
        $this->template->set_breadcrumb('Add', base_url("$this->controller_uri/index"));

        if($_POST){


            if($this->relacionamento_perfil->validate_form($tipo_pessoa)){



                $insert_id = $this->relacionamento_perfil->insert_form();

                if($insert_id){

                    $this->session->set_flashdata('succ_msg', 'Os dados foram salvos corretamente.');

                }else {

                    $this->session->set_flashdata('fail_msg', 'Não foi possível salvar o Registro.');
                }

                redirect("$this->controller_uri/view/{$usuario_id}");


            }
        }

        $data = array();

        $data['relacionamento_usuario_id'] = $usuario_id;

        $data['primary_key'] = $this->relacionamento_perfil->primary_key();
        $data['new_record'] = '1';
        $data['form_action'] =  base_url("$this->controller_uri/add/{$usuario_id}/{$tipo_pessoa}");

        $data['tipo_pessoa'] = strtolower($tipo_pessoa);

        $data['page_title'] = 'Relacionamento / Perfis';


        $this->template->load('admin/layouts/base', "admin/relacionamento_perfis/edit_{$tipo_pessoa}", $data );
    }

    public function edit($perfil_id){



        $this->load->library('form_validation');

        $this->template->set('page_title_info', '');
        $this->template->set('page_subtitle', 'Editar');
        $this->template->set_breadcrumb('Edit', base_url("$this->controller_uri/index"));



        $data = array();
        $data['row'] = $this->relacionamento_perfil->get($perfil_id);



        if(!$data['row']){

            $this->session->set_flashdata('fail_msg', 'Não foi possível encontrar o Registro.');
            redirect("relacionamento_usuarios/index");

        }

        $relacionamento_usuario_id = $data['row']['relacionamento_usuario_id'];
        $tipo_pessoa = strtolower($data['row']['tipo_pessoa']);

        if($_POST){

            if($this->relacionamento_perfil->validate_form()){

                $this->relacionamento_perfil->update_form();

                $this->session->set_flashdata('succ_msg', 'Os dados foram salvos corretamente.');

                redirect("$this->controller_uri/view/{$relacionamento_usuario_id}");

            }
        }



        $data['relacionamento_usuario_id'] = $relacionamento_usuario_id;

        $data['primary_key'] = $this->relacionamento_perfil->primary_key();
        $data['new_record'] = '0';
        $data['form_action'] =  base_url("$this->controller_uri/edit/{$relacionamento_usuario_id}");

        $data['tipo_pessoa'] = $tipo_pessoa;

        $data['page_title'] = 'Relacionamento / Perfis';


        $this->template->load("admin/layouts/base", "$this->controller_uri/edit_{$tipo_pessoa}", $data );



    }


}
