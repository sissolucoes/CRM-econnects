<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Faq_Duvidas
 *
 * @property Faq_Duvida_Model $current_model
 *
 */
class Faq_Duvidas extends Admin_Controller {


    public function __construct(){

        parent::__construct();




        $this->template->set('page_title', 'FAQ - Dúvidas');
        $this->template->set_breadcrumb('FAQ', base_url("$this->controller_uri/index"));

        $this->load->model('faq_duvida_model', 'current_model');
        $this->load->model('faq_duvida_idioma_model', 'faq_duvida_idioma');
        $this->load->model('faq_categoria_model', 'faq_categoria');
        $this->load->model('idioma_model', 'idioma');


        $this->template->set('categoria_parents', $this->faq_categoria->get_parents(0));


    }



    public function index($offset = 0)
    {



        $this->template->set('page_title_info', '');
        $this->template->set('page_subtitle', 'List');



        $this->template->set_breadcrumb('List', base_url("$this->controller_uri/index"));

        $this->load->library('pagination');
        $config['base_url'] = base_url("$this->controller_uri/index");
        $config['uri_segment'] = 4;
        $config['total_rows'] =  $this->current_model->count_all();
        $config['per_page'] = 10;
        $this->pagination->initialize($config);


        $data = array();
        $data['primary_key'] = $this->current_model->primary_key();
        $data["pagination_links"] = $this->pagination->create_links();



        $data['rows'] = $this->current_model->limit($config['per_page'], $offset )->get_all();



        $this->template->load("admin/layouts/base", "$this->controller_uri/list", $data );
    }

    public function add()
    {

        $this->load->library('form_validation');


        $this->template->set('page_title_info', '');
        $this->template->set('page_subtitle', 'Add');
        $this->template->set_breadcrumb('Add', base_url("$this->controller_uri/index"));

        if($_POST){

            if($this->current_model->validate_form()){

                $insert_id = $this->current_model->insert_form();

                if($insert_id){

                    $this->session->set_flashdata('succ_msg', 'Os dados foram salvos corretamente.');

                }else {

                    $this->session->set_flashdata('fail_msg', 'Não foi possível salvar o Registro.');
                }

                redirect("$this->controller_uri/index");


            }
        }




        $data = array();


        $idomas =  $this->idioma->filter_ativos()->get_all();

        $data['primary_key'] = $this->current_model->primary_key();
        $data['idiomas'] = $idomas;


        $data['new_record'] = '0';
        $data['form_action'] =  base_url("$this->controller_uri/add");

        $this->template->load("admin/layouts/base", "$this->controller_uri/edit", $data );
    }

    public function edit($id)
    {
        $this->load->library('form_validation');


        $this->template->set('page_title_info', '');
        $this->template->set('page_subtitle', 'Editar');
        $this->template->set_breadcrumb('Edit', base_url("$this->controller_uri/index"));



        $data = array();
        $data['row'] = $this->current_model->get($id);



        if(!$data['row']){

            $this->session->set_flashdata('fail_msg', 'Não foi possível encontrar o Registro.');
            redirect("$this->controller_uri/index");

        }

        if($_POST){

            if($this->current_model->validate_form()){

                $this->current_model->update_form();

                $this->session->set_flashdata('succ_msg', 'Os dados foram salvos corretamente.');
                redirect("$this->controller_uri/index");

            }
        }


        $idomas =  $this->idioma->filter_ativos()->get_all();
        $data['primary_key'] = $this->current_model->primary_key();
        $data['idiomas'] =$idomas;
        $data['idiomas_rows'] = $this->faq_duvida_idioma->get_by_faq_duvida($id);

        $data['new_record'] = '0';
        $data['form_action'] =  base_url("$this->controller_uri/edit/{$id}");


        $this->template->load("admin/layouts/base", "$this->controller_uri/edit", $data );
    }
    public  function delete($id){

        $this->current_model->delete($id);
        $this->session->set_flashdata('succ_msg', 'Registro excluido corretamente.');
        redirect("{$this->controller_uri}/index");
    }


}
