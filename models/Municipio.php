<?php
require_once "./database/MySqlConnection.php";

class Municipio extends MySqlConnection
{
  const TABLE_NAME = 'municipios';

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

  public function list($filter = [])
  {    
    $sql = "SELECT * FROM " . self::TABLE_NAME . " m";
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
              $sql .= "m.municipio LIKE '%" . $value ."%'"; 
              break;
            case 'departamento':
              $sql .= "m.idDepartamento = " . $value ." "; 
              break;
          }
        }
        $i++;
      }
    }
    return $sql;
  }
}

if (isset($_REQUEST['departamento'])) {
  
  $filter = ['departamento' => $_REQUEST['departamento'] ];

  $municipio = new Municipio();
  $list = $municipio->list($filter);

  $html = '<option disabled selected>Municipio</option>';
  foreach ($list as $municipios) { 
      $html .= '<option value="' . $municipios->idMunicipio . '"> ' . $municipios->municipio . '</option>';
  }
  echo $html;
}

