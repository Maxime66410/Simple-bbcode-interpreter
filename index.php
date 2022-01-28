<?php

$TestText = "[b]Hello[/b] this is a [i]test[/i].";
$TestTextVideo = "[video]n6k5qX8w718[/video]";
$TestTextImages = "[img]http://learn.jquery.com/resources/jquery-ui/themeroller-logo.png[/img]";

function BBCode($chaine)
		{
		$chaine = str_replace("[b]", "<b>", $chaine);
		$chaine = str_replace("[/b]", "</b>", $chaine);

		/*$chaine = str_replace("[br/]", "<br/>", $chaine);
		$chaine = str_replace("[br]", "<br/>", $chaine);*/
	   
		$chaine = str_replace("[i]", "<em>", $chaine);
		$chaine = str_replace("[/i]", "</em>", $chaine);
		
		
		// BBCode Security Fix
		$chaine = str_replace("<script>", "<p>", $chaine);
		$chaine = str_replace(" ","<script>", "<p>", $chaine);
		$chaine = str_replace("</script>", "</p>", $chaine);
		$chaine = str_replace(" ","</script>", "</p>", $chaine);
		$chaine = str_replace("<php>", "<p>", $chaine);
		$chaine = str_replace("</php>", "</p>", $chaine);
		$chaine = str_replace("onload=", "<p></p>", $chaine);
		$chaine = str_replace(" ", "onload=", "<p></p>", $chaine);
		$chaine = str_replace("onpageshow=", "<p></p>", $chaine);
		$chaine = str_replace(" ","onpageshow=", "<p></p>", $chaine);
		$chaine = str_replace("download=", "<p></p>", $chaine);
		$chaine = str_replace(" ","download=", "<p></p>", $chaine);
		
		
		// SQL Inject Security Fix
		$chaine = str_replace("/bin/sleep", "<p></p>", $chaine);
		$chaine = str_replace("|/bin/sleep", "<p></p>", $chaine);
		$chaine = str_replace("SLEEP()", "<p></p>", $chaine);
		$chaine = str_replace("SLEEP(30)", "<p></p>", $chaine);
		$chaine = str_replace("SELECT SLEEP()", "<p></p>", $chaine);
		$chaine = str_replace("SELECT SLEEP(30)", "<p></p>", $chaine);
		$chaine = str_replace("(SELECT SLEEP())", "<p></p>", $chaine);
		$chaine = str_replace("(SELECT SLEEP(30))", "<p></p>", $chaine);
		$chaine = str_replace("OR(SELECT SLEEP())", "<p></p>", $chaine);
		$chaine = str_replace("OR (SELECT SLEEP())", "<p></p>", $chaine);
		$chaine = str_replace("OR (SELECT SLEEP(30))", "<p></p>", $chaine);
		$chaine = str_replace("/bin/sleep 31;", "<p></p>", $chaine);
		$chaine = str_replace("/bin/sleep 31 ;", "<p></p>", $chaine);
		$chaine = str_replace("|/bin/sleep 31;", "<p></p>", $chaine);
		$chaine = str_replace("|/bin/sleep 31 ;", "<p></p>", $chaine);
		$chaine = str_replace("ping.exe", "<p></p>", $chaine);
		$chaine = str_replace("ping.exe -n 31 127.0.0.1", "<p></p>", $chaine);
		$chaine = str_replace("ping.exe+-n+31+127.0.0.1", "<p></p>", $chaine);
	   
	   
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
		
		$chaine = str_replace("[table]", "<table>", $chaine);
		$chaine = str_replace("[/table]", "</table>", $chaine);  
		
		$chaine = str_replace("[tr]", "<tr>", $chaine);
		$chaine = str_replace("[/tr]", "</tr>", $chaine);  
		
		$chaine = str_replace("[td]", "<td>", $chaine);
		$chaine = str_replace("[/td]", "</td>", $chaine);  
		
		$chaine = str_replace("[th]", "<th>", $chaine);
		$chaine = str_replace("[/th]", "</th>", $chaine);  
		
		$chaine = str_replace("\n", "<br/>", $chaine);
		
		$chaine = str_replace("[br]", "<br/>", $chaine);
		
		$chaine = str_replace("[quote]", "<pre>", $chaine);
		$chaine = str_replace("[/quote]", "</pre>", $chaine); 

		$chaine = str_replace("[video]", "<iframe width='250' src='https://www.youtube.com/embed/", $chaine);
		$chaine = str_replace("[/video]", "'></iframe>", $chaine);		
		
		$chaine = preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/", "<span style=color:$1;>$2</span>", $chaine);
		
		$chaine = preg_replace("/\[font=(.+?)\](.+?)\[\/font\]/", "<font face='$1'>$2</font>", $chaine);
		
		$chaine = preg_replace("/\[size=(.+?)\](.+?)\[\/size\]/", "<font size='$1'>$2</font>", $chaine);
		
		$chaine = preg_replace("#\[\*\]?([^\[]*) ?#", "<li>\\1</li>", $chaine);
		$chaine = str_replace(array('[list]','[/list]'), array('<ul>','</ul>'), $chaine);
		
		$chaine = preg_replace("#\[url\]((ht|f)tp://)([^\r\n\t<\"]*?)\[/url\]#i", "'<a href=\"\\1' . str_replace(' ', '%20', '\\3') . '\">\\1\\3</a>'", $chaine);
		$chaine = preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/", "<a href=\"$1\">$2</a>", $chaine);

		$chaine = preg_replace("#\[email\] ?([^\[]*) ?\[/email\]#", "<a href=\"mailto:\\1\">\\1</a>", $chaine);
		$chaine = preg_replace("#\[email ?=([^\[]*) ?] ?([^]]*) ?\[/email\]#", "<a href=\"mailto:\\1\">\\2</a>", $chaine);
		
		$chaine = preg_replace("/\[img size=(.+?)\](.+?)\[\/img\]/", "<img width='$1' src='$2' />", $chaine);
	   
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
