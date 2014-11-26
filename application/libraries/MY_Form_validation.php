<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{

    /**
     * Valida se o endereço de e-mail ja esta sendo usado
     * @param $email
     * @return bool
     */
    public function check_email_usuario_exists($email)
    {

        $this->set_message('check_email_usuario_exists', 'O %s ja esta cadastrado.');
        $this->CI->load->model('usuario_model');
        return !$this->CI->usuario_model->check_email_exists($email);
    }

    public function check_email_usuario_owner($email)
    {

        $this->set_message('check_email_usuario_owner', 'O %s ja esta cadastrado.');
        $this->CI->load->model('usuario_model');
        //verifica se o email existe
        if($this->CI->usuario_model->check_email_exists($email)){

            //verifica se é o dono do e-mail
            if($this->CI->usuario_model->check_email_owner($email, $this->CI->input->post('usuario_id') )){

                return true;

            }else {

                return false;
            }
        }else {

            return true;
        }

    }



    public function validate_cpf($cpf){

        $this->set_message('validate_cpf', 'O número de CPF informado no campo %s é inválido.');
        return app_validate_cpf($cpf);

    }
    public function validate_cnpj($cnpj){
        $this->set_message('validate_cnpj', 'O número do CNPJ informado no campo %s é inválido.');
        return app_validar_cnpj($cnpj);
    }

    public function in_list($str, $list){

        $this->set_message('in_list', 'O valor informado no campo %s não foi encontrado.');
        $list = explode(',', $list);

        if(in_array($str, $list)){

            return true;

        }else {

            return false;
        }

        exit;
    }
    public function validate_dateonly_mask($date){

        $this->set_message('validate_dateonly_mask', 'A data informada no campo %s é inválida.');

        if(preg_match('/([0-9]{2,2})\/([0-9]{2,2})\/([0-9]{4,4})/', $date, $matches)){


            if(checkdate($matches[2], $matches[1], $matches[3])){

                return true;

            }else {

                return false;
            }


        }else {

            return false;
        }

    }


    function recaptcha_matches()
    {
        $CI =& get_instance();
        $CI->config->load('recaptcha');

        $public_key = $CI->config->item('recaptcha_public_key');
        $private_key = $CI->config->item('recaptcha_private_key');

        $response_field = $CI->input->post('recaptcha_response_field');
        $challenge_field = $CI->input->post('recaptcha_challenge_field');

        $response = recaptcha_check_answer($private_key,
            $_SERVER['REMOTE_ADDR'],
            $challenge_field,
            $response_field);
        if ($response->is_valid)
        {
            return TRUE;
        }
        else
        {
            $this->recaptcha_error = $response->error;
            $this->set_message('recaptcha_matches', 'A código da imagem %s está incorreto, por favor, tente novamente.');
            return FALSE;
        }
    }
}