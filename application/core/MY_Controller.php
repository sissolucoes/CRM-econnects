<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->template->set('title', '');
        $this->template->set('meta_keywords', '');
        $this->template->set('meta_description', '');
    }
}