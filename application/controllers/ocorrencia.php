<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ocorrencia extends Site_Controller {


    public function index()
    {
        $this->lang->load("{$this->controller_name}");
        $this->template->set('title', 'Ocorrencia');


        $this->template->js(app_assets_url("modulos/{$this->controller_name}/js/base.js",  'site'));

        $data = array();



        $this->template->load('site/layouts/base', "site/{$this->controller_name}/index", $data );

    }

    public function proccess_form(){

        $this->lang->load("{$this->controller_name}");
        $this->load->library('form_validation');

        $resultado =  array(
            'success' => false,
            'message' => ''

        );

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email|trim|required|xss_clean');




        if($this->form_validation->run() == FALSE)

        {
            $resultado['message'] = validation_errors('<div class="error">', '</div>');

        }else {

            $this->load->library('App_mail');

            $this->app_mail->set('form_data', $_POST);

            $this->app_mail->set_template("site/{$this->controller_name}/email_contato");

            $this->app_mail->set_from( $this->config->item('app_email_from'), $this->config->item('app_email_name'));

            $this->app_mail->add_to('carlos@zazz.com.br');

            $this->app_mail->set_subject('[Corcovado] Ocorrencia - Site');

            $this->app_mail->send();

            $resultado['success'] = true;
            $resultado['message'] = '<div class="success">'.lang('contato.msg_enviado').'</div>';


        }



        echo json_encode($resultado);
    }




}
