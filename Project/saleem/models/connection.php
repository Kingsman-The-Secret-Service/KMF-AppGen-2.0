<?php 

require_once ActiveRecordDIR."/ActiveRecord.php";

ActiveRecord\Config::initialize(function($cfg){

$DBTYPE = "mysql";
$HOST = "localhost";
$DATABASE = "villapartner";
$USERNAME = "root";
$PASSWORD = "excel.123";
$CHARSET = "utf8";

$cfg->set_model_directory("models");
$connections = array("development" =>"".$DBTYPE."://".$USERNAME.":".$PASSWORD."@".$HOST."/".$DATABASE.";charset=".$CHARSET);
$cfg->set_connections($connections);

});

?>
