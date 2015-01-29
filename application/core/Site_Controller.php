<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_Controller extends MY_Controller
{
    protected $noLogin = true;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('language');
        $this->load->helper('url');

        $this->lang->load('core');

        /**
         * Carrega o menu principal
         */
        $this->load->model('cms_menu_model', 'cms_menu');
        $menu_principal = $this->cms_menu->build_menu('home');
        $this->template->set('menu_principal', $menu_principal);

    }
}