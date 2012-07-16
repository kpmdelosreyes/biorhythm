<?php
error_reporting(E_ALL ^ E_NOTICE);
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once($DOCUMENT_ROOT . '/lib/conf.sys.php');

class BiorythmUninstallController
{
	// private $prefix = "PG_";
	private $BIORHYTHM_DATA = null;

	public function __construct()
	{
		$this->con = new utilDb();
		$this->BIORHYTHM_DATA = "PG_Biorhythm_data" ;
        $this->deleteTables();
	}

	private function deleteTables()
	{
		$sql = "DROP TABLE IF EXISTS `".$this->BIORHYTHM_DATA."`";
		$this->con->query($sql);
	}
}

$uninstall = new BiorythmUninstallController();