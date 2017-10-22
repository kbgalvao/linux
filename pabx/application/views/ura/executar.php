<?php

foreach ($query as $row):
    fwrite($ura, "[$row->nome]\r\n");
    fwrite($ura, "exten=>s,1,Answer()\r\n");
    fwrite($ura, "same=>n,Set(count=1)\r\n");
    fwrite($ura, "same=>n,Set(loopx=2)\r\n");
    foreach ($repet as $var):
        fwrite($ura, "$var->variavel\r\n");
    endforeach;
    foreach ($count as $variavel):
        fwrite($ura, "$variavel->variavel\r\n");
    endforeach;
    fwrite($ura, "same=>n,BackGround(/var/lib/asterisk/custom/$row->audio/$row->audio)\r\n");
    fwrite($ura, "same=>n,WaitExten(3)\r\n");
    foreach ($count_id5 as $variavel):
        fwrite($ura, "$variavel->variavel\r\n");
    endforeach;
    fwrite($ura, "same=>n,EndWhile()\r\n");
    fwrite($ura, "same=>n,Goto(fuga$row->nome,s,1)\r\n");
    fwrite($ura, "\r\n");

    fwrite($ura, "exten => 0,1,Answer()\r\n");
    fwrite($ura, "exten => 0,n,$row->dg0\r\n");

    fwrite($ura, "exten => 1,1,Answer()\r\n");
    fwrite($ura, "exten => 1,n,$row->dg1\r\n");

    fwrite($ura, "exten => 2,1,Answer()\r\n");
    fwrite($ura, "exten => 2,n,$row->dg2\r\n");

    fwrite($ura, "exten => 3,1,Answer()\r\n");
    fwrite($ura, "exten => 3,n,$row->dg3\r\n");

    fwrite($ura, "exten => 4,1,Answer()\r\n");
    fwrite($ura, "exten => 4,n,$row->dg4\r\n");

    fwrite($ura, "exten => 5,1,Answer()\r\n");
    fwrite($ura, "exten => 5,n,$row->dg5\r\n");

    fwrite($ura, "exten => 6,1,Answer()\r\n");
    fwrite($ura, "exten => 6,n,$row->dg6\r\n");

    fwrite($ura, "exten => 7,1,Answer()\r\n");
    fwrite($ura, "exten => 7,n,$row->dg7\r\n");

    fwrite($ura, "exten => 8,1,Answer()\r\n");
    fwrite($ura, "exten => 8,n,$row->dg8\r\n");

    fwrite($ura, "exten => 9,1,Answer()\r\n");
    fwrite($ura, "exten => 9,n,$row->dg9\r\n");

    fwrite($ura, "\r\n");
    fwrite($ura, "exten => i,1,Noop(URA: Digitou incorretamente)\r\n");
    fwrite($ura, "exten => i,n,Playback(invalid)\r\n");
    fwrite($ura, "exten => i,n,Goto(ura,$row->nome,1)\r\n");
    fwrite($ura, "\r\n");
    fwrite($ura, "[fuga$row->nome]\r\n");
    fwrite($ura, "exten => s,1,Answer()\r\n");
    fwrite($ura, "exten => s,n,$row->operadora\r\n");
    fwrite($ura, "exten => s,3,Hangup\r\n");
    fwrite($ura, "\r\n");

endforeach;
