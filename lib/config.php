<?php

/*
 * @author 	: 	Akhtar Husain <akhtar4660@gmail.com>
 * @package : 	Admin Panel
 * @version : 	1.0
 */

ob_start();
session_start();

const HOSTNAME = 'localhost';
const DBNAME = 'akhtar_test';
const USERNAME = 'root';
const PASSWORD = '';

const DS = DIRECTORY_SEPARATOR;
const ENVIRONMENT = 'development'; // OR production => live

if( ENVIRONMENT == 'development' ){
	error_reporting(-1);
}
else{
	error_reporting(0);
}

$basepath = realpath( dirname( dirname(__FILE__) ) );
$httpProt = isset($_SERVER['https']) ? 'https://' : 'http://';
$baseurl = $httpProt.$_SERVER['HTTP_HOST'].str_replace(DS, '/', strrchr($basepath, DS)).'/';

$basepath = $basepath.DS;
$curPage = basename($_SERVER['SCRIPT_NAME'], '.php');

define( 'BASEPATH', $basepath );
define( 'BASEURL', $baseurl );
define( 'CURRENT_PAGE', $curPage );

/** ========== C O N S T A N T   E N D S   H E R E ============ **/

/**
 *
 * ========== I N C L U D E   N E C E S S A R Y   F I L E S ===========
 *
 */
if( file_exists(BASEPATH . 'vendor'.DS.'autoload.php') ){
	//require BASEPATH ."vendor/autoload.php";
	require BASEPATH . 'vendor'.DS.'autoload.php';
}
else{
	exit("Autoload file does not exists. Please try to regenerate autoload file using command `composer dump-autoload`");
}

use App\Functions;
$func = new Functions();
/** =========== F I L E   L O A D I N G   E N D S   H E R E  =========== **/

function _print_r($var)
{
	if( empty($var) )
		return false;
		
	print "<fieldset style=\"border: 1px solid black; font:12px 'Courier new',monospace; padding:10px; margin:10px 0;\">";
	print "<legend>";
	print "<b>PRINT RESULT</b>";
	print "</legend>";
	print "<pre>";
	print_r($var);
	print "</pre>";
	print "</fieldset>";
}