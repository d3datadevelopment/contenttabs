<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package ContentTabs @version 5.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3C81FA58CAAQAAAAhAAAABKgAAACABAAAAAAAAAD/trXonbSELSRoKaiBFpsaNKGAbq8pA/ZXmicAQHU1Fh7hBCzCtB6srE+uVm2jQ4j6U9PDbvW2/yfs+uZfWrjmXKG0byiF/NCnMxMFWG+uuDZe+uC/55Xce10ZjsgfCfRXzZg5koHcVqPmdeTD5Zam9eFsDYtirVYQGyV8zmL3ODOpUZ421/Bgn53nkeiI/TxRRBYVxVO6iwN4Q7CjcLMy40v/uFt6i4W8CAAAAOgAAACt8GjZZVCzKa7jpphW8ioftgETEdVdkUt7w2xsopT4uvldRnPZPbUCP9XJVq85kbo3t2chB6ACxaG3fTPOHCY7VPNe0wN+hQl6zv5+El8mOYBAsaETNK2OGPutmtDfifY5atK2Q9GTxaZQpFaeRZyUI9uOyAjebq7n7b2DZ0IiwZfoX8IA5WY8FWBN/DlCh3owqoLr6q6yAKCdB9PgWivqX4BMQILj8fu+5GRRyQOCdKzsPEYrlC/uFbq0jZwBqzFUvaVLdtmS9zV81PB48yxc+iaoZLe7sOdBpDU09OKijvz/+0KZYnw/UQAAAOgAAADFo/FjtppdMonMuLzaS0mzqGh2IFDrqyS9RHXLALnxANgh86c+5cmNMm/Q1CPHLbGBO8SY7cxsvLcKIs/IYitm9az7oEiCGmqNci1ZJNVQ+eff6K7/TNOcef1ACTH97LFQZXLh3ch0Aj4tsrR3+VbzbpALCFJjEww6J9lxXQ4VvLQC/P5TMuA57spe9pvVSqPz0dvXsOzaPwxVWf4VhNF9NNiSlxhAtjNPL8HbWV/3diGOtKrhxGozaBGZKPQPwiljkGf2f8PUAWA2Pf7B16dsyU5i9l2T2DorJKm/i0Se28tvFUXX+rvCUgAAAOgAAACovVgnqhyFwvlgHwo0K+WzQ+IJ+nLatm8jjZk+bh0xG2x4kO2wtPXDNAbcCtIatGG1gwCg4n57aNTn+IRczkEJjFUgHMItcd/oIiBQ6hZ7jvu8MKwsTqKYL/sUkxYSkkXcMdqEGPUJebtfxLPPGvJZpyfYo80fMjhi1KYXe7Ek6oi1+rDdnasFA86DWB8IKhm1VzCn9j9JkNhya7LQRNn4ULD4uEAMjt/wlNkLHUIKiRjTo2wL0oARk8yzxxjJgNRzgIzGKBB9we5/eqfRAAZ4zy0Ll4spo71E5In+4+Cjj8sOaTBs9tDXAAAAAA==');
