<?php
$user=trim($_GET['u']);
@mysql_connect("localhost","root","");
@mysql_select_db("wiki");
if($user!="")
{
$sql="select first_name from user_data where first_name=`$user`";
$user_array=array();
$rdata=mysql_query($sql);
$res=mysql_fetch_array($rdata);
if($res['first_name']==$user)
{
echo " <p style='color:red;'><b>\"$user\"</b> Is already taken.</p>";
}
else
{
echo "<p style='color:green;'><b>\"$user\"</b> is available.</p>";
}
}
?>