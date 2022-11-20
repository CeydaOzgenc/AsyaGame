<?php
  include "../admin_panel/database.php";
  mysqli_query($db,"insert into contact_message(Message_name,Message_mail,Message_titile,Message_text) values('".p('name')."',".p('email').",'".p('subject')."','".p('message')."')");
 ?>