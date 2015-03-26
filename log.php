<?php 
header("Content-Type:text/html;charset=utf8");
$userid=$_GET['userid'];
$eventid=$_GET['eventid'];
$lat=$_GET['lat'];
$lng=$_GET['lng'];?>
<form style='display:none;' id='form1' name='form1' method='post' action='http://www.zhaole365.com/zlevent/<?php echo $eventid; ?>'>
              <input name='wid' type='text' value='<?php echo $userid; ?>' />
              <input name='lat' type='text' value='<?php echo $lat; ?>'/>
              <input name='lng' type='text' value='<?php echo $lng; ?>'/>
            </form>
            <script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>;





