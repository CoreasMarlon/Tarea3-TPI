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
        if (isset($_POST['departamento'])) {
          $depto = (!isset($_POST['departamento'])) ? [] : $_POST['departamento'];
          $filter = ['departamento'=>$depto];
        }
        if(isset($_POST['municipio'])){
          $mun = ['municipio'=>(!isset($_POST['municipio'])) ? [] : $_POST['municipio']];
          $filter = array_merge($filter, $mun);
        }
        if(isset($_POST['rol'])){
          $rol = ['rol'=>(!isset($_POST['rol'])) ? [] : $_POST['rol']];
          $filter = array_merge($filter, $rol);
        }
        if(isset($_POST['letra'])){
          $letra = ['letra'=>(!isset($_POST['letra'])) ? [] : $_POST['letra']];
          $filter = array_merge($filter, $letra);
        }


        if (isset($_POST['ordenamiento'])) {
          $valueSort = (!isset($_POST['ordenamiento'])) ? [] : $_POST['ordenamiento'];
          
          switch ($valueSort) {
            case 'value1':
              $sort = ['name'=>'ASC'];
              break;
            case 'value2':
              $sort = ['name'=>'DESC']; 
              break;
            case 'value3':
              $sort = ['departamento'=>'ASC'];  
              break;
            case 'value4':
              $sort = ['departamento'=>'DESC']; 
              break;
          }
        }
      }

      $municipiosList = array();
      $departamentosList = array();

      $departamentoModel = new Departamento();
      $municipiosModel = new Municipio();
      $departamentosList = $departamentoModel->list();

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