<?php
require_once "database/MySqlConnection.php";

class Municipio extends MySqlConnection
{
  const TABLE_NAME = 'tbl_municipio';

  private $idMunicipio;
  private $municipio;
  private $idDepartamento;

  public function setIdMunicipio($idMunicipio){
    $this->idMunicipio = $idMunicipio;
  }

  public function getIdMunicipio(){
      return $this->idMunicipio;
  }

  public function setnombre($nombre){
    $this->nombre = $nombre;
  }

  public function getnombre(){
    return $this->nombre;
  }

  public function setIdDepartamento($idDepartamento){
    $this->idDepartamento = $idDepartamento;
  }

  public function getIdDepartamento(){
    return $this->idDepartamento;
  }

  public function __construct()
  {
    parent::__construct();    
  }

  public function list($page = 1, $limit = 20, $filter = [], $sort = [])
  {
    
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM " . self::TABLE_NAME . " m";

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
    $filters = ['name', 'departamento']; // set available filters here
    if (count($filter)) {
      $i = 0;
      foreach ($filter as $key => $value) {
        $searchInFilters = array_search($key, $filters);
        if ($searchInFilters === false) $searchInFilters = -1;
        echo "<br>";
        if ($searchInFilters >= 0  ) {
          $sql .= ($i == 0 ) ? " WHERE " : " AND ";
          switch ($key) {
            case 'name':
              $sql .= "m.nombre_municipio LIKE '%" . $value ."%'"; 
              break;
            case 'departamento':
              $sql .= "m.id_departamento = " . $value ." "; 
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
    $fields = ['id', 'name', 'departamento']; // set available filters here
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
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " m.id_municipio " . $value ." "; 
              break;
            case 'name':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " m.nombre_municipio " . $value ." "; 
              break;
            case 'departamento':
              if ( $value == 'ASC' || $value == 'DESC' ) $sql .= " m.id_departamento " . $value ." "; 
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

