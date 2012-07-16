<?php

/* Base Define Info */
define ("PLUGIN_NAME" , "Biorhythm");

define ("PLUGIN_VERSION" , "1.0.0");

define ('PLUGIN_USER_ID', 'dev_vallente');

define ('PLUGIN_TPL_FILENAME', 'index.tpl');

/* Base Additional Info */
define ("PLUGIN_TPL_USER_FILENAME" , "index_".PLUGIN_USER_ID.".tpl");

define ('PLUGIN_TPL_FILENAME', PLUGIN_TPL_USER_FILENAME);

define ("PLUGIN_URL" , SERVER_PLUGIN_URL.PLUGIN_NAME."/".PLUGIN_VERSION."/");

define ("PLUGIN_PATH" , SERVER_PLUGIN_PATH.PLUGIN_NAME.DS.PLUGIN_VERSION.DS);

define ("PLUGIN_TEMPLATE_PATH" , PLUGIN_PATH."templates".DS);

unset ($sCurUrl, $sCurrentPluginName, $sCurrrentPluginVersion);