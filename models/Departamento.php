<?php
require_once "database/MySqlConnection.php";

class Departamento extends MySqlConnection
{
  const TABLE_NAME = 'departamentos';

  private $idDepartamento;
  private $departamento;

  public function setIdDepartamento($idDepartamento){
      $this->idDepartamento = $idDepartamento;
    }

    public function getIdDepartamento(){
      return $this->idDepartamento;
    }

    public function setDepartamento($departamento){
      $this->departamento = $departamento;
    }

    public function getDepartamento(){
      return $this->departamento;
    }

  public function __construct()
  {
    parent::__construct();    
  }

  public function list($filter = [])
  {
    $sql = "SELECT * FROM " . self::TABLE_NAME . " dp";
    $sql .= $this->createSqlFilter($filter);
    
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
    $filters = ['name']; // set available filters here
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
              $sql .= "dp.nombre_departamento LIKE '%" . $value ."%'"; 
              break;
          }
        }
        $i++;
      }
    }
    return $sql;
  }
}