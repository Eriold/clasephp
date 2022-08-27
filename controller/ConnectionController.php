<?php

class ConnectionController
{

	var $objConnection;
	function __construct()
	{
		$this->objConnection;
	}
	function abrirBd($servidor, $usuario, $password, $db)
	{
		try {
			$this->objConnection = new mysqli($servidor, $usuario, $password, $db);
			if ($this->objConnection->connect_errno) {
				printf("Connect failed: %s\n", $this->objConnection->connect_error);
				exit();
			}
		} catch (Exception $e) {
			echo "ERROR AL CONECTARSE AL SERVIDOR " . $e->getMessage() . "\n";
		}
	}

	function cerrarBd()
	{
		try {
			$this->objConnection->close();
		} catch (Exception $e) {
			echo "ERROR AL CONECTARSE AL SERVIDOR " . $e->getMessage() . "\n";
		}
	}

	function ejecutarComandoSql($sql)
	{
		try {
			$this->objConnection->query($sql);
		} catch (Exception $e) {
			echo " NO SE AFECTARON LOS REGISTROS: " . $e->getMessage() . "\n";
		}
	}

	function ejecutarSelect($sql)
	{
		try {
			$recordSet = $this->objConnection->query($sql);
		} catch (Exception $e) {
			echo " ERROR: " . $e->getMessage() . "\n";
		}
		return $recordSet;
	}
}
