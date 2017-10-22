<?php

fwrite($recebe, "[recebe]\r\n");

foreach ($query as $row):
        fwrite($recebe, "exten=> $row->primeiro,1,Answer()\r\n");
        fwrite($recebe, "$row->toque\r\n");
        fwrite($recebe, "$row->gravacao\r\n");
        fwrite($recebe, "$row->segundo\r\n");
        fwrite($recebe, "$row->noop\r\n");
        fwrite($recebe, "$row->mixmonitor\r\n");
        fwrite($recebe, "$row->terceiro\r\n");
        fwrite($recebe, "\r\n");
endforeach;
