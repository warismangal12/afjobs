<?php
require_once 'DBconnection.php';



class BaseControler
{

    protected $db;
    protected $response;





    function __construct()
    {
        $this->db = new DBconnection();
        $this->res = (object) array('status' => false ,'msg' => 'some error occured.', 'data' => array() );
    }
}


?>