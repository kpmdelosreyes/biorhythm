<?php
error_reporting(E_ALL ^ E_NOTICE);
$DocROOT = $_SERVER['DOCUMENT_ROOT'];

require($DocROOT . '/lib/util/utilDb.php');

class BiorythmInstallController
{
	private $prefix = "PG_";
	private $BIORYTHM_DATA = null;

	public function __construct()
	{
		$this->con = new utilDb();

		$this->BIORYTHM_DATA = $this->prefix."Biorythm_data";
		$this->installBiorythmData();
	}

	private function installBiorythmData()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `".$this->BIORYTHM_DATA."` (
		  `pbd_idx` int(11) NOT NULL auto_increment,
		  `pbd_pm_idx` int(11) NOT NULL,
		  `pbd_title` varchar(100) NOT NULL,
		  `pbd_display_type` varchar(50) NOT NULL,
		  `pbd_name` varchar(100) NOT NULL,
		  `pbd_birth_date` varchar(50) NOT NULL,
		  `pbd_target_date` varchar(50) NOT NULL,
		  PRIMARY KEY  (`pbd_idx`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";

		$this->con->query($sql);
	}

}

$install = new BiorythmInstallController();