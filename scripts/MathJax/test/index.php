<!DOCTYPE html>
<html>
<?php
	require_once 'bd.php';
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<script type="text/javascript" src="tiny/js/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({            
        language : "ru",
		mode : "textareas",
        theme : "advanced",
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",     
	    theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
});
</script>

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
  	    $text1= implode(" ",$str);
		$text1=htmlentities($text1);
}   
?>	

<body style="width:100%; height:100%; margin:10">
    <div style="float:left; width:100%; height:100%"> 
        <div style="float:left; width:50%; height:auto;">
			<form name="MyForm" method="post">
				<textarea name="text" cols="70" rows="20" id="content"><?php echo $text1; ?></textarea>			 
				<button type="submit" formaction="post.php" class="button_1">Отправить</button>
				<button type="submit" formaction="index.php" class="button_2">Формула</button>
				<button type="submit" formaction="News.php" class="button_3">Таблица</button>
			</form>
		</div>
        <div style="float:left; width:50%; height:auto;">
			 <?php
				include 'example.php';
             ?>
		</div>
    </div>
</body>
</html>


