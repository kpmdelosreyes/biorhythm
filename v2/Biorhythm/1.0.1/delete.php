<?php
error_reporting(E_ALL ^ E_NOTICE);
$DocROOT = $_SERVER['DOCUMENT_ROOT'];

require($DocROOT . '/lib/util/utilDb.php');

class BiorythmUninstallController
{
	private $prefix = "PG_";
	private $BIORYTHM_DATA = null;

	public function __construct()
	{
		$this->con = new utilDb();
		$this->BIORYTHM_DATA = $this->prefix."Biorythm_data";
        $this->deleteTables();
	}

	private function deleteTables()
	{
		$sql = "DROP TABLE IF EXISTS `".$this->BIORYTHM_DATA."`";
		$this->con->query($sql);
	}
}

$uninstall = new BiorythmUninstallController();