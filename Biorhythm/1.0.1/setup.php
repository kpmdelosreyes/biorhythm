<?php
error_reporting(E_ALL ^ E_NOTICE); 
$DocROOT = $_SERVER['DOCUMENT_ROOT'];

require($DocROOT . '/lib/Common.php');
require('./auth.dev.php');
require($DocROOT . '/lib/util/utilDb.php');
require($DocROOT . '/lib/util/utilPager.php');
require($DocROOT . '/lib/util/utilFileUpload.php');
require($DocROOT . '/lib/smarty/Smarty.class.php');

require(SERVER_PLUGIN_PATH.PLUGIN_NAME.'/'.PLUGIN_VERSION.'/includes/common.php');

class BiorythmSetupController extends BiorythmCommon
{
	protected $smarty;
	protected $con;
	private $userIdx;
	private $DEFAULT_ROW_LIMIT = 10;

	public function __construct()
	{
		parent::__construct();
		$this->con = new utilDb();
		$this->smarty = new Smarty();
		$this->smarty->assign('sScriptCrossDomain', CAFE24_CROSS_DOMAIN );
		$this->_init();
	}

	private function _init() 
	{
		$this->_setSmartyConfig();
		$this->_setPluginDefault();
		$this->_setRegisterAction();
	}

	private function _setSmartyConfig()
	{
        $this->smarty->caching = false;
	}

	private function _setPluginDefault()
	{
		$sUrl = $this->getCurrentUrl();		
		$this->sUrl = $sUrl['base'];
		$this->BIORYTHM_DATA    = "PG_" . PLUGIN_NAME . "_data"; 
		$this->BIORYTHM_MAIN    = "PG_" . PLUGIN_NAME . "_main";

		$this->smarty->assign("sUrl", $sUrl['base'],true);
		$this->smarty->assign("sPgDir",PLUGIN_URL,true);
		$this->smarty->assign("sPgPath", PLUGIN_PATH);
		$this->smarty->assign("sPgLib", SERVER_BASE_URL."lib/");
		$this->smarty->assign("jquery", SERVER_JQUERYJS_URL, true);
		$this->smarty->assign("emulation", SERVER_COMMONJS_URL, true);
		$this->smarty->assign("jqueryuijs", SERVER_JQUERYUIJS_URL, true);
		$this->smarty->assign("jqueryuicss", SERVER_JQUERYUICSS_URL, true);
		
		$this->userIdx = $this->getUserIdx();
	}

	private function _setRegisterAction()
	{
		$sAction = $this->getParam('Action');
		$sPage = $this->getParam('Page');
		$action = empty($sAction) ? (empty($sPage) ? "pageList" :  "page".ucwords($sPage) ) :  "exec".ucwords($sAction);
		$this->$action();
	}

	private function getUserIdx()
	{
		$sql = "SELECT * FROM ". $this->BIORYTHM_MAIN . " WHERE pm_userid = '".PLUGIN_USER_ID."'";
		$aMember = $this->con->query($sql, 'row');
		return $aMember['pm_idx'];
	}

	private function pageList()
	{
		$sql = "SELECT * FROM ". $this->BIORYTHM_DATA . " WHERE pbd_pm_idx = '".$this->userIdx."'";
		$aData = $this->con->query($sql, 'row');
		$action = 'Save';
		$sNow = date('Y-m-d');
		if ($aData) {
			$action = 'Modify';
			$this->smarty->assign('idx', $aData['pbd_idx']);
			$this->smarty->assign('title', $aData['pbd_title']);
			if ($aData['pbd_display_type'] == 'owner') {
				$this->smarty->assign('name', $aData['pbd_name']);
				$this->smarty->assign('displayType', $aData['pbd_display_type']);
				$this->smarty->assign('birthDate', $aData['pbd_birth_date']);
			} 
		}
		
		$this->smarty->assign('targetDate', $aData['pbd_target_date'] ? $aData['pbd_target_date'] : $sNow);
		$this->smarty->assign('action', $action);
		$this->smarty->assign('aData', $aData);
		$this->smarty->display('setup.tpl');
	}


	private function execSave()
	{
		$aParam = $this->getParams();
		$aData = $aParam['aData'];
		$aInsert = array();

		$aInsert['pbd_title'] = $aData['title'];
		$aInsert['pbd_display_type'] = $aData['displayType'];
		$aInsert['pbd_pm_idx'] = $this->userIdx;
		if ($aData['displayType'] == 'owner') {
			$aInsert['pbd_name'] = $aData['name'];
			$aInsert['pbd_birth_date'] = $aData['birthDate'];
			$aInsert['pbd_target_date'] = $aData['targetDate'];
		} 
		
		//$sql = utilDbQuery::getInsertQuery($this->BIORYTHM_DATA, $aInsert);
		//$insert = $this->con->executeQuery($sql);
	//	$idx = $this->con->lastInsertID('pbd_idx');
	$sql = $this->con->insert($this->BIORYTHM_DATA, $aInsert);
		
		echo json_encode(array('idx' => $idx));
	} 

	private function execModify()
	{
		$aParam = $this->getParams();
		$aData = $aParam['aData'];
		$idx = $aParam['idx'];
		$aUpdate = array();

		$aUpdate['pbd_title'] = $aData['title'];
		$aUpdate['pbd_display_type'] = $aData['displayType'];
		if ($aData['displayType'] == 'owner') {
			$aUpdate['pbd_name'] = $aData['name'];
			$aUpdate['pbd_birth_date'] = $aData['birthDate'];
			$aUpdate['pbd_target_date'] = $aData['targetDate'];
		} 
		$sWhere = "pbd_idx = '".$idx."'";
		//$sql = utilDbQuery::getUpdateQuery($this->BIORYTHM_DATA, $aUpdate, $sWhere);
		//$update = $this->con->executeQuery($sql);
		$sql = $this->con->update($this->BIORYTHM_DATA, $aUpdate, $sWhere);
		
		echo json_encode(array('idx' => $idx));
	}

}

$setup = new BiorythmSetupController();