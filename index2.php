<?php

// verificando o IP de acesso
$ip = $_SERVER["REMOTE_ADDR"];
$ip_dgov = "192.168.49.24";


if ($ip != $ip_dgov) 
{
   header("Location: http://appfloripa.pmf.sc.gov.br/portal/");
   header("Location: http://appfloripa.pmf.sc.gov.br/portal/");
}

//-------------------------------------------
// verifica se a conexão é via PC ou CELULAR
//-------------------------------------------

$mobile_browser = '0';

if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
   $mobile_browser++;
}



if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or
((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
   $mobile_browser++;
}    

$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
$mobile_agents = array(
   'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
   'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
   'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
   'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
   'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
   'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
   'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
   'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
   'wapr','webc','winw','winw','xda','xda-');

if(in_array($mobile_ua,$mobile_agents)) {
   $mobile_browser++;
}

if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
   $mobile_browser++;
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
   $mobile_browser=0;
}

//--------------------------------------------------------------------------------
// se a conexão for via celular, redireciona para MOBILE, se não abre normalmente
//--------------------------------------------------------------------------------
if($mobile_browser>0) {
//echo "<script language= \"JavaScript\">location.href=\"mobile/index.php\"</script>";
//echo "<meta http-equiv='refresh' content=\"0;url='mobile/index.php\">";
echo "<script language= \"JavaScript\">location.href=\"home.php\"</script>";
echo "<meta http-equiv='refresh' content=\"0;url='home.php\">";
}
else {
  include("home.php");
}  
