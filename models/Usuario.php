<?php 
    require_once "database/MySqlConnection.php";
    class Usuario extends MySqlConnection{
    
      const TABLE_NAME = 'usuarios';
    
      private $idUsuario;
      private $nombre;
      private $apellido;
      private $nombreUsuario;
      private $rol;
      private $idDepartamento;
      private $idMunicipio;
      
      public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
      }
    
      public function getIdUsuario(){
        return $this->idUsuario;
      }

      public function setNombre($nombre){
        $this->nombre = $nombre;
      }
    
      public function getNombre(){
        return $this->nombre;
      }

      public function setApellido($apellido){
        $this->apellido = $apellido;
      }
    
      public function getapellido(){
        return $this->apellido;
      }

      public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
      }
    
      public function getNombreUsuario(){
        return $this->nombreUsuario;
      }

      public function setRol($rol){
        $this->rol = $rol;
      }
    
      public function getRol(){
        return $this->rol;
      }

      public function setIdDepartamento($idDepartamento){
        $this->idDepartamento = $idDepartamento;
      }
    
      public function getIdDepartamento(){
        return $this->idDepartamento;
      }

      public function setIdMunicipio($idMunicipio){
        $this->idMunicipio = $idMunicipio;
      }
    
      public function getIdMunicipio(){
        return $this->idMunicipio;
      }
    
      public function __construct()
      {
        parent::__construct();
      }
    
      public function list($filter = [], $sort = [])
      {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " u";
        $sql .= " INNER JOIN municipios m on m.idMunicipio = u.idMunicipio ";
        $sql .= " INNER JOIN departamentos dp ON dp.idDepartamento = u.idDepartamento ";

        $sql .= $this->createSqlFilter($filter);
        $sql .= $this->crateSqlSort($sort);
        
        $data = array();
        if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
          
          while ($obj = $result->fetch_object()) {
            array_push($data, $obj);
          }
        }
        return $data;
      }
    
      private function createSqlFilter($filter) {
        $sql = "";
        $filters = ['name', 'departamento', 'municipio', 'rol', 'letra']; // set available filters here
        if (count($filter)) {
          $i = 0;
          foreach ($filter as $key => $value) {
            $searchInFilters = array_search($key, $filters);
            if ($searchInFilters === false) $searchInFilters = -1;
            if ($searchInFilters >= 0  ) {
              $sql .= ($i == 0 ) ? " WHERE " : " AND ";
              switch ($key) {
                case 'name':
                  $sql .= "u.nombre LIKE '%" . $value ."%'"; 
                  break;
                case 'municipio':
                  $sql .= "m.idMunicipio = " . $value ." "; 
                  break;
                case 'departamento':
                  $sql .= "dp.idDepartamento = " . $value ." "; 
                  break;
                case 'rol':
                  $sql .= "u.rol = " . $value ." ";
                  break;
                case 'letra':
                  $sql .= "u.nombre LIKE '" . $value ."%'"; 
                  break;

                default:
                  # code...
                  break;
              }
            }
            $i++;
          }
        }
        return $sql;
      }
    
      private function crateSqlSort($rules) {
        $sql = "";
        $fields = ['id', 'name']; // set available filters here
        if (count($rules)) {
          $i = 0;
          foreach ($rules as $key => $value) {
            $searchInFilters = array_search($key, $fields);
            if ($searchInFilters === false) $searchInFilters = -1;

            if ($searchInFilters >= 0  ) {
              $value = strtoupper($value);
              if ($value == 'ASC' || $value == 'DESC') $sql .= ($i == 0) ? " ORDER BY " : " , ";
              switch ($key) {
                case 'id':
                  if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " u.idUsuario " . $value ." "; 
                  break;
                case 'name':
                  if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " u.nombre " . $value ." "; 
                  break;

                default:
                  # code...
                  break;
              }
            }
            $i++;
          }
        }
        return $sql;
      }
    }
?>