<?php
error_reporting(E_ALL ^ E_NOTICE);
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once($DOCUMENT_ROOT . '/lib/conf.sys.php');


class BiorythmInstallController
{
	// private $prefix = "PG_";
	private $BIORHYTHM_DATA = null;

	public function __construct()
	{
		$this->con = new utilDb();

		$this->BIORHYTHM_DATA = "PG_Biorhythm_data" ;
		$this->installBiorythmData();
	}

	private function installBiorythmData()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `".$this->BIORHYTHM_DATA."` (
                        `pbd_idx` INT(11) NOT NULL AUTO_INCREMENT,
                        `pbd_pm_idx` INT(11) NOT NULL,
                        `pbd_template` VARCHAR(20) NOT NULL,
                        `pbd_title` VARCHAR(100) NOT NULL,
                        `pbd_display_type` VARCHAR(50) NOT NULL,
                        `pbd_name` VARCHAR(100) NOT NULL,
                        `pbd_birth_date` VARCHAR(50) NOT NULL,
                        `pbd_target_date` VARCHAR(50) NOT NULL,
                        PRIMARY KEY (`pbd_idx`)
                        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";

		$this->con->query($sql);
	}

}

$install = new BiorythmInstallController();