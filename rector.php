<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package ContentTabs @version 5.0.0.0 SourceGuardian (23.01.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');