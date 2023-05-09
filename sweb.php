<?php
  include('db.php');
  BaseDatos('localhost','root','','onpe');
  //BaseDatos('localhost','id19446737_root','5]^LqN{mhJ2s?IDV','id19446737_cinestar');
  //BaseDatos('mysql8003.site4now.net','a97a05_cinesta','cinestar1234','db_a97a05_cinesta');

  $id = '';
  if ( isset( $_GET["id"] ) )  $id  = $_GET["id"];
  if ( isset( $_GET["idd"] ) ) $idd = $_GET["idd"];
  if ( isset( $_GET["idx"] ) ) $idx = $_GET["idx"];
  if ( isset( $_GET["idy"] ) ) $idy = $_GET["idy"];
  
  if ( $id == 'actas' ) getActas();
    else if ( $id == 'participacion' ) getParticipacion();

  function getActas () {
    global $idd, $idx, $idy, $_SQL;

    if ( $idd ) 
      if ( $idd == "numero") $_SQL = "call sp_getGrupoVotacion('$idx')";
        else if ( $idd == "ubigeo" ) {

      }

    getRegistros();
  }

    function getParticipacion(){
      global $idd, $_SQL;

      if ( $idd && ( $idd == "nacional" || $idd == "extranjero")) 
      if ( !$idx && !$idy ) $_SQL = $idd == "nacional" ? "call sp_getVotos(1,25)" : "call sp_getVotos(26,30)";
      if (  $idx && !$idy ) $_SQL = "call sp_getVotosDepartamento('$idx')";
      if (  $idy ) $_SQL = "call sp_getVotosPorvincia('$idy')"; 
      
    getRegistros();
    
  }

  
?>