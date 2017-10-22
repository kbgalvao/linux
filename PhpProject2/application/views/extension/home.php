<div class="container bg-secondary">
<?php
$name      = '/home/kleber/arquivo.txt';
$ramal     = "_74XX";
$tempo     = 20;

$globals   = "[globals]"."\n";
$operadora = "operadora= 015"."\n\r";


$interno    = "[interno]"."\n";
$exten      = "exten=> $ramal,1,Answer()"."\n";
$cfim       = "same=> n,GotoIf("."$"."{DB_EXISTS(CFIM/"."$"."{EXTEN})}?cfim)"."\n";
$cfbs       = "same=> n,GotoIf("."$"."{DB_EXISTS(CFBS/"."$"."{EXTEN})}?cfbs)"."\n";
$sip        = "same=> n,Dial(SIP/"."$"."{EXTEN},60,rtT)"."\n";
$hangup     = "same=> n,Hangup()"."\n\r";

$devio_imediato1    = "same=> n(cfim),Set(temp="."$"."{DB(CFBS/"."$"."{EXTEN})})"."\n";
$devio_imediato2    = "same=> n,Dial(SIP/"."$"."{temp},,"."$"."{DIALOPTIONS})"."\n";
$hangup             = "same=> n,Hangup()"."\n\r";

$devio_ocupado1     = "same=> n(cfbs),Set(temp="."$"."{DB(CFBS/"."$"."{EXTEN})})"."\n";
$devio_ocupado2     = "same=> n,Dial(SIP/"."$"."{temp},$tempo,"."$"."{DIALOPTIONS})"."\n";
$devio_ocupado3     = "same=> n,Dial(SIP/"."$"."{temp},,"."$"."{DIALOPTIONS})"."\n";
$hangup             = "same=> n,Hangup()"."\n\r";

$file = fopen($name, 'w+');
fwrite($file, $globals);
fwrite($file, $operadora);
fwrite($file, $interno);
fwrite($file, $exten);
fwrite($file, $cfim);
fwrite($file, $cfbs);
fwrite($file, $sip);
fwrite($file, $hangup);
fwrite($file, $devio_imediato1);
fwrite($file, $devio_imediato2);
fwrite($file, $hangup);
fwrite($file, $devio_ocupado1);
fwrite($file, $devio_ocupado2);
fwrite($file, $devio_ocupado3);
fwrite($file, $hangup);
fclose($file);

echo $globals."<br>";
echo $operadora."<br><br>";
echo $interno."<br>";
echo $exten."<br>";
echo $cfim."<br>";
echo $cfbs."<br>";
echo $sip."<br>";
echo $hangup."<br><br>";
echo $devio_imediato1."<br>";
echo $devio_imediato2."<br>";
echo $hangup."<br><br>";
echo $devio_ocupado1."<br>";
echo $devio_ocupado2."<br>";
echo $devio_ocupado3."<br>";
echo $hangup."<br>";
?>
</div>