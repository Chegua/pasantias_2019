<?php 
  ini_set('date.timezone', 'America/Caracas');

  //$time1=date('M:i:s', time());

  //$time2=date('Y-m-d', time());
  $time2=date('Y', time());
  echo '<strong>Periodo escolar: '. $time2.'-';
  //echo date("g:i a", strtotime($time2));
  $periodo= $time2+1;
  echo $periodo.'</strong>'; 
 
 ?>