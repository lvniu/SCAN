<?php
$conn = mysqli_connect('localhost', 'root', '123456', 'test');
if(!$conn)
die('����ʧ�ܣ�' . mysql_error());
else
echo "���ӳɹ�!";

//mysql_close();
?>