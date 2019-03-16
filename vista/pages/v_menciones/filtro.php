<?php
require_once('../../../modelo/m_menciones.php');
$Mencion = new menciones();
$q='';
$salida = "";
if (isset($_POST['consulta'])){
 $q = $_POST['consulta'];
 $resultado = $Mencion->consultar2($q);
 if ($resultado->rowCount()>0){
  $numero=0;
  $salida.="
  <div class='col-md-12'>
  <h5>Registros Encontrados: (".$resultado->rowCount().")</h5>
  </div>
  <table class='table'>
  <thead>
  <tr>
  <th style='width:40px;'>N°</th>
  <th>Mencion</th>
  </tr>
  </thead>
  <tbody>";
  while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $numero++;
    $salida.="
    <tr>
    <td>".$numero."</td>
    <td>".$fila['mencion']."</td>
    </tr>";

  }
  $salida.="
  </tbody>
  </table>";
}else{
 $salida.="

 <div class='col-md-12'>
 <h5>Registros Encontrados:</h5>
 </div>
 <table class='table table-sm table-hover'>
 <thead>
 <tr>
 <th style='width:40px;'>N°</th>
 <th>Mencion</th>
 </tr>
 </thead>
 <tbody>
 <td>N°</td>
 <td>No se encontraron resultados que coinciden con el nombre.</td>
 </tbody>
 </table>
 ";
}
}else{
  $salida.="
  <div class='col-md-12'>
  <h5>Registros Encontrados:</h5>
  </div>

  <table class='table table-sm table-hover'>
  <thead>
  <tr>
  <th style='width:40px;'>N°</th>
  <th>Mencion</th>
  </tr>
  </thead>
  <tbody>
  <td>N°</td>
  <td>Datos no encontrados</td>
  </tbody>
  </table>
  ";
}
echo $salida;
?>