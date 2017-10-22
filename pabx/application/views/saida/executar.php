<?php

foreach ($var_id1 as $var1):
    $disca = $var1->variavel;
endforeach;
foreach ($var_id2 as $var2):
    $callerid = $var2->variavel;
endforeach;
foreach ($var_id3 as $var3):
    $exten = $var3->variavel;
endforeach;
foreach ($var_id5 as $var5):
    $acento = $var5->variavel;
endforeach;
foreach ($var_id6 as $var6):
    $uniqueid = $var6->variavel;
endforeach;

fwrite($saida, "[ramais]\r\n");
fwrite($saida, "include=> interno\r\n");
fwrite($saida, "exten => $disca,1,Answer()\r\n");

foreach ($query as $row):
    $ramal = "$row->ramal";
    $grava = $row->grava;
    fwrite($saida, "exten => $disca,n,GotoIf($callerid = $acento$ramal$acento ]?$row->grava$row->categoria,$exten");
endforeach;


foreach ($teste as $row):
    fwrite($saida, "\r\n");
    fwrite($saida, "[$row->nome]\r\n");
    fwrite($saida, "include=> $row->include\r\n");
endforeach;

