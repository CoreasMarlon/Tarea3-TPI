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
    
      public function list($page = 1, $limit = 20, $filter = [], $sort = [])
      {
        
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM " . self::TABLE_NAME . " u";
        $sql .= " INNER JOIN municipios m on m.idMunicipio = u.idMunicipio ";
        $sql .= " INNER JOIN departamentos dp ON dp.idDepartamento = u.idDepartamento ";

        $sql .= $this->createSqlFilter($filter);
        $sql .= $this->crateSqlSort($sort);
        $sql .= " limit " . $limit . " offset " . $offset;
        
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
        $filters = ['name', 'departamento', 'municipio', 'rol']; // set available filters here
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
                  /*
                case 'rol':
                  $sql .= "dp.idDepartamento = " . $value ." "; 
                  break;
                  */
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
        $fields = ['id', 'municipio', 'departamento']; // set available filters here
        if (count($rules)) {
          $i = 0;
          foreach ($rules as $key => $value) {
            $searchInFilters = array_search($key, $fields);
            if ($searchInFilters === false) $searchInFilters = -1;
            echo "<br>";
            if ($searchInFilters >= 0  ) {
              $value = strtoupper($value);
              if ($value == 'ASC' || $value == 'DESC') $sql .= ($i == 0) ? " ORDER BY " : " , ";
              switch ($key) {
                case 'id':
                  if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " u.idUsuario " . $value ." "; 
                  break;
                case 'municipio':
                  if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " u.municipio" . $value ." "; 
                  break;
                case 'departamento':
                  if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " u.departamento " . $value ." "; 
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
    
      /*
      public function get()
      {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE id_donante = " . $this->id_donante;
        if ($result = $this->db->query($sql, MYSQLI_USE_RESULT)) {
          $data = array();
          while ($obj = $result->fetch_object()) {
            array_push($data, $obj);
          }
          return $data;
        }
      }
    
      public function create()
      {
        $sql = "INSERT INTO " . self::TABLE_NAME . " (nombre_donante,apellido_donante,estado_donante,id_departamento,id_municipio,id_sangre,prueba_donante,telefono_donante,carnet,historial) VALUES 
        ('" . $this->getNombre_donante() . "','" . $this->apellido_donante . "','Created'," . $this->id_departamento . ","  . $this->id_municipio . "," . $this->id_sangre . ",'" . $this->prueba_donante . "','" . $this->telefono_donante . "','" . $this->carnet . "','" . $this->historial . "')";
        $result = false;
        if (!$result = $this->db->query($sql)) {
          return "Falló la creación del registro: (" . $this->db->errno . ") " . $this->db->error;
        }
        return $result;
      }
    
      public function update()
      {
        $sql = "UPDATE " . self::TABLE_NAME . " SET estado_donante = '" . $this->estado_donante . "' WHERE id_donante = " . $this->id_donante;
        echo $sql . "<br>";
        if (!$result = $this->db->query($sql)) {
          return "Falló la actualizacion del registro: (" . $this->db->errno . ") " . $this->db->error;
        }
        return $result;
      }
    
      public function delete()
      {
        $sql = "DELETE FROM " . self::TABLE_NAME . " where id_donante = " . $this->id_donante;
        echo $sql . "<br>";
        if (!$result = $this->db->query($sql)) {
          return "Falló la creación del registro: (" . $this->db->errno . ") " . $this->db->error;
        }
        return $result;
      }
      */
    }
?>