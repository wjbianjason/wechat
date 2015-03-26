<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<?php 
require_once('SolrUtil.php');
$solrUser = new SolrUtil('http://www.zhaole365.com:8983/solr/', 'wechat');
// $_GET['eventid']='307';
// $_GET['userid']='o_uzVs2odFAnKCgfqcPA8TVOGpDk';
$userid=$_GET['userid'];
$groupid=$_GET['groupid'];
// $params['index']='user';
// $params['type']='weixin';
// $params['body']['query']['term']['userid']=$userid;
$flag=0;
$user_result=$solrUser->select(array('q'=>"id:$userid"));
if(isset($user_result['data']['response']["docs"][0]["attend_groupid"]))
{
  $save=$user_result['data']['response']["docs"][0]["attend_groupid"];
  foreach($save as $group)
  {
    if($group==$groupid)
       $flag=1;
  }
}
// if(isset($user_result['data']['response']["docs"][0]["address"]))
//   {
//     $user_address=$user_result['data']['response']["docs"][0]["address"];
//     $user_latitude=$user_result['data']['response']["docs"][0]["latitude"];
//     $user_longitude=$user_result['data']['response']["docs"][0]["longitude"];
//   }


// $title=$bird_result['data']['response']["docs"][0]["title"];
// $imgSrc=$bird_result['data']['response']["docs"][0]["imgSrc"];
// $info=$bird_result['data']['response']["docs"][0]["description"];
// $price=$bird_result['data']['response']["docs"][0]["price_info"];
// $category=$bird_result['data']['response']["docs"][0]["category"][0];
// $time=$bird_result['data']['response']["docs"][0]["happentime"];
// $address=$bird_result['data']['response']["docs"][0]["location_description"][0];
// 
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <meta name="format-detection" content="telephone=no">
    <title>找乐乐群</title>
    <!-- <link rel="stylesheet" type="text/css" href="src/core.css"> -->
<style type="text/css">
.shadow { 
z-index: 999; 
position: absolute; 
top: 55%; 
right: 8%; 
padding: 0 0 0 0; 
}
</style>
</head>
<body style="padding:0 0 0 0;margin:0 0 0 0">
    <div class="shadow" >
    <div class="nav">
    </div> 
    <div class="info">
      <?php 
      if($flag)
        echo "<span id='save_exist'><button type='button' onclick='save_exist()' ><font size='4' >取消收藏</font></button></span>";
      else
        echo "<span id='save'><button type='button' onclick='save()'><font size='4' color='#FF6600'>&nbsp;&nbsp;收&nbsp;&nbsp;&nbsp;藏&nbsp;&nbsp;</font></button></span>";
      ?>
<script type="text/javascript">

  function save()
  {
    var xmlhttp;
    if(window.XMLHttpRequest)
    {
      xmlhttp=new XMLHttpRequest();
      // document.write("1");
    }
    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState==4)
      {
        //document.write("1");
        // document.getElementById("save").innerHTML=xmlhttp.responseText;
        document.getElementById("save").innerHTML="<span id='save_exist'><button type='button' onclick='save_exist()'><font size='4'>取消收藏</font></button></span>";
      }
    }
    xmlhttp.open("POST","http://wjbianjason.sinaapp.com/savegroup.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send('<?php echo "type=1&groupid=".$groupid."&userid=".$userid;?>');
  }
  function save_exist()
  {
    var xmlhttp;
    if(window.XMLHttpRequest)
    {
      xmlhttp=new XMLHttpRequest();
      // document.write("1");
    }
    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState==4)
      {
        //document.write("1");
        document.getElementById("save_exist").innerHTML="<span id='save'><button type='button' onclick='save()'><font size='4' color='#FF6600'>&nbsp;&nbsp;收&nbsp;&nbsp;&nbsp;藏&nbsp;&nbsp;</font></button></span>";
      }
    }
    xmlhttp.open("POST","http://wjbianjason.sinaapp.com/savegroup.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send('<?php echo "type=0&groupid=".$groupid."&userid=".$userid;?>');
  }
  </script>
    </div>
</div>
<div style="padding:0 0 0 0;margin:0 0 0 0">
 <iframe src="http://www.zhaole365.com/zlgroups/<?php echo $groupid; ?>" id="page" style="width:100%;height:650px;padding:0 0 0 0;margin:0 0 0 0" frameborder='0'  name="content" onload="this.height=this.contentWindow.document.documentElement.scrollHeight"></iframe>
</div>
</body></html>