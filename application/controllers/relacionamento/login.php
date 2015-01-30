<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Site_Controller {


    function __construct(){

        parent::__construct();
        $this->load->model('relacionamento_usuario_model', 'relacionamento_usuario');


    }

	public function index()
	{

        $this->template->js(app_assets_url('modulos/login/js/base.js',  'relacionamento'));


        $data = array();

        $data = array(
            'login_form_url' => site_url('relacionamento/login/proccess')
        );


        $this->template->load('site/layouts/base', "relacionamento/login/index", $data );

    }

    public function proccess(){



        $this->load->library('form_validation');

        $resultado =  array(
            'success' => false,
            'message' => '',
        );

        $this->form_validation->set_rules('login', 'E-mail', 'valid_email|trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Senha', 'trim|required|xss_clean');

        var_dump($_POST);

        if($this->form_validation->run() == FALSE)
        {

            $resultado['message'] = 'E-mail ou Senha incorretos.';

        }else {

            //processa os dados de login
            if($login = $this->relacionamento_usuario->login($this->input->post('login'), $this->input->post('password')) ){

                $resultado['success'] = true;
                $resultado['message'] = 'Login realizado com sucesso.';

                //@todo recuperar a lista de perfis

            }else {

                $resultado['message'] = 'E-mail ou Senha incorretos.';

            }
        }

        echo json_encode($resultado);
    }
}
