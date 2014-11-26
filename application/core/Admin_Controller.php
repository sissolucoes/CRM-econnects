<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
    protected $noLogin = false;
    protected $_theme = 'coral';

    protected $controller_name;
    protected $controller_uri;


    function __construct()
    {
        parent::__construct();


        $this->output->set_header('Expires: Sat, 01 Jan 2000 00:00:01 GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0, max-age=0');
        $this->output->set_header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
        $this->output->set_header('Pragma: no-cache');

        $this->template->set('theme', $this->_theme);
        $this->template->set('title', 'Admin');
        $this->template->set_breadcrumb('Home', base_url('admin/home'));

        $this->controller_name = strtolower(get_class($this) );

        $this->controller_uri = "admin/{$this->controller_name}";

        $this->template->set('current_controller_name', $this->controller_name );
        $this->template->set('current_controller_uri', $this->controller_uri);

        $this->template->set('userdata', $this->session->all_userdata());

        if(($this->router->fetch_class() !== 'login')   && (!$this->auth->is_admin())  && ($this->noLogin === false) ){

            $this->session->set_flashdata('loginerro', 'Acesso negado.');
            redirect('admin/login/index');
        }


    }
}