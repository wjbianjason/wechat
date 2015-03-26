<?php 
header("Content-Type:text/html;charset=utf8");
define('IN_SYS',true);
require_once 'class_weixin.php';
require_once('SolrUtil.php');
ini_set('max_execution_time','50000');

$wechat=new PushEvent();
$wechat->Push();
class PushEvent{

public $wxmoli;
public $solrUser;
public $solrEvent;
function __construct() 
{
	$this->solrUser= new SolrUtil('http://www.zhaole365.com:8983/solr/', 'wechat');
	$this->solrEvent=new SolrUtil('http://www.zhaole365.com:8983/solr/', 'events');
	$this->wxmoli = new WX_Remote_Opera();
	$this->wxmoli->init('394694328@qq.com','624386547');
}
//群发消息
public function PushAll(){
$sResult = $this->wxmoli->getsumcontactlist();
$sum = 0;
for($i = 0;$i < count($sResult);$i++){
    $sum  =$sum + $sResult[$i]['cnt'];
}
$page = ceil($sum/10);
for($i = 0;$i < $page;$i++){
$grest = $this->wxmoli->getcontactlist(10,$i);
    for($m = 0;$m < count($grest);$m++){
        // $wxmoli->sendmsg('中午好',$grest[$m]['id'],'');
        echo $grest[$m]['id']."\n";
   		 }
	}
}
public function Push(){
	$this->wxmoli->setimgmsg(202827690,2225514744);
}
}
?>