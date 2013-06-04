<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . 'shark/library');
echo get_include_path();
require_once 'Zend/Loader/Autoloader.php';
//require_once 'Zend/Db/Table/Abstract.php';
//require_once 'Zend/Db/Table/Row.php';
//require_once 'Ucan/Model/Resource/Interface.php';
//require_once 'Zend/Acl/Role/Interface.php';
//require_once 'Ucan/Model/Resource/Db/Interface.php';
//require_once 'Ucan/Model/Resource/Db/Table/Row/Abstract.php';
//require_once 'Ucan/Model/Resource/Db/Table/Abstract.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . 'shark/application/modules/core/models/resources/User/Interface.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . 'shark/application/modules/core/models/resources/User/Item/Interface.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . 'shark/application/modules/core/models/resources/User/Item.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . 'shark/application/modules/core/models/resources/User.php';
require_once 'Zend/Auth.php';
session_start();
echo '<pre>';
print_r($_SESSION['Zend_Auth']['storage']);
echo '</pre>';

?>
