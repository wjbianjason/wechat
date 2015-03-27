<?php 
header("Content-Type:text/html;charset=utf8");
$userid=$_GET['userid'];
$groupid=$_GET['groupid'];
?>
<form style='display:none;' id='form1' name='form1' method='post' action='http://www.zhaole365.com/zlgroups/<?php echo $groupid; ?>'>
              <input name='wid' type='text' value='<?php echo $userid; ?>' />
            </form>
            <script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>;





