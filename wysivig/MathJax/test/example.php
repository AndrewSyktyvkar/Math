<!DOCTYPE html>
<html>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX","output/HTML-CSS"],
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="../MathJax.js"></script>

<?php
	if (isset($_POST['text']))
	{
		if(preg_match_all('/^(.+?)$/m', $_POST['text'], $lines)) {
		$NSTR=sizeof($lines[1]);
		}else $NSTR=0;
		$str = explode("\n",$_POST['text']);
		$x=0; 
		while ($x<$NSTR)
		{   
			$str[$x]=substr($str[$x],3);
	  	$str[$x]=substr($str[$x],0,-4);
			$x++;
		}
    $text1= implode($str);
		echo $text1;
	}
?>
</html>
