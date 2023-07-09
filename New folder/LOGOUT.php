<?php
setcookie("LoginAuth","",time()-7200,"/");
header("location:LOGIN.php?logout=true");
?>