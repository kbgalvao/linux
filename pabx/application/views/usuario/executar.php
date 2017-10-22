<?php

$chave1 = "{";
$chave2 = "}";
$chave3 = "$";
$teste = "($chave3" . "{DB_EXISTS(GRAVACAO_ENTRADA/$chave3" . "{EXTEN$chave2)$chave2?gravacao)";
$uniqueid = "$" . "{UNIQUEID}";
fwrite($interno, "[interno]\r\n");

foreach ($servicos as $row):
    fwrite($interno, "exten=> $row->ramal,1,Answer()\r\n");

    fwrite($interno, "same=> n,Dial(SIP/$row->primeiro,$row->tempo1)\r\n");
    if (empty($row->segundo)):
    else:
        fwrite($interno, "same=> n,Dial(SIP/$row->segundo,$row->tempo2)\r\n");
    endif;
    if (empty($row->terceiro)):
    else:
        fwrite($interno, "same=> n,Dial(SIP/$row->terceiro,$row->tempo3)\r\n");
    endif;

    fwrite($interno, "same=> n,Hangup()\r\n");
    fwrite($interno, "\r\n");
    fwrite($interno, ";============================================\r\n");
    fwrite($interno, "\r\n");

endforeach;
fwrite($interno, "[gravacao_entrada]\r\n");
fwrite($interno, "inlude=> interno\r\n");
foreach ($servicos as $row):

    fwrite($interno, "exten=> $row->ramal,1,Answer()\r\n");
    fwrite($interno, "same=> n(gravacao),Noop(############## GRAVACAO ###########)\r\n");
    fwrite($interno, "same=> n,Mixmonitor($uniqueid.wav,b)\r\n");
    fwrite($interno, "same=> n,Dial(SIP/$row->primeiro,$row->tempo1)\r\n");
    if (empty($row->segundo)):
    else:
        fwrite($interno, "same=> n,Mixmonitor($uniqueid.wav,b)\r\n");
        fwrite($interno, "same=> n,Dial(SIP/$row->segundo,$row->tempo2)\r\n");
    endif;
    if (empty($row->terceiro)):
    else:
        fwrite($interno, "same=> n,Mixmonitor($uniqueid.wav,b)\r\n");
        fwrite($interno, "same=> n,Dial(SIP/$row->terceiro,$row->tempo3)\r\n");
    endif;
    fwrite($interno, "same=> n,Hangup()\r\n");
    fwrite($interno, "\r\n");
endforeach;
fwrite($interno, "exten => h, 1, StopMixMonitor()\r\n");
fwrite($interno, "exten => h, n, system(sox /var/spool/asterisk/monitor/$uniqueid.wav /var/spool/asterisk/monitor/$uniqueid.mp3)\r\n");
fwrite($interno, "exten => h, n, system(rm /var/spool/asterisk/monitor/*.wav)\r\n");
fwrite($interno, "\r\n");
