<?php

fwrite($queue, "[general]\r\n");
foreach ($query as $row):
    fwrite($queue, "[$row->nome]\r\n");
    fwrite($queue, "musicclass= $row->musicclass\r\n");
    fwrite($queue, "strategy= $row->strategy\r\n");
    fwrite($queue, "servicelevel= $row->servicelevel\r\n");
    fwrite($queue, "context= $row->context\r\n");
    fwrite($queue, "timeout= $row->timeout\r\n");
    fwrite($queue, "wrapuptime= $row->wrapuptime\r\n");
    fwrite($queue, "maxlen= $row->maxlen\r\n");
    fwrite($queue, "$row->membros\r\n");
    fwrite($queue, " \r\n");
endforeach;

