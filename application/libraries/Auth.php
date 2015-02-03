<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    protected $default_config = array();
    protected $CI;
    protected  $config = array();


    public function __construct( $config = array() )
    {
        $this->config = array_merge($this->default_config, $config);

        $this->CI = &get_instance();


    }
    public function check_permission($action = 'view', $resource = null, $redirect = false, $message = 'Você não tem permissão para acessar esse recurso.'){

        $this->CI->load->model('usuario_acl_permissao_model', 'usuario_acl_permissao');
        if(is_null($resource)){
            $resource =  $this->CI->router->fetch_class();
        }

        $result =  $this->CI->usuario_acl_permissao->verify_permission($this->CI->session->userdata('usuario_acl_tipo_id'),  $action, $resource );

        if((!$result) && $redirect !== false){
            $this->CI->session->set_flashdata('fail_msg', $message);
            redirect($redirect);
        }

        return $result;
    }

    public function is_logged(){


            return  (bool) $this->CI->session->userdata('is_logged');


    }
    public function get_user_data(){

            return $this->CI->session->all_userdata();
    }

    public  function is_admin(){


        if($this->is_logged()){

            return (bool) $this->CI->session->userdata('usuario_id');

        }else {

            return false;

        }


    }

    public function is_relacionamento(){



        if($this->is_logged()){

            return (bool) $this->CI->session->userdata('relacionamento_usuario_id');

        }else {

            return false;

        }

    }

    public function get_id(){

        if($this->is_admin()){

            return $this->CI->session->userdata('usuario_id');

        }elseif($this->is_relacionamento()){

            return $this->CI->session->userdata('relacionamento_usuario_id');

        }else {

            return false;
        }
    }

}