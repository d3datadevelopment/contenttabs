<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package ContentTabs @version 5.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
