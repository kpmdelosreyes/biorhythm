<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Biorhythm Plug-in</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	{if $aData.pbd_template=='blue'}
		<link type="text/css" rel="stylesheet" href="{$sPgDir}css/blue.css" media="screen" />
	{else}
		<link type="text/css" rel="stylesheet" href="{$sPgDir}css/gray.css" media="screen" />
	{/if} 
	<link href="{$frontcss}" type="text/css" rel="stylesheet" />

	<script type="text/javascript" src="{$jquery}"></script>
	<script type="text/javascript" src="{$emulation}"></script>
	<script type="text/javascript" src="{$frontjs}"></script> 
	<script type="text/javascript" src="{$sPgDir}js/biorythm.front.js"></script>
</head>
