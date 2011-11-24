<?php
 
 $username = "izotvorec";
 $password = "wc3dfclm";

?>
<html>
<body onLoad="submit()">
<form id="count" action="http://api.namba.kg/getNewMailCount.php" method="POST">
<input type="hidden" name="username" value="<?php echo $username; ?>"/>
<input type="hidden" name="password" value="<?php echo $password; ?>"/>
<input type="hidden" name="outputType" value="xml"/>
</form>
<script type="text/javascript">
 function submit()
 {
   var f = document.getElementById("count");
   f.submit();
 }
</script>
<body>
</html>