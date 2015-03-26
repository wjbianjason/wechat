<?php
require_once('SolrUtil.php');
$type=$_POST['type'];
$groupid=$_POST['groupid'];
$userid=$_POST['userid'];
$solrUser = new SolrUtil('http://www.zhaole365.com:8983/solr/', 'wechat');
// $params['index']="user";
// $params['type']="weixin";
// $params['body']['query']['term']['userid']=$userid;
$rtn=$solrUser->select(array('q'=>"id:$userid"));
if(isset($rtn['data']['response']["docs"][0]["attend_groupid"]))
{
	$save=$rtn['data']['response']["docs"][0]["attend_groupid"];
}
// $_id=$rtn['hits']['hits'][0]['_id'];
// $params['id']=$_id;
if($type=='0')
{
	$solrUser->update(array('id'=>$userid,'attend_groupid'=>array('set'=>null)));
	for($i=0;$i<count($save);$i++)
	{
		if($save[$i]==$groupid)
		{
			unset($save[$i]);
		}
	} 
	// $params['body']=array(
	// 	'doc'=>array(
	// 		'save'=>$save));
	// $client->update($params);
	foreach($save as $group)
	{
		$solrUser->update(array('id'=>$userid,'attend_groupid'=>array('add'=>$group)));
	}
}
else
{
	// $params['body']=array(
	// 	'doc'=>array(
	// 		'save'=>$save));
	// $client->update($params);
	$solrUser->update(array('id'=>$userid,'attend_groupid'=>array('add'=>$groupid)));
}
?>