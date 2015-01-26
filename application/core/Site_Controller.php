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

    }
}