<?php
if ( ! function_exists('app_assets_url'))
{
    function app_assets_url($uri = '', $context = 'site'){

        $CI =& get_instance();
        $assets_directory = $CI->config->item('app_assets_dir');
        $uri = $assets_directory . '/' .$context . '/' .$uri;
        return base_url($uri) ;

    }
}

if ( ! function_exists('app_current_controller'))
{
    function app_current_controller(){

        $CI =& get_instance();

        return $CI->router->fetch_class();

    }
}

function app_current_method(){

    $CI =& get_instance();

    return $CI->router->fetch_method();

}

function app_body_class(){

    $CI =& get_instance();

    $controller =  $CI->router->fetch_class();
    $method =  $CI->router->fetch_method();

    return "app-{$controller}-$method";
}

function is_current_controller($controller){

    if($controller == app_current_controller()){

        return  true;
    }else {
        return  false;
    }
}

function is_current_method($method){

    if($method == app_current_method()){

        return  true;
    }else {
        return  false;
    }
}


if ( ! function_exists('app_template_tag'))
{
    function app_template_tag($data){
       $new_data = array();
       foreach($data as $key => $value ){
           $new_data['{{' .$key.'}}'] = $value;
       }

        return $new_data;

    }
}


function app_format_template($data, $pre= '{{', $pos = '}}'){

    $new_data = array();
    foreach($data as $key => $value){

        $new_data [$pre . $key. $pos ] = $value;
    }
    return $new_data;
}

function app_build_template_vars($data, $string){

    return app_parse_template(app_format_template($data), $string);
}

function app_parse_template($data, $string){

    $string =  str_replace( array_keys($data), array_values($data), $string);

    //Remove as variaveis que não foram alteradas
    $string = preg_replace('/\{\{.*\}\}/', '', $string);

    return $string;

}

function app_create_cp_js_var($var_name , $data){

    $js = '';

    $data = app_format_template($data);
    foreach($data as $key => $value){

        $item = array(
            $key,
            $value,
            $value
        );

        $js .= "['". implode("','" , $item) .  "'],";

    }

    return "var {$var_name} = [" . $js . '];';
}

function app_date_mysql_to_mask($date, $format = 'd/m/Y H:i'){
   if($date != '0000-00-00 00:00:00' && $date != '') {
    return date($format, strtotime($date));
   }else {
    return '';
    }
}

function app_date_mask_to_mysql($date){

    if($date != '0000-00-00 00:00:00' && $date != '') {

        $date = preg_split('/\s/', trim($date));

        if(count($date) == 3){

            $dia = $date[0];
            $hora = $date[2];

            $date = implode('/', array_reverse(explode('/', $dia))) . ' ' . $hora;
            return date("Y-m-d H:i:s", strtotime($date));
        }
    }

    return '';

}

function app_dateonly_mask_to_mysql($date)
{
    if ($date != '0000-00-00' && $date != '') {
        return $date = implode('-', array_reverse( explode('/', $date) ) );
    } else {
        return '';
    }
}

function app_dateonly_mysql_to_mask($date)
{
    if($date != '0000-00-00' && $date != '') {
        return date("d/m/Y", strtotime($date));
    }else {
        return '';
    }
}

function app_clear_number($str){

    return preg_replace('/[^0-9]/', '', $str);
}

function app_char_alpha($index){
    //fixa o problema do indice do array começar em zero;
    $index = $index - 1;

    $char_list = range('A', 'Z' );

    return $char_list[$index];
}
function app_get_querystring_full(){
    $query = '';
    $url = parse_url($_SERVER['REQUEST_URI']);

    if(isset($url['query'])){

        $query = '?' . $url['query'];
    }

    return$query;
}

function app_get_value($field, $default = ''){

    if(is_array($field)){

        foreach ($field as $key => $value){

            if(isset($_GET[$key][$value])){

                return $_GET[$key][$value];
            }else {

                return $default;
            }

        }
    }
    if(isset($_GET[$field])){

        return $_GET[$field];
    }else {

        return $default;
    }


}

function app_validate_cpf($cpf) {

    // Elimina possivel mascara
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // Verifica se o numero de digitos informados é igual a 11
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' ||
        $cpf == '11111111111' ||
        $cpf == '22222222222' ||
        $cpf == '33333333333' ||
        $cpf == '44444444444' ||
        $cpf == '55555555555' ||
        $cpf == '66666666666' ||
        $cpf == '77777777777' ||
        $cpf == '88888888888' ||
        $cpf == '99999999999') {

        return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
    } else {

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {

                return false;
            }
        }

        return true;
    }
}

function app_validar_cnpj($cnpj)
{
    $cnpj = trim($cnpj);
    $soma = 0;
    $multiplicador = 0;
    $multiplo = 0;


    # [^0-9]: RETIRA TUDO QUE NÃO É NUMÉRICO,  "^" ISTO NEGA A SUBSTITUIÇÃO, OU SEJA, SUBSTITUA TUDO QUE FOR DIFERENTE DE 0-9 POR "";
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    if(empty($cnpj) || strlen($cnpj) != 14)
        return FALSE;

    # VERIFICAÇÃO DE VALORES REPETIDOS NO CNPJ DE 0 A 9 (EX. '00000000000000')
    for($i = 0; $i <= 9; $i++)
    {
        $repetidos = str_pad('', 14, $i);

        if($cnpj === $repetidos)
            return FALSE;
    }

    # PEGA A PRIMEIRA PARTE DO CNPJ, SEM OS DÍGITOS VERIFICADORES
    $parte1 = substr($cnpj, 0, 12);

    # INVERTE A 1ª PARTE DO CNPJ PARA CONTINUAR A VALIDAÇÃO    $parte1_invertida = strrev($parte1);
    $parte1_invertida = strrev($parte1);
    # PERCORRENDO A PARTE INVERTIDA PARA OBTER O FATOR DE CALCULO DO 1º DÍGITO VERIFICADOR
    for ($i = 0; $i <= 11; $i++)
    {
        $multiplicador = ($i == 0) || ($i == 8) ? 2 : $multiplicador;

        $multiplo = ($parte1_invertida[$i] * $multiplicador);

        $soma += $multiplo;

        $multiplicador++;
    }

    # OBTENDO O 1º DÍGITO VERIFICADOR
    $rest = $soma % 11;

    $dv1 = ($rest == 0 || $rest == 1) ? 0 : 11 - $rest;

    # PEGA A PRIMEIRA PARTE DO CNPJ CONCATENANDO COM O 1º DÍGITO OBTIDO
    $parte1 .= $dv1;

    # MAIS UMA VEZ INVERTE A 1ª PARTE DO CNPJ PARA CONTINUAR A VALIDAÇÃO
    $parte1_invertida = strrev($parte1);

    $soma = 0;

    # MAIS UMA VEZ PERCORRE A PARTE INVERTIDA PARA OBTER O FATOR DE CALCULO DO 2º DÍGITO VERIFICADOR
    for ($i = 0; $i <= 12; $i++)
    {
        $multiplicador = ($i == 0) || ($i == 8) ? 2 : $multiplicador;

        $multiplo = ($parte1_invertida[$i] * $multiplicador);

        $soma += $multiplo;

        $multiplicador++;
    }

    # OBTENDO O 2º DÍGITO VERIFICADOR
    $rest = $soma % 11;

    $dv2 = ($rest == 0 || $rest == 1) ? 0 : 11 - $rest;

    # AO FINAL COMPARA SE OS DÍGITOS OBTIDOS SÃO IGUAIS AOS INFORMADOS (OU A SEGUNDA PARTE DO CNPJ)
    return ($dv1 == $cnpj[12] && $dv2 == $cnpj[13]) ? TRUE : FALSE;
}

function app_db_escape($string){

    $ci = & get_instance();

    return $ci->db->escape($string);
}

function app_set_value($field = '', $default = '')
{



        if ( ! isset($_POST[$field]))
        {
            $value =  $default;
        }else {

            $value =  $_POST[$field];
        }



    return form_prep($value, $field);
}

function app_has_value($field = '')
{



    if (isset($_POST[$field]))
    {
        return true;
    }else {

        return false;
    }
}

function app_extract_telefone($numero){
    $numero = preg_replace('/([^0-9])/','',$numero);

    $data = array(
        'numero' => $numero,
        'ddd' => '',
    );

    if(strlen($numero) == 8 || strlen($numero) == 9 ){

        $data['numero'] = $numero;
        $data['ddd'] = '';

    }
    if(strlen($numero) == 10  || strlen($numero) == 11 ){

        $data['numero'] = substr($numero, 2);
        $data['ddd'] =  substr($numero, 0, 2);

    }

    return $data;
}


if ( ! function_exists('app_get_random_password'))
{

    function app_get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }

        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
            $password .=  $current_letter;
        }

        return $password;
    }

}



function app_get_km_list(){

    return array(
         0 =>'0 Km',
         1000 => '1000 Km',
         5000 => '5000 Km',
         10000 => '10000 Km',
         20000 => '20000 Km',
         30000 => '30000 Km',
         40000 => '40000 Km',
         50000 => '50000 Km',
         60000 => '60000 Km',
         70000 => '70000 Km',
         80000 => '80000 Km',
         90000 => '90000 Km',
         100000 => '100000 Km',
         110000 => '110000 Km',
         120000 => '120000 Km',
         130000 => '130000 Km',
         140000 => '140000 Km',
         150000 => '150000 Km'
    );
}

function app_youtube_id_by_url($url){

    $url = parse_url($url);

    if(isset($url['query'])){
        parse_str($url['query'], $data);
        if(isset($data['v'])){
            return $data['v'];
        }
    }
    return false;

}

function app_youtube_image_by_id($id, $scope = 'default'){

   $img = "http://img.youtube.com/vi/{$id}/{$scope}.jpg";
   return $img;

}
function app_youtube_embed_link_by_id($id){

    $img = "http://www.youtube.com/embed/{$id}?autoplay=1";
    return $img;

}

function app_parse_slug($string) {

    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u',  'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
    );
    $string = trim($string);
    $parse = strtolower(strtr($string, $table));
    $parse = preg_replace("/[^A-Za-z0-9_-]/", '', $parse);

    return $parse;
}





function app_merge_query_string($data){

    $data = (array) $data;
    $url_parts = parse_url($_SERVER['REQUEST_URI']);

    if(isset($url_parts['query'])){



        parse_str( $url_parts['query'], $query);


        $query = array_merge($query, $data );



        $url = http_build_query($query);

    }else {

        $url = http_build_query($data);

    }

    return $url;
}

function app_html_escape_br($string){
    return nl2br(html_escape($string));
}


function app_get_userdata($item){
    $CI =& get_instance();
    return $CI->session->userdata($item);

}
function app_format_currency($number, $symbol = false){

    return number_format($number, 2, ',' , '.');
}

function app_get_toprides($limit = 4){
    $CI = &get_instance();

    $CI->load->model('anuncio_model', 'anuncio_model');
    return $CI->anuncio_model->getSidebarTopRides($limit);

}

function app_get_banner_by_codigo($codigo, $rand = true){

    $CI = &get_instance();

    $CI->load->model('cms_banner_model', 'cms_banner');

    return $CI->cms_banner->getBannerByCodigo($codigo, $rand );

}

function app_get_firt_word($string){

    $words = preg_split('/\s/', $string);

    $word = trim($words[0]);
    return ucfirst($word);
}
function app_unformat_currency($value){

    $clearValue = preg_replace('/([^0-9\.,])/i', '', $value);

    return str_replace(',', '.', str_replace('.', '', $clearValue));
}

function app_word_cut($string, $limit, $append =  '...'){

    if(strlen($string) > $limit){

        return mb_substr($string, 0, $limit, 'UTF-8' ) . $append;
    }else {

        return $string;
    }
}

function app_item_ckeditor($id){

    return  array
    (

        'id'   => $id,
        'path' => app_assets_url("ckeditor/", 'common'),
        'config' => array
        (
            'toolbar' => "Full",
            'baseHref' => base_url(),
            'width'   => "100%",
            'height'  => "400px",
            'filebrowserBrowseUrl'      => app_assets_url("ckfinder/ckfinder.html", 'common'),
            'filebrowserImageBrowseUrl' => app_assets_url("ckfinder/ckfinder.html?Type=Images", 'common'),
            'filebrowserFlashBrowseUrl' => app_assets_url("ckfinder/ckfinder.html?Type=Flash", 'common'),
            'filebrowserUploadUrl'      => app_assets_url("ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files", 'common'),
            'filebrowserImageUploadUrl' => app_assets_url("ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images", 'common'),
            'filebrowserFlashUploadUrl' => app_assets_url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash", 'common')
        )
    );
}

function app_get_cms_bloco($slug){
    $CI = &get_instance();
    $CI->load->model('cms_bloco_model', 'cms_bloco');

    return $CI->cms_bloco
        ->set_ativos()
        ->with_idioma()
        ->set_select()
        ->filter_idioma($CI->lang->lang())
        ->get_bloco_by_slug($slug);
}

function app_display_options_menu_item($itens,  $level, $current, $skip){

        if(!is_array($skip)){
            $skip = (array) $skip;
        }



        foreach($itens as $item){

            $disabled = '';
            if(in_array($item["cms_menu_item_id"], $skip)){
                $disabled = 'disabled="disabled"';
            }

            $selected = '';
            if($item["cms_menu_item_id"] == $current){
                $selected = 'selected="selected="';
            }

            echo "<option value=\"{$item["cms_menu_item_id"]}\" {$selected} {$disabled}>". str_repeat("-", $level) . " {$item["nome"]}" . "</option>\n";
            if(isset($item["filhos"])){
                app_display_options_menu_item($item["filhos"], $level + 1, $current, $skip );
            }
        }

}

function app_display_options_pagina_parents($itens,  $level, $current, $skip){

    if(!is_array($skip)){
        $skip = (array) $skip;
    }



    foreach($itens as $item){

        $disabled = '';
        if(in_array($item["pagina_id"], $skip)){
            $disabled = 'disabled="disabled"';
        }

        $selected = '';
        if($item["pagina_id"] == $current){
            $selected = 'selected="selected="';
        }

        echo "<option value=\"{$item["pagina_id"]}\" {$selected} {$disabled}>". str_repeat("-", $level) . " {$item["nome"]}" . "</option>\n";
        if(isset($item["filhos"])){
            app_display_options_pagina_parents($item["filhos"], $level + 1, $current, $skip );
        }
    }

}

function app_display_options_faq_categoria_parents($itens,  $level, $current, $skip){

    if(!is_array($skip)){
        $skip = (array) $skip;
    }



    foreach($itens as $item){

        $disabled = '';
        if(in_array($item["faq_categoria_id"], $skip)){
            $disabled = 'disabled="disabled"';
        }

        $selected = '';
        if($item["faq_categoria_id"] == $current){
            $selected = 'selected="selected="';
        }

        echo "<option value=\"{$item["faq_categoria_id"]}\" {$selected} {$disabled}>". str_repeat("-", $level) . " {$item["nome"]}" . "</option>\n";
        if(isset($item["filhos"])){
            app_display_options_faq_categoria_parents($item["filhos"], $level + 1, $current, $skip );
        }
    }

}
function app_display_options_faq_categoria_duvidas_parents($itens,  $level, $current){




    foreach($itens as $item){

        $disabled = '';
        if($item["faq_categoria_parent_id"] == 0){
            $disabled = 'disabled="disabled"';
        }

        $selected = '';
        if($item["faq_categoria_id"] == $current){
            $selected = 'selected="selected="';
        }


        echo "<option value=\"{$item["faq_categoria_id"]}\" {$selected} {$disabled}>". str_repeat("-", $level) . " {$item["nome"]}" . "</option>\n";
        if(isset($item["filhos"])){
            app_display_options_faq_categoria_duvidas_parents($item["filhos"], $level + 1, $current );
        }
    }

}

function app_get_url_produto($produto){

    $CI =& get_instance();
    $CI->load->model('produto_model', 'produto');
    return $CI->produto->get_produto_url($produto);

}

function app_get_url_menu_item($menu){

    $CI =& get_instance();
    $CI->load->model('cms_menu_model', 'cms_menu');
    return $CI->cms_menu->get_menu_item_url($menu);

}