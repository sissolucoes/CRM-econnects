<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Blog_Posts
 *
 * @property Blog_Post_Model $current_model
 *
 */
class Blog_Posts extends Admin_Controller {


    public function __construct(){

        parent::__construct();




        $this->template->set('page_title', 'Paginas');
        $this->template->set_breadcrumb('Paginas', base_url("$this->controller_uri/index"));

        $this->load->model('blog_post_model', 'current_model');
        $this->load->model('blog_post_idioma_model', 'blog_post_idioma');
        $this->load->model('blog_categoria_model', 'blog_categoria');
        $this->load->model('idioma_model', 'idioma');


    }



    public function index()
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



        $data['rows'] = $this->current_model->get_all();



        $this->template->load("admin/layouts/base", "$this->controller_uri/list", $data );
    }

    public function add()
    {

        $this->load->library('form_validation');
        $this->load->helper('ckeditor');

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
        /**
         * habilita o js do ckeditor
         */
        $data['enable_ckeditor'] = true;

        $idomas =  $this->idioma->filter_ativos()->get_all();
        foreach($idomas as $idoma){

            $data['ckeditor_conteudo'][$idoma['codigo']] = app_item_ckeditor('conteudo_'.$idoma['codigo']);
        }


        $data['primary_key'] = $this->current_model->primary_key();
        $data['idiomas'] = $idomas;

        $data['blog_categorias'] = $this->blog_categoria->get_parents(0);


        $data['new_record'] = '0';
        $data['form_action'] =  base_url("$this->controller_uri/add");

        $this->template->load("admin/layouts/base", "$this->controller_uri/edit", $data );
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->load->helper('ckeditor');

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

        /**
         * habilita o js do ckeditor
         */
        $data['enable_ckeditor'] = true;

        $idomas =  $this->idioma->filter_ativos()->get_all();
        foreach($idomas as $idoma){

            $data['ckeditor_conteudo'][$idoma['codigo']] = app_item_ckeditor('conteudo_'.$idoma['codigo']);
        }

        $data['blog_categorias'] = $this->blog_categoria->get_parents(0);

        $data['primary_key'] = $this->current_model->primary_key();
        $data['idiomas'] =$idomas;
        $data['idiomas_rows'] = $this->blog_post_idioma->get_by_blog_post($id);

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
