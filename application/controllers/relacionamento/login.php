<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Site_Controller {


    function __construct(){

        parent::__construct();
        $this->load->model('relacionamento_usuario_model', 'relacionamento_usuario');
        $this->load->model('relacionamento_perfil_model', 'relacionamento_perfil');


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
            'perfis' => array()
        );

        $this->form_validation->set_rules('login', 'E-mail', 'valid_email|trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Senha', 'trim|required|xss_clean');



        if($this->form_validation->run() == FALSE)
        {

            $resultado['message'] = strip_tags(validation_errors('', ''));

        }else {

            //processa os dados de login
            if($login = $this->relacionamento_usuario->login($this->input->post('login'), $this->input->post('password')) ){

                $resultado['success'] = true;
                $resultado['message'] = 'Login realizado com sucesso.';

                //@todo recuperar a lista de perfis


                $perfis = $this->relacionamento_perfil->set_ativo()->filter_by_usuario($this->auth->get_id())->get_all();


                $resultado['total_perfis'] = count($perfis);
                $resultado['perfis_pf'] = array();
                $resultado['perfis_pj']  = array();


                foreach($perfis as $perfil){

                    if($perfil['tipo_pessoa'] == 'PF'){

                        $resultado['perfis_pf'][] = array(
                            'perfil_id' => $perfil['relacionamento_perfil_id'],
                            'nome' => $perfil['nome'],
                            'cpf' => $perfil['cpf']
                        );

                    } elseif($perfil['tipo_pessoa'] == 'PJ'){

                        $resultado['perfis_pj'][] = array(
                            'perfil_id' => $perfil['relacionamento_perfil_id'],
                            'nome_fantasia' => $perfil['nome_fantasia'],
                            'cnpj' => $perfil['cnpj']
                        );

                    }
                }



            }else {

                $resultado['message'] = 'E-mail ou Senha incorretos.';

            }
        }

        echo json_encode($resultado);
    }
}
