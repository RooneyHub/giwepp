<?php
   session_start();
   session_destroy();
   if($_GET['user_session']==0)
   echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
   else
   echo "<meta http-equiv='refresh' content='0;url=../org.giwepp_pf.vista/login.html'>";
   ?>
