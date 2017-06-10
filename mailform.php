<?php
//Tragen Sie hier anstatt der Platzhalteradresse Ihre Emailadresse ein:
$email = "IhrName@IhreDomain.de";
//-----------------------------------------------------------
//ab hier nichts mehr ändern
//-----------------------------------------------------------
?>
<style type="text/css">
<!--
.fehler {
	color: #CC0000;
	font-weight: bold;
}
-->
</style>
<?php
$copy = "Kontaktfomular von http://www.cosmo-jim.de";
$sent = $_POST[sent];
//Reloadsperre
$daten = "kontaktformular_reloadsperre.txt";
$t = $_POST[t];
$pruefung = @file($daten);
while (list ($line_num, $line) = @each ($pruefung))
{$z = explode("&&",$line);
if($z[0] == $t) {
echo "<p class=\"fehler\">Fehler: Ihre Daten wurden bereits versandt!</p>";
$sent = "2";
}
}
//Zufallszahlen erzeugen
mt_srand((double)microtime() * 1000000);
$zufall1 = mt_rand(1,20);
mt_srand((double)microtime() * 1000000);
$zufall2 = mt_rand(1,9);
$k = "$zufall1" + "$zufall2";
$key = md5($k);
//Formulardaten überprüfen
if($sent == "1")
{

$Name = $_POST[Name];
$Name = strip_tags($Name);
$Name = stripcslashes($Name);
$Name = stripslashes($Name);
$Name = str_replace(" ", "xxxxxx", $Name);
$Email = $_POST[Email];
$Email = strip_tags($Email);
$Email = stripcslashes($Email);
$Email = stripslashes($Email);
$Telefon = $_POST[Telefon];
$Telefon = strip_tags($Telefon);
$Telefon = stripcslashes($Telefon);
$Telefon = stripslashes($Telefon);
$Betreff = $_POST[Betreff];
$Betreff = strip_tags($Betreff);
$Betreff = stripcslashes($Betreff);
$Betreff = stripslashes($Betreff);
$Betreff = str_replace(" ", "xxxxxx", $Betreff);
$Nachricht = $_POST[Nachricht];
$Nachricht = strip_tags($Nachricht);
$Nachricht = stripcslashes($Nachricht);
$Nachricht = stripslashes($Nachricht);
$ergebnis = $_POST[ergebnis];
$ergebnis = strip_tags($ergebnis);
$ergebnis = stripcslashes($ergebnis);
$ergebnis = stripslashes($ergebnis);
$key2 = $_POST[key2];
if(!ctype_alnum($key2)) {unset($key2);}
$t = $_POST[t];
if(!is_numeric($t)){$error .= "<p class=\"fehler\">Fehler: Ein Fehler ist aufgetreten</p>";}
//Daten überprüfen
if(empty ($Name)) {$error .= "<p class=\"fehler\">Fehler: Geben Sie bitte Ihren Namen ein</p>";}
if(!ctype_alnum($Name)) {$error .= "<p class=\"fehler\">Fehler: Ihr Name darf nur alphanumerische Zeichen enthalten</p>";}
if(ctype_cntrl($Name)) {$error .= "<p class=\"fehler\">Fehler: Ihr Name enthält unzulässige Zeichen.</p>";}
$Name = str_replace("xxxxxx", " ", $Name);
if(empty ($Email)) {$error .= "<p class=\"fehler\">Fehler: Geben Sie bitte Ihre Emailadresse ein.</p>";}
if(!eregi("^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,4}$", $Email)) { $error .= "<p class=\"fehler\">Fehler: Geben Sie bitte eine gültige Emailadresse an.</p>";}
if(ctype_cntrl($Email)) {$error .= "<p class=\"fehler\">Fehler: Geben Sie bitte eine gültige Emailadresse an.</p>";}
if($Telefon != "")
{
if(eregi("Content-Type:", $Telefon)) {$error .= "<p class=\"fehler\">Die Telefonnummer enthält unzulässige Zeichen.</p>";}
if(!is_numeric($Telefon)){$error .= "<p class=\"fehler\">Geben Sie bei der Telefonnummer bitte nur Zahlen ohne Leerstellen ein.</p>";}
}
if(empty ($Betreff)) {  $error .= "<p class=\"fehler\">Geben Sie bitte einen Betreff ein.</p>";}
if(!ctype_alnum($Betreff)) {$error .= "<p class=\"fehler\">Fehler: Der Betreff darf nur Buchstaben und Zahlen enthalten</p>";}
if(ctype_cntrl($Betreff)) {$error .= "<p class=\"fehler\">Fehler: Der Betreff enthält unzulässige Zeichen.</p>";}
$Betreff = str_replace("xxxxxx", " ", $Betreff);
if(empty ($Nachricht)) {$error .= "<p class=\"fehler\">Fehler: Geben Sie bitte eine Nachricht ein.</p>";}
if(eregi("BCC:", $Nachricht)) {$error .= "<p class=\"fehler\">Fehler: Die Nachricht enthält unzulässige Zeichen.</p>";}
if(eregi("CC:", $Nachricht)) {$error .= "<p class=\"fehler\">Fehler: Die Nachricht enthält unzulässige Zeichen.></p>";}
if(eregi("Content-Type:", $Nachricht)) {$error .= "<p class=\"fehler\">Fehler: Die Nachricht enthält unzulässige Zeichen.</p>";}
if(empty ($ergebnis)) {  $error .= "<p class=\"fehler\">Fehler: Geben Sie bitte das Ergebnis der Sicherheitsabfrage ein.</p>";}
if(!is_numeric($ergebnis)){$error .= "<p class=\"fehler\">Fehler: Das Ergebnis der Sicherheitsabfrage enthält unzulässige Zeichen.</p>";}
if(ctype_cntrl($ergebnis)) {$error .= "<p class=\"fehler\">Fehler: Das Ergebnis der Sicherheitsabfrage enthält unzulässige Zeichen.</p>";}
$abfrage = md5($ergebnis);
if(!empty($ergebnis))
{
if($abfrage != $key2) {$error .= "<p class=\"fehler\">Fehler: Das Ergebnis der Sicherheitsabfrage ist leider nicht korrekt.</p>";}
}
//Formulardaten verarbeiten
if(empty($error))
{
$Nachrichthtml = ereg_replace("\n", "<br>", $Nachricht);
$Nachrichthtml = ereg_replace("\r", "", $Nachricht);
$ip = $_SERVER['REMOTE_ADDR'];
$date = date("d.m.Y H:i:s");
echo "
<h2>Kontaktaufnahme</h2>
Guten Tag, Frau/Herr <strong>$Name</strong>,
<br><br>vielen Dank für Ihre Mitteilung!<br>
<strong>Betreff:</strong> <br>
$Betreff<br><br>
<strong>Ihre Nachricht:</strong><br>
$Nachrichthtml";
// Formulardaten verschicken
mail("$email", "Kontaktformular: $Betreff","
Folgende Nachricht wurde vom Ihrem artmedic Kontaktformular
aus gesendet am $date
IP-Adresse des Absenders: $ip
--------------------------------------------------------

Name:       $Name
Telefon:    $Telefon
Betreff:    $Betreff
Email:      $Email
Nachricht:
$Nachricht

--------------------------------------------------------
$copy
","From: $Email");
//Reloadsperre aktivieren
$fp = @fopen($daten, "a+");
flock($fp,2);
fputs ($fp, "$t&&\n");
flock($fp,3);
fclose ($fp);
//alte Reload-Einträge bereinigen
$ablaufzeit = "$time"-"3600";
$pruefung = @file($daten);
while (list ($line_num, $line) = @each ($pruefung))
{$zeiten = explode("&&",$line);
if($zeiten[0] <= $ablaufzeit)
{$fp = fopen( "$daten", "r" );
$contents = fread($fp, filesize($daten));
fclose($fp);
$line=quotemeta($line);
$string2 = "";
$replace = ereg_replace($line, $string2, $contents);
$fh=fopen($daten, "w");
@flock($fp,2);
fputs($fh, $replace);
@flock($fp,3);
fclose($fh);}}
}
//Fehlerausgabe
if(!empty($error))
{
echo "$error";
unset($sent);
}
}
//Eingabeformular anzeigen
if($sent != "1" and $sent != "2")
{
?>
<form name="form1" method="post" action="mailform.php">
<h2>Kontaktaufnahme</h2>
<div>
<label for="Name">Name*</label>
</div>
<div><input name="Name" type="text" class="inputtext" value="<?php echo $Name; ?>" size="40">
</div>

<div>
<label for="Email">Email*</label>
</div>
    <div><input name="Email" type="text" class="inputtext" id="Email" value="<?php echo $Email; ?>" size="40">
    </div>
<div>
<label for="Telefon">Telefon (nur Zahlen) </label>
</div>
    <div><input name="Telefon" type="text" class="inputtext" id="Telefon" value="<?php echo $Telefon; ?>" size="40">
    </div>
<div>
<label for="Betreff">Betreff*</label>
</div>
    <div><input name="Betreff" type="text" class="inputtext" value="<?php echo $Betreff; ?>" size="40">
    </div>

<div>
<label for="Nachricht">Nachricht*</label>
</div>
<div>
  <textarea name="Nachricht" cols="40" rows="8" class="inputtext"><?php echo $Nachricht; ?></textarea>
</div>
<label for="ergebnis"> <div><strong>Sicherheitsabfrage*</strong></div>
<div>Bitte addieren Sie folgende Zahlen und tragen Sie sie in das Ergebnisfeld ein:<br>
      <strong> <?php echo $zufall1; ?></strong> + <strong><?php echo $zufall2; ?> =</strong> <input name="ergebnis" type="text" id="ergebnis" size="2" maxlength="2">
</div>
</label>



    <div><input name="Submit" type="submit" class="inputsubmit" value="Abschicken"> <input name="Submit" type="reset" class="inputsubmit" value="Zur&uuml;cksetzen">
    <br>
* = erforderliche Angaben
<input name="sent" type="hidden" id="sent" value="1">
     <input name="key2" type="hidden" id="key2" value="<?php echo $key; ?>">
	  <input name="t" type="hidden" id="t" value="<?php echo time(); ?>">
  </div>
</form>
<?php
}
?>
