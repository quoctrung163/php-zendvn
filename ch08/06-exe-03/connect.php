<?php 
    require_once "class/Database.class.php";

    $params = array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'db_manage_user',
        'table' => 'group',
    );

    $db = new Database($params);
?>