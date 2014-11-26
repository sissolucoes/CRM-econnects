<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_Acl_Permissoes extends Admin_Controller {

    /**
     * @var Acl_Acao
     */
    protected $current_model;

    function __construct(){

        parent::__construct();
        $this->load->model('usuario_acl_recurso_model', 'usuario_acl_recurso');
        $this->load->model('usuario_acl_acao_model', 'usuario_acl_acao');
        $this->load->model('usuario_acl_tipo_model', 'usuario_acl_tipo');
        $this->load->model('usuario_acl_permissao_model', 'usuario_acl_permissao');


        $this->template->set('title', $this->config->item('app_name').' - Permissões ACL');

    }

    public function edit($id)
    {
        $this->load->library('form_validation');

        if(! ($row = $this->usuario_acl_tipo->get($id)) ){

            $this->session->set_flashdata('fail_msg', 'Não foi possível encontrar o Registro.');
            redirect('admin/usuario_acl_tipos/');
        }

        if($_POST){




            if($this->usuario_acl_permissao->validate_form()){

                $this->usuario_acl_permissao->insert_form();

                $this->session->set_flashdata('succ_msg', 'Os dados foram salvos corretamente.');
                redirect("{$this->controller_uri}/edit/{$id}");

            }



        }
        $data = array();
        $data['page_title'] = 'Permissões de Acesso';
        $data['usuario_tipo']  = $row;

        $data['recursos'] = $this->usuario_acl_recurso->get_all();
        $data['acoes'] = $this->usuario_acl_acao->get_all();

        $data['current_acl'] = $this->usuario_acl_permissao->get_all_by_tipo($id);

        $data['usuario_acl_tipo_id'] = $id;

        $data['row'] = $row;

        $this->template->load('admin/layouts/base', 'admin/usuario_acl_permissoes/edit', $data );
    }


}
