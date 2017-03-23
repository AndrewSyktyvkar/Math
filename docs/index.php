<?php
	require_once 'bd.php';
?>

 <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
 <script type="text/javascript">
  
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>


<form action="post.php" method="post">
   <p>     
     <textarea name="text" cols="50" rows="15"></textarea>
     <input type="submit" value="Отправить" />
   </p>
</form>