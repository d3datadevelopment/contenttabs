<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package ContentTabs @version 4.2.0.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3001FA4B4AAQAAAAXAAAABHAAAACABAAAAAAAAAD/CkSc9MQzXlcaRkKlacxS66o6e5JUvMqlV8viF55u5lMTzWXPItHyiqPA7qosfaL7ZH6boTSLVsznUNL1AuItIAY2UtEi1/XVzt0wwZUExwR+PVzsWS0VZ/Y0EL4doLqrCsqAU9Kx5oq8/5KLhYWPoAgAAAB4AgAAqCRBhq4FKp9CB3E2Buf3OJE6MybFaelmH6APrcypHTzBAv1JkRkI334niI8oTV1Te+4jgGIwAYbOaG/pIFQV9P/Utc4Sm9HplWPcOcIdvAWUEp0Lg+7nk6J65P+noRnNOGXJzl73FFla2m+5lBUpd4IYXq9fjw2Pih7WExsTUDlL24zYVYF7RJEH+F7ExE59Sh4d+gYVZOPmm1eASpqVDN1oqhCA5yVPiqnQUTzCp+0wY6a2a8TqGrynUmxjYuBm0WyuQELhyP19uEzS7oAcdJSUqj7mgCka2iMzPaV6M0YZj2QpC2Cg2ESY6slsq3Lgo6CQg+UEXwwedUswcwQmJ001Zmqjxy5pWA0i8JpsyT42uDtN0/2XllgKTReXcXj3RoB/X8Kv/lLLuDCyaP6Rp81VlzzGixO1kq+/FQJ5/fxVpBl6DQ5lPrVHVf8qt9nbYGhj0L6h3DexAxIWNQ9/G3kltitUfMKh2Sq9Bzo5I+jbzB4a+emZJKTMZ3fW8GdqA5LO3dCHVArBMjYrnLH14199wXNjAAvXwiFPDiRg2aOIMmmOFMj4w8upaSdU+quOGaxA/10T1QaFYLYIS0wjUlyj3FH8vncl5LqIpvMpZFK0z5s6aT32L3wvM2qwVHRYhmtNvRH/L9uGybGMPI4H0SSLXVBx3Bt1waIVKfIr0Wq3kLF4I3UR8A9DrQ61Po2yG3xIIYgn4+3IrEspcYiShu4yIvBItp2vcUOYwp/JzYDyshu2uymRKc9epKPcohPH9Oqne+L65YK9hTMMuhmTPHiWDKZYCiSHK8EN7BZPPtrW4IE2aayS+dMJSttmFx//PyKKMFNsw0VRAAAAeAIAAGnPsrxi2KcNuRHzYdwfbudccbYxxMY5mL06DUGAjKdcpRLEo5K/X5SVRtr7nlKQOlkCmcc0D+R5VijsWcoiF6moMD1fjSQfpTYevu/UmBi63an5RtphL/6j6p61uBrKrY3LOqihNC+K6eTnAgzQOpkeL4y6SwBjAVd0bKH3gXQuS3RHlTvtXqIkdsGdz/vsj2fCnOiv77MDRNOMktm39tonpW9w/bk0ueikt0mhtIvNpBfL2KmvKUESOR1FgRWBPrFHBdJVgkposQ41miqlEpo8G4Iw54CSRpKeKbK5eqvVWxrazboyrWMCw+xG5VtosWMaXLLYykHrG8zxut4n+qTEvVAakvTG3ef/qkBkcDPN8HmM+0kOJsIxNwtpa7yQJmLtE6shWdYvx1VUzwHIY2k/hQLruyEsooa9dhegxBwC9kuDVigxayrRttfxkVWO0s1tRSpsvESokJoJpM2NfjUo7yIyXEowXOiXzDwYjTdKiLGU3wBTPep3RIr5+5B91MIJH5ZVTvMUX5J8Z17CEhTYs4o9f16LKQquI5tGwg52V+Fcz+CMVaR3CymTFEJfuQ2RuW22mxT3oXdOjLjKtCJiERxH3TeRiPAI2NpoaqP5jc4uTQv0HykqadByDJkIirHiiIE4qPIsAtyONuelFtxGuNJABn9yXarYbg50HEU49q0PBsL63xGLFzRfrjHcrTEDpwkVDh/zGCfUj9ZuWbTEw7uJANGFWdOyHIb71oZtYBh3rJAs0xeywHOX2sRFkQP+wdLTMnU6Cw0ty8mO3nLGLhlVRXydzjvgs6kLAdQTIkybdAYgTZ4WOZK1zfdpn3oi0wlnaf57AAAAAA==');
