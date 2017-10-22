<?php

foreach ($toque as $row):
    $toque = $row->variavel;
endforeach;

foreach ($unique as $row):
    $uniqueid = $row->variavel;
endforeach;

// ################ contexto que do asterisk
fwrite($recebe, "[recebe]\r\n");
foreach ($query as $row):
    //$ramal = substr($row->ddr, 6);
    foreach ($exten as $ext):
        fwrite($recebe, "exten=> $row->ddr,1,Answer()\r\n");
        fwrite($recebe, "exten=> $row->ddr,n,Goto($row->goto,$row->ramal,1)\r\n");
        fwrite($recebe, "\r\n");
    endforeach;
endforeach;

fwrite($recebe, "[entrada]\r\n");

foreach ($query as $row):
    fwrite($recebe, "\r\n");
    fwrite($recebe, "exten=> $row->ramal,1,Answer()\r\n");
    //ativa ring sip  
    if (empty($row->ring)):
        fwrite($recebe, "exten=> $row->ramal,n,Noop(#####################)\r\n");
    else:
        fwrite($recebe, "exten=> $row->ramal,n,SIPAddHeader(Alert-Info:Bellcore-" . $row->ring . ")\r\n");
    endif;

   

endforeach;
fwrite($recebe, "[converte]\r\n");
fwrite($recebe, "exten => h,1,StopMixMonitor()\r\n");
fwrite($recebe, "exten => h,n,system(sox /var/spool/asterisk/monitor/$uniqueid.wav /var/spool/asterisk/monitor/$uniqueid.mp3)\r\n");
fwrite($recebe, "exten => h,n,system(rm /var/spool/asterisk/monitor/*.wav\r\n");
