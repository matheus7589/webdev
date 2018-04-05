<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/** caminho absoluto para a pasta do sistema **/
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** caminho no server para o sistema **/
if (!defined('BASEURL')) {
    define('BASEURL', '/Vendas/');
}

/** caminhos dos templates header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'templates/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'templates/footer.php');

