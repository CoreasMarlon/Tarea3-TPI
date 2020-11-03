<?php
    class UsuarioController
    {
      public function __construct()
      {
        
      }
    
      public function list()
      {
        require_once "models/Usuario.php";
        require_once "models/Departamento.php";
        require_once "models/Municipio.php";
    
        $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
        $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];
    
        $municipiosList = array();
        $departamentosList = array();

        $departamentoModel = new Departamento();
        $municipiosModel = new Municipio();
        $departamentosList = $departamentoModel->list();
        $municipiosList = $municipiosModel->list();

        
        if (isset($filter['departamento'])) {
          $municipiosFilter = ['departamento' => $filter['departamento']];
          $municipiosList = $municipiosModel->list($municipiosFilter);
        }

        $usuario = new Usuario();
        $list = $usuario->list($filter, $sort);

        require_once 'views/usuarios.php';
      }
    }
?>