<?php
Class Log_Database_Model extends MY_Model
{
    protected $_table = 'log_database';
    protected $_primary_key = 'log_database_id';


    protected $_defaul_order = 'criacao';

    protected $_defaul_sort = 'DESC';

    protected $_exclude_fields = array('alteracao', 'criacao', 'alteracao_usuario_id', 'deletado');

    public function log($model, $tipo, $resumo){

        if(is_object($model)){

            $model = strtolower(get_class($model));
        }

        $data  = array(
            'model' => $model,
            'tipo' => $tipo,
            'resumo' => $resumo,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'controller' => $this->router->fetch_class(),
            'acao' => $this->router->fetch_method(),
            'criacao' => date('Y-m-d H:i:s'),
            'usuario_id' => $this->session->userdata('usuario_id'),
        );

        $this->saveData($data);

    }

    /**
     * @param $model MY_Model
     * @param $old_data array
     * @param $new_data array
     */
    public function log_alterar($model, $old_data, $new_data){

        $resumo = '<table border="0" cellpadding="1" cellspacing="2" align="left" class="log_table_resumo">';

        if(is_object($model)){

            $id_key = $model->getPrimaryKey();
            $id_value = $old_data[$id_key];

            $resumo .= '
                <tr class="linha_0">
                    <td>Chave primária:</td>
                    <td> ' . $id_key . ' </td>
                    <td> ' . $id_value . ' </td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                ';


        }

        $resumo .= '<tr><td>Campos</td><td>Antes</td><td>Depois</td></tr>';

        $c = 1;
        foreach ($new_data as $key => $value) {

            if(in_array($key, $this->_exclude_fields)){
                continue;
            }

            if ($old_data[$key] != $value) {
                $resumo .= '
                <tr class="linha_'.$c.'">
                    <td>' . $key . '</td>
                    <td>' . $old_data[$key] . '</td>
                    <td>' . $value . '</td>
                </tr>';
                $c++;
            }
        }
        if ($c == 1) {
            $resumo = '<table border="0" cellpadding="0" cellspacing="0" align="center">';
            $resumo .= '<tr class="tabela01_th"><td>Nenhum campo foi Alterado</td></tr>';
        }

        $resumo .= '</table>';

        $this->log($model, 'alterar', $resumo);
    }
    /**
     * @param $model MY_Model
     * @param $id_value int
     * @param $new_data array
     */
    public function log_inserir($model, $id_value,  $new_data){

        $resumo = '<table border="0" cellpadding="1" cellspacing="2" align="left" class="log_table_resumo">';

        if(is_object($model)){

            $id_key = $model->getPrimaryKey();

            $resumo .= '
                <tr class="linha_0">
                    <td>Chave primária:</td>
                    <td> ' . $id_value . ' ( '.$id_key. ' )</td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                ';

        }


        $resumo .= '<tr><td>Campos</td><td>Conteudo</td></tr>';

        $c = 1;
        foreach ($new_data as $key => $value) {

            if(in_array($key, $this->_exclude_fields)){
                continue;
            }


                $resumo .= '
                <tr class="linha_'.$c.'">
                    <td>' . $key . '</td>
                    <td>' . $value . '</td>
                </tr>';
                $c++;

        }

        $resumo .= '</table>';

        $this->log($model, 'inserir', $resumo);
    }

    /**
     * @param $model MY_Model
     * @param $id_value int
     * @param $new_data array
     */
    public function log_excluir($model, $id_value,  $new_data){

        $resumo = '<table border="0" cellpadding="1" cellspacing="2" align="left" class="log_table_resumo">';

        if(is_object($model)){

            $id_key = $model->getPrimaryKey();



            $resumo .= '
                <tr class="linha_0">
                    <td>Chave primária:</td>
                    <td> ' . $id_value . ' ( '.$id_key. ' )</td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                ';
            unset($new_data[$id_key]);
        }

        $resumo .= '<tr><td>Campos</td><td>Conteudo</td></tr>';

        $c = 1;
        foreach ($new_data as $key => $value) {

            if(in_array($key, $this->_exclude_fields)){
                continue;
            }

            $resumo .= '
                <tr class="linha_'.$c.'">
                    <td>' . $key . '</td>
                    <td>' . $value . '</td>
                </tr>';
            $c++;

        }

        $resumo .= '</table>';

        $this->log($model, 'excluir', $resumo);
    }

    function updateData($id, $data){

        $this->db->where($this->_primary_key, $id);
        $this->db->update($this->_table, $data);
    }


    function saveData($data){

        $this->db->insert($this->_table, $data);
    }

    function delete($id){

        $data = array();
        $data['alteracao'] = date('Y-m-d H:i:s');
        $data['alteracao_usuario_id'] = $this->session->userdata('usuario_id');
        $data['deletado'] = 1;

        $this->db->where($this->_primary_key, $id);
        $this->db->update($this->_table, $data);

    }





}
