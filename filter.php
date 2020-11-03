<?php 

/**Este archivo se utiliza para hacer el filtro de los municipios con respecto a los departamentos*/
  require_once 'models/Municipio.php';
  
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
?>