<?php

$TestText = "[b]Hello[/b] this is a [i]test[/i].";
$TestTextVideo = "[video]n6k5qX8w718[/video]";
$TestTextImages = "[img]http://learn.jquery.com/resources/jquery-ui/themeroller-logo.png[/img]";

function BBCode($chaine)
		{
		$chaine = str_replace("[b]", "<b>", $chaine);
		$chaine = str_replace("[/b]", "</b>", $chaine);

		$chaine = str_replace("[br/]", "<br/>", $chaine);
		$chaine = str_replace("[br]", "<br/>", $chaine);
	   
		$chaine = str_replace("[i]", "<em>", $chaine);
		$chaine = str_replace("[/i]", "</em>", $chaine);
	   
		$chaine = str_replace("[u]", "<u>", $chaine);
		$chaine = str_replace("[/u]", "</u>", $chaine);
		
		$chaine = str_replace("[s]", "<s>", $chaine);
		$chaine = str_replace("[/s]", "</s>", $chaine);
	   
		$chaine = str_replace("[left]", "<p class='text-align: left;'>", $chaine);
		$chaine = str_replace("[/left]", "</p>", $chaine);
	   
		$chaine = str_replace("[center]", "<center>", $chaine);
		$chaine = str_replace("[/center]", "</center>", $chaine);
		
		$chaine = str_replace("[right]", "<p class='text-align: right;'>", $chaine);
		$chaine = str_replace("[/right]", "</p>", $chaine);
		
		$chaine = str_replace("[sup]", "<sup>", $chaine);
		$chaine = str_replace("[/sup]", "</sup>", $chaine);
	   
		$chaine = str_replace("[sub]", "<sub>", $chaine);
		$chaine = str_replace("[/sub]", "</sub>", $chaine);
		
		$chaine = str_replace("[code]", "<pre><code>", $chaine);
		$chaine = str_replace("[/code]", "</code></pre>", $chaine);         

		$chaine = str_replace("[video]", "<iframe width='250' src='https://www.youtube.com/embed/", $chaine);
		$chaine = str_replace("[/video]", "'></iframe>", $chaine);		
			
		$chaine = preg_replace("#\[\*\]?([^\[]*) ?#", "<li>\\1</li>", $chaine);
		$chaine = str_replace(array('[list]','[/list]'), array('<ul>','</ul>'), $chaine);
		
		$chaine = preg_replace("#\[url\]((ht|f)tp://)([^\r\n\t<\"]*?)\[/url\]#i", "'<a href=\"\\1' . str_replace(' ', '%20', '\\3') . '\">\\1\\3</a>'", $chaine);
		$chaine = preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/", "<a href=\"$1\">$2</a>", $chaine);

		$chaine = preg_replace("#\[email\] ?([^\[]*) ?\[/email\]#", "<a href=\"mailto:\\1\">\\1</a>", $chaine);
		$chaine = preg_replace("#\[email ?=([^\[]*) ?] ?([^]]*) ?\[/email\]#", "<a href=\"mailto:\\1\">\\2</a>", $chaine);
	   
		$chaine = preg_replace("#\[img\] ?([^\[]*) ?\[/img\]#", "<img src=\"\\1\" alt=\"\" />", $chaine);
		$chaine = preg_replace("#\[img ?= ?([^\[]*) ?\]#", "<img src=\"\\1\" alt=\"\" />", $chaine);
	   
		return $chaine;
	}
?>

<html>
	<head>
		<title>Simple bbcode interpreter | Example</title>
		
		<style>
			body{ font: 14px sans-serif; }
			.wrapper{ width: 350px; padding: 20px; }
		</style>
		
	</head>
	<body>
		<?php echo BBCode($TestText); ?>
		<br><br>
		<?php echo BBCode($TestTextVideo); ?>
		<br><br>
		<?php echo BBCode($TestTextImages); ?>
	</body>
</html>
