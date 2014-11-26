<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property mixed template
 */
class Login extends Admin_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('usuario_model', 'usuario');


    }

	public function index()
	{

        $data = array(
            'login_form_url' => base_url('admin/login/proccess')
        );
        $this->template->load('admin/layouts/login', 'admin/login/form', $data);


	}

    public function proccess()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'E-mail', 'valid_email|trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Senha', 'trim|required|xss_clean');


        if($this->form_validation->run() == FALSE)
        {

            $this->session->set_flashdata('loginerro', 'E-mail ou Senha incorretos.');
            redirect('admin/login');

        }else {

            //processa os dados de login



            if($login = $this->usuario->login($this->input->post('login'), $this->input->post('password')) ){

                redirect('admin/home');

            }else {

                $this->session->set_flashdata('loginerro', 'E-mail ou Senha incorretos.');
                redirect('admin/login');

            }
        }

    }
    public function lost_pass()
    {

    }
    public function logout()
    {

       $this->usuario->logout();
       redirect('admin/login');

    }

}
