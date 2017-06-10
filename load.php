<html>
    <head>
        <title>Cosmo Jim News</title>

        <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    
    <link type="text/css" rel="stylesheet" href="./cosmo1.css" media="all">
    </head>

    <body>

        <div id="Menue23">
            <ul>
            <li><a href="index.php">Startseite</a></li>
            <li><a href="http://www.guestbook-free.com/books3/cosmojim/s">G&auml;stebuch</a></li>
            <li><a href="download.php">Download</a></li>
            <li><a href="./Gallery/gallery.php">Pics</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="load.php">Bleib Up to Date</a></li>

            </ul>
            </div>
            <br>
        <br><br>
       <center><h1>Hier gibt&apos;s News Rund um Cosmo Jim und alles rund herum!</h1></center>

        <br><br>
         <p>Wie ihr sicher gemerkt habt, befindet sich die Seite noch im Aufbau und wer die alten Seiten kennt, merkt das die Seite in st&auml;ndiger Ver&auml;nderung sich befindet.<br>
         Ich hoffe ich kann das so umesetzen wie ich mir das vorgenommen habe was die Seite angeht... Paar gute Ideen ;)<br>
         Deshalb ab und zu mal die Webseite aufrufen und auch mal auf Entdeckungstour gehen da gibt&apos;s bestimmt bald einiges zu entdecken...
         </p>
          <br><br><br><br>



        <center><h1>Mach Werbung f&uuml;r meine Seite, wenn dir der Sound gef&auml;llt :) Sie lebt bis jetzt ausschlie&szlig;lich von Mundpropaganda ;) <br>
        und daf&uuml;r kann ich schon zufrieden sein :)</h1></center>
        <p>Und da die Allgemeinheit sowas ja meistens vergisst gibt&apos; hier der Service ;)<br>
        Einfach die Mailadresse von euren Freunden hier eintragen und schon bekommen Sie den Link per Mail :) <br>
        EASY GOING ;)</p>




<?php
ob_start();
header("Content-Type: text/javascript; charset=utf-8"); 
?>
<div id="pjSendURLContainer" class="pjSendForm">
	<button class="pjDbPopupBtn pjDbPopupBtnPrimary pjTriggerDialog">Send URL</button>
	<div id="pjDialogClone" style="display:none;">
		<div class="pjDbPopupInner">
			<div class="pjDbPopupContent">
				<div class="pjDbPopupContentInner">
					<div class="pjDbPopupForm">
						<form action="#" method="post">
							<input type="hidden" name="send" value="1"/>
							<input type="hidden" name="url" value="http://www.cosmo-jim.de"/>
							<header class="pjDbPopupFormHead">
								<p class="pjDbPopupFormTitle">Enter e0mail address that you want to send URL to.</p>
							</header>
							<div class="pjDbPopupFormBody">
								<div class="pjDbPopupFormRow">
									<label for="" class="pjDbPopupFormLabel">Email: </label>
									<div class="pjDbPopupFormControls">
										<input type="text" name="email" class="pjDbPopupFormField required email" placeholder="Email" />
									</div>
								</div>
								<div class="pjDbPopupFormRow" style="display: none;">
									<label id="pjSendMessage" class="pjDbPopupFormLabel"></label>
								</div>
							</div>
							<footer class="pjDbPopupFormFoot">
								<div class="pjDbPopupFormActions">
									<button type="submit" class="pjDbPopupBtn pjDbPopupBtnPrimary pjDbBtnSubmit">Send</button>
									<button type="button" class="pjDbPopupBtn pjDbPopupBtnDefault pjDbBtnClose">Close</button>
								</div>
							</footer>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
(function () {
	"use strict";
	var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor),

	loadCssHack = function(url, callback){
		var link = document.createElement('link');
		link.type = 'text/css';
		link.rel = 'stylesheet';
		link.href = url;

		document.getElementsByTagName('head')[0].appendChild(link);

		var img = document.createElement('img');
		img.onerror = function(){
			if (callback && typeof callback === "function") {
				callback();
			}
		};
		img.src = url;
	},
	loadRemote = function(url, type, callback) {
		if (type === "css" && isSafari) {
			loadCssHack(url, callback);
			return;
		}
		var _element, _type, _attr, scr, s, element;
		
		switch (type) {
		case 'css':
			_element = "link";
			_type = "text/css";
			_attr = "href";
			break;
		case 'js':
			_element = "script";
			_type = "text/javascript";
			_attr = "src";
			break;
		}
		
		scr = document.getElementsByTagName(_element);
		s = scr[scr.length - 1];
		
		if(typeof s == "undefined") {
			scr = document.getElementsByTagName("script");
			s = scr[scr.length - 1];
		}
		
		element = document.createElement(_element);
		element.type = _type;
		if (type == "css") {
			element.rel = "stylesheet";
		}
		if (element.readyState) {
			element.onreadystatechange = function () {
				if (element.readyState == "loaded" || element.readyState == "complete") {
					element.onreadystatechange = null;
					if (callback && typeof callback === "function") {
						callback();
					}
				}
			};
		} else {
			element.onload = function () {
				if (callback && typeof callback === "function") {
					callback();
				}
			};
		}
		element[_attr] = url;
		s.parentNode.insertBefore(element, s.nextSibling);
	},
	loadScript = function (url, callback) {
		loadRemote(url, "js", callback);
	},
	loadCss = function (url, callback) {
		loadRemote(url, "css", callback);
	};
	loadScript("js/jquery-3.1.1.min.js", function () {
		loadScript("js/jquery.validate.min.js", function () {
			loadScript("js/function.js", function () {
				loadCss("css/style.css", function() {

				});
			});
		});
	});
})();
</script>
<?php
$content = ob_get_contents();
ob_end_clean();

$content = preg_replace('/\r\n|\n|\t/', '', $content);
$content = str_replace("'", "\"", $content);

    
    echo "document.writeln('$content');"


?>

<br><br><br><br>
			<div align=center><p style="font-size:20px;"><br><br><br><br><br>&copy;COSMO-JIM - K&uuml;nstler und Producer/ Alle Rechte vorbehalten
			</p>
		</div>
		
		</body>
 </html>