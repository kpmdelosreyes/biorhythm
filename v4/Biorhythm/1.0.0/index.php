<?php
error_reporting(E_ALL ^ E_NOTICE);
require($_SERVER['DOCUMENT_ROOT'] . '/lib/Common.php');

require(SERVER_PLUGIN_PATH.PLUGIN_NAME.'/'.PLUGIN_VERSION.'/includes/common.php');

class BiorythmSetupController extends BiorythmCommon
{
	protected $smarty;
	protected $con;
	private $userIdx;

	public function __construct()
	{
            parent::__construct();
            $this->con = new utilDb();
            $this->smarty = new Smarty();

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
            //$this->smarty->debugging = true;
            //$this->smarty->cache_lifetime = 120;
            $this->smarty->caching = false;
	}

	private function _setPluginDefault()
	{
		$sUrl = $this->getCurrentUrl();
		$this->BIORHYTHM_DATA    = "PG_Biorhythm_data";
		$this->BIORHYTHM_MAIN    = "PG_Biorhythm_main";
		$this->smarty->assign("sUrl", $sUrl['base'],true);
		$this->smarty->assign("sPgDir",PLUGIN_URL,true);
		$this->smarty->assign("sPgLib", SERVER_BASE_URL."lib/");
		$this->smarty->assign("jquery", SERVER_JQUERYJS_URL, true);
		$this->smarty->assign("emulation", SERVER_COMMONJS_URL, true);
		$this->smarty->assign("jqueryuijs", SERVER_JQUERYUIJS_URL, true);
		$this->smarty->assign("jqueryuicss", SERVER_JQUERYUICSS_URL, true);
		$this->smarty->assign("frontcss", PLUGIN_URL."css/popup.calendar.css", true);
		$this->smarty->assign("frontjs", PLUGIN_URL."js/jquery.calendar.js", true);

		$this->userIdx = $this->getUserIdx();
	}

	private function _setRegisterAction()
	{
		$sAction = $this->getParam('Action');
		$sPage = $this->getParam('Page');
		$action = empty($sAction) ? (empty($sPage) ? "pageIndex" :  "page".ucwords($sPage) ) :  "exec".ucwords($sAction);
		$this->$action();
	}

	public function getUserIdx()
        {

            $sql = "SELECT pm_idx, pm_userid FROM ".$this->BIORHYTHM_MAIN." WHERE pm_userid = '".PLUGIN_USER_ID."'";
            $result =  $this->con->query($sql, 'row');

            return $result['pm_idx'];
        }

	private function pageIndex()
	{
            $sql = "SELECT * FROM " . $this->BIORHYTHM_DATA . " WHERE pbd_pm_idx = '" .$this->userIdx. "'";
            $aData = $this->con->query($sql, 'row');
            $sNow = date('Y-m-d');

            if ($aData) {
                if ($aData['pbd_display_type'] == 'owner') {
                    $this->fetchResult($aData);
                }
            }

            $this->smarty->assign('targetDate', $sNow);
            $this->smarty->assign('aData', $aData);
            $sHtmlTop = $this->smarty->fetch("header.tpl");
            $sHtmlBottom = $this->smarty->fetch("footer.tpl");
            $sHtmlContents = $this->smarty->fetch("body.tpl");

            $this->smarty->assign("template_top", $sHtmlTop,true);
            $this->smarty->assign("template_bottom", $sHtmlBottom,true);
            $this->smarty->assign("template_contents", $sHtmlContents,true);

            $this->smarty->display('main.tpl');
	}

	private function fetchResult($aData)
	{
            $sName      = $aData['pbd_name'];
            $birth_date = $aData['pbd_birth_date'];
            $calc_date  = $aData['pbd_target_date'];

            $options = $this->options();

                    foreach ($options as $key => $val) {
                            ${$key} = $val; 
                    }

                //extract($options);
                //list($days_to_calculate, $margin_gap, $horizontal_increment, $canvas_height, $image_height) = $options;

            $canvas_width = $margin_gap * 2 + $days_to_calculate * 2 * $horizontal_increment;
            $image_width  = $margin_gap * 2 + $days_to_calculate * 2 * $horizontal_increment;
            $half_height  = $image_height / 2;

            $img = imagecreatetruecolor($canvas_width, $canvas_height);
            $aColor = $this->rgbColor($img);

            $biorhythm_array = array(
                'physical'     => array(23, 'Physical', $aColor['red']),
                'emotional'    => array(28, 'Emotional', $aColor['green']),
                'intellectual' => array(33, 'Intellectual', $aColor['blue'])
             );

            $bg_color    = $aColor['gray'];
            $axis_color  = $aColor['black'];
            $today_color = $aColor['pink'];

            list($Y,$m,$d) = preg_split('/-/', $birth_date);
            $birth_mktime = mktime(0, 0, 0, (int)$m, (int)$d, (int)$Y);

            list($Y,$m,$d) = preg_split('/-/', $calc_date);

            for ($idx=-$days_to_calculate; $idx<=$days_to_calculate; $idx++) {
                $calc_mktime = mktime(0, 0, 0, (int)$m, (int)$d + $idx, (int)$Y);
                $days_from_birth = ($calc_mktime - $birth_mktime) / (60 * 60 * 24);
                foreach ($biorhythm_array as $key => $value) {
                    $return_array[$idx][$key] = sin(2 * pi() * $days_from_birth / $value[0]);
                }
        }

        imagecolortransparent($img, $bg_color);
        imagefilledrectangle($img, 0, 0, $image_width, $image_height, $bg_color); # the background
        imageline($img, 0, $half_height, $image_width, $half_height, $axis_color); # time axis
        imagefilledrectangle($img, (int)($image_width/2), (int)($half_height - $image_height*0.53), (int)($image_width/2), (int)($half_height + $image_height*0.53), $today_color); # today axis

        # Midpoint
        $x1 = ($image_width/2);
        $y1 = (int)($half_height - $image_height*0.53);
        $x2 = (int)($image_width/2);
        $y2 = (int)($half_height + $image_height*0.53);

        $midX = ($x1 + $x2)/2;
        $midY = ($y1 + $y2)/2;

        $iHeight = (abs($y1))+(abs($y2));
        $iHalfHeight = $iHeight/2;

        $i = 0;
        $aPercent = array();
        $avg = 0;
        $half_width = $image_width/2;
        $array_poly = array();
        foreach ($return_array as $key => $value) {
            $ellipse_cen_x = (int)($margin_gap + $horizontal_increment * $i++);
            $text_font = 3;
            $j = 1;

            foreach ($biorhythm_array as $bio_cycle_name => $bio_cycle_info) {
                $ellipse_cen_y[$bio_cycle_name] = $image_height - (int)($half_height + $half_height * $value[$bio_cycle_name]);
                $ellipse_cen[$key] = array($ellipse_cen_x, $ellipse_cen_y[$bio_cycle_name]);

                $array_poly[$bio_cycle_name][] = array($ellipse_cen_x, $ellipse_cen_y[$bio_cycle_name]);

                if ($ellipse_cen_x == $half_width) {
                    $x = $midY-$ellipse_cen_y[$bio_cycle_name];
                    $perc = round(($x/$midY)*100);
                    $icon = $this->getIcon($perc);
                    $aResult[$bio_cycle_name] = array('percent' => $perc, 'icon' => $icon);
                    $avg +=$perc;
                    imagestring($img, $text_font, $margin_gap * 6, $image_height + $margin_gap * 6 * $j++, $perc."%", $bio_cycle_info[2]);
                }

            }
        }

            foreach ($biorhythm_array as $name => $value) {
                $max = count($array_poly[$name]);
                foreach ($array_poly[$name] as $i => $val) {
                    if ($i < ($max-1)) {
                        imageline($img, $val[0], $val[1], $array_poly[$name][$i+1][0], $array_poly[$name][$i+1][1], $value[2]);
                    }
                }
            }
            $imgName = date('Ymd').'@'.date('is').'.png';
            $sPath = PLUGIN_PATH . 'upload/'.$imgName;
            imagepng($img, $sPath);
            imagedestroy($img);

            $avg = round($avg/3);
            $avgIcon = $this->getIcon($avg);
            $this->smarty->assign('avg', $avg);
            $this->smarty->assign('avgIcon', $avgIcon);
            $this->smarty->assign('aResult', $aResult);
            $this->smarty->assign('imgSrc', PLUGIN_URL.'upload/'.$imgName);
            $biorythm = $this->smarty->fetch('biorythm.tpl');

            $this->smarty->assign("biorythm", $biorythm,true);

	}

	private function pageResult()
	{
		$sName      = $this->getParam('name');
		$birth_date = $this->getParam('birthDate');
		$calc_date  = $this->getParam('targetDate');

		$options = $this->options();
		//Extract
		foreach ($options as $key => $val) {
			${$key} = $val; 
		}
		//extract($options);
		//list($days_to_calculate, $margin_gap, $horizontal_increment, $canvas_height, $image_height) = $options;

		$canvas_width = $margin_gap * 2 + $days_to_calculate * 2 * $horizontal_increment;
		$image_width  = $margin_gap * 2 + $days_to_calculate * 2 * $horizontal_increment;
		$half_height  = $image_height / 2;
		

		$img = imagecreatetruecolor($canvas_width, $canvas_height);
		$aColor = $this->rgbColor($img);

		$biorhythm_array = array(
			'physical'     => array(23, 'Physical', $aColor['red']),
			'emotional'    => array(28, 'Emotional', $aColor['green']),
			'intellectual' => array(33, 'Intellectual', $aColor['blue'])
		);

		$bg_color    = $aColor['gray'];
		$axis_color  = $aColor['black'];
		$today_color = $aColor['pink'];

		list($Y,$m,$d) = preg_split('/-/', $birth_date);
		$birth_mktime = mktime(0, 0, 0, (int)$m, (int)$d, (int)$Y);

		list($Y,$m,$d) = preg_split('/-/', $calc_date);

		for ($idx=-$days_to_calculate; $idx<=$days_to_calculate; $idx++) {
			$calc_mktime = mktime(0, 0, 0, (int)$m, (int)$d + $idx, (int)$Y);
			$days_from_birth = ($calc_mktime - $birth_mktime) / (60 * 60 * 24);
			foreach ($biorhythm_array as $key => $value) {
				$return_array[$idx][$key] = sin(2 * pi() * $days_from_birth / $value[0]);
			}
		}

		imagecolortransparent($img, $bg_color);
		imagefilledrectangle($img, 0, 0, $image_width, $image_height, $bg_color); # the background
		imageline($img, 0, $half_height, $image_width, $half_height, $axis_color); # time axis
		imagefilledrectangle($img, (int)($image_width/2), (int)($half_height - $image_height*0.53), (int)($image_width/2), (int)($half_height + $image_height*0.53), $today_color); # today axis

		# Midpoint
		$x1 = ($image_width/2);
		$y1 = (int)($half_height - $image_height*0.53);
		$x2 = (int)($image_width/2);
		$y2 = (int)($half_height + $image_height*0.53);

		$midX = ($x1 + $x2)/2;
		$midY = ($y1 + $y2)/2;

		$iHeight = (abs($y1))+(abs($y2));
		$iHalfHeight = $iHeight/2;

		$i = 0;
		$aPercent = array();
		$avg = 0;
		$half_width = $image_width/2;
		$array_poly = array();
		foreach ($return_array as $key => $value) {
			$ellipse_cen_x = (int)($margin_gap + $horizontal_increment * $i++);
			$text_font = 3;
			$j = 1;

			foreach ($biorhythm_array as $bio_cycle_name => $bio_cycle_info) {
				$ellipse_cen_y[$bio_cycle_name] = $image_height - (int)($half_height + $half_height * $value[$bio_cycle_name]);
				$ellipse_cen[$key] = array($ellipse_cen_x, $ellipse_cen_y[$bio_cycle_name]);

				$array_poly[$bio_cycle_name][] = array($ellipse_cen_x, $ellipse_cen_y[$bio_cycle_name]);

				if ($ellipse_cen_x == $half_width) {
					$x = $midY-$ellipse_cen_y[$bio_cycle_name];
					$perc = round(($x/$midY)*100);
					$icon = $this->getIcon($perc);
					$aResult[$bio_cycle_name] = array('percent' => $perc, 'icon' => $icon);
					$avg +=$perc;
					imagestring($img, $text_font, $margin_gap * 6, $image_height + $margin_gap * 6 * $j++, $perc."%", $bio_cycle_info[2]);
				}

			}
		}

		foreach ($biorhythm_array as $name => $value) {
			$max = count($array_poly[$name]);
			foreach ($array_poly[$name] as $i => $val) {
				if ($i < ($max-1)) {
					imageline($img, $val[0], $val[1], $array_poly[$name][$i+1][0], $array_poly[$name][$i+1][1], $value[2]);
				}
			}
		}
		$files = glob(PLUGIN_PATH . 'upload/*');
		$files = array_filter($files, 'is_file');
		array_map('unlink', $files);

		$imgName = date('Ymd').'@'.date('is').'.png';
		$sPath = PLUGIN_PATH . 'upload/'.$imgName;
		imagepng($img, $sPath);
		imagedestroy($img);

		$avg = round($avg/3);
		$avgIcon = $this->getIcon($avg);
		$this->smarty->assign('avg', $avg);
		$this->smarty->assign('avgIcon', $avgIcon);
		$this->smarty->assign('aResult', $aResult);
		$this->smarty->assign('imgSrc', PLUGIN_URL.'upload/'.$imgName);
		$this->smarty->display('biorythm.tpl');
	}

	private function getIcon($perc)
	{
		$icon = '';
		if ($perc >= 50) {
			$icon = 'super_happy';
		} else if ($perc >= 1 && $perc < 50) {
			$icon = 'happy';
		} else if ($perc <= 0 && $perc >=-49) {
			$icon = 'sad';
		} else {
			$icon = 'super_sad';
		}
		return $icon;
	}

	private function options()
	{
		return array(
			'days_to_calculate'     => 20,
			'margin_gap'            => 2,
			'horizontal_increment'  => 5,
			'canvas_height'         => 121,
			'image_height'          => 120,
		);
	}

	private function rgbColor($img)
	{
		return array(
			'white' => imagecolorallocate($img,255,255,255),
			'red'   => imagecolorallocate($img,255,0,0),
			'green' => imagecolorallocate($img,0,255,0),
			'blue'  => imagecolorallocate($img,0,0,255),
			'yellow'=> imagecolorallocate($img,255,255,0),
			'pink'  => imagecolorallocate($img,255,192,203),
			'black' => imagecolorallocate($img,0,0,0),
			'gray'  => imagecolorallocate($img,190,190,190)
		);

	}

}

$setup = new BiorythmSetupController();