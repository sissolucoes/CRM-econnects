<?php
Class Usuario_Model extends MY_Model
{
    protected $_table = 'usuario';
    protected $primary_key = 'usuario_id';

    protected $return_type = 'array';

    protected $soft_delete = TRUE;

    protected $soft_delete_key = 'deletado';

    protected  $salt = '174mJuR18mS0lhgKL2J0CETRlN252x';

    protected $update_at_key = 'alteracao';
    protected $create_at_key = 'criacao';


    public $validate = array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required',
            'groups' => 'default, add, edit'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email',
            'groups' => 'default'
        ),
        array(
            'field' => 'ativo',
            'label' => 'Ativo',
            'rules' => 'required',
            'groups' => 'default, add, edit'
        ),
        array(
            'field' => 'usuario_acl_tipo_id',
            'label' => 'Tipo',
            'rules' => 'required',
            'groups' => 'default, add, edit'
        ),
        array(
            //regra apenas para adicionar
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email|check_email_usuario_exists',
            'groups' => 'add'
        ),
        array(
            //regra apenas para editar
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email|check_email_usuario_owner',
            'groups' => 'edit'
        ),
        array(
            //Precisa inserir uma senha ao adicionar um novo usuario
            'field' => 'senha',
            'label' => 'Senha',
            'rules' => 'required',
            'groups' => 'add'
        )

    );


    function get_usuario($id)
    {

       return $this->getRow($id);

    }

    function validateEditForm()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'O campo %s é obrigatório.');
        $this->form_validation->set_message('valid_email', 'O campo %s precisa ter um e-mail válido.');


        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('ativo', 'Ativo', 'required');
        $this->form_validation->set_rules('usuario_acl_tipo_id', 'Tipo', 'required');

        /**
         * Se for um novo registro verifica se o e-mail ja esta sendo usando
         */
        if($this->input->post('new_record')){

            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|check_email_usuario_exists');
            $this->form_validation->set_rules('senha', 'Senha', 'required');

        /**
         * Se for uma alteração verifica se o e-mail ja esta sendo usando,
         * caso o endereço de e-mail tenha mudado
         *
         */
        }else {

            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|check_email_usuario_owner');

        }

        return $this->form_validation->run();


    }

    /**
     * Verifica se tem algum usuario ativo com esse endereço de mail
     *
     * @param $email
     * @return bool
     */
    function check_email_exists($email){

        log_message('debug', 'check_email_user'. $email);
        $this->_database->select($this->_table. '.email');
        $this->_database->from($this->_table);
        $this->_database->where($this->_table. '.email', $email);
        $this->_database->where($this->_table. '.deletado', 0);

        $query = $this->_database->get();

        if ($query->num_rows() > 0) {

          return true;

        } else {
            return false;
        }

    }
    /**
     * Verifica se o usuario é dono do e-mail
     *
     * @param $email
     * @param $usuario_id
     * @return bool
     */
    function check_email_owner($email, $usuario_id){

        log_message('debug', 'check_email_owner'. $email . ' - ' . $usuario_id);
        $this->_database->select($this->_table. '.email');
        $this->_database->from($this->_table);
        $this->_database->where($this->_table. '.email', $email);
        $this->_database->where($this->_table. '.usuario_id', $usuario_id);
        $this->_database->where($this->_table. '.deletado', 0);

        $query = $this->_database->get();

        if ($query->num_rows() > 0) {

            return true;

        } else {
            return false;
        }

    }

    function get_form_data(){

        $data =  array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'usuario_acl_tipo_id' => $this->input->post('usuario_acl_tipo_id'),
            'ativo' => $this->input->post('ativo')


        );

        if($this->input->post('senha') && $this->input->post('senha') !== ''){
            $data['senha'] = MD5($this->salt.$this->input->post('senha'));
        }

        return $data;

    }


    function login($login, $password)
    {
        $this->_database->select($this->_table. '.*');
        $this->_database->from($this->_table);
        $this->_database->where($this->_table. '.email', $login);
        $this->_database->where($this->_table. '.senha', MD5($this->salt.$password));
        $this->_database->where($this->_table. '.ativo', 1);
        $this->_database->where($this->_table. '.deletado', 0);
        $this->_database->limit(1);

        $query = $this->_database->get();


        if ($query->num_rows() == 1) {
            $result = $query->result_array();
            $usuario = $result[0];

            $usuario['is_logged'] = true;
            $usuario['upload_url'] = base_url('assets/uploads/media') . '/';

            /**
             * deleta os dados da sessão antiga
             */
            $this->session->sess_destroy();




            $this->session->set_userdata($usuario);

            $this->log_evento->log($this , 'login', 'Login');

            return true;
        } else {
            return false;
        }
    }
    function logout(){

        $this->log_evento->log($this , 'logout', 'Logout');
        $this->session->sess_destroy();

    }

    function with_usuario_acl_tipo($fields = array('nome')){

        $this->with_simple_relation('usuario_acl_tipo', 'usuario_tipo_', 'usuario_acl_tipo_id', $fields );

        return $this;
    }
}
