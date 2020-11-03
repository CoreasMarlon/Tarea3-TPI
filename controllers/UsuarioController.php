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
      $sort = ['name'=>'ASC'];

      if (count($_POST) > 0) {
        if (
          isset($_POST['departamento']) && isset($_POST['municipio'])
        ) {
          $depto = (!isset($_POST['departamento'])) ? [] : $_POST['departamento'];
          $mun = (!isset($_POST['municipio'])) ? [] : $_POST['municipio'];

          $filter = ['departamento'=>$depto, 'municipio'=>$mun];
        }
      }

      $municipiosList = array();
      $departamentosList = array();

      $departamentoModel = new Departamento();
      $municipiosModel = new Municipio();
      $departamentosList = $departamentoModel->list();
      
      $usuario = new Usuario();
      $list = $usuario->list($filter, $sort);

      require_once 'views/usuarios.php';
    }
  }
?>