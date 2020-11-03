<?php
    class UsuarioController
    {
      public function __construct()
      {
        
      }
    
      public function list()
      {
        require_once "models/Usuario.php";
        //require_once "models/Departamento.php";
        //require_once "models/Municipio.php";
    
        $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
        $limit = (!isset($_GET['limit'])) ? 20 : $_GET['limit'];
    
        $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
        $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];
    
        $municipiosList = array();
        $departamentosList = array();

        //$departamentoModel = new Departamento();
        //$municipiosModel = new Municipio();
        //$departamentosList = $departamentoModel->list(1, 14);

        /*
        if (isset($filter['departamento'])) {
          $municipiosFilter = ['departamento' => $filter['departamento']];
          $municipiosList = $municipiosModel->list(1, 10000, $municipiosFilter);
        }
        */

        $usuario = new Usuario();
        $list = $usuario->list($page, $limit, $filter, $sort);
        var_dump($list);
        
        //require_once 'views/donantes.php';
      }
    }
?>