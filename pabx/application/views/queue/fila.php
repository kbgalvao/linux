<?php

fwrite($fila, "[fila]\r\n");

fwrite($fila, " \r\n");
foreach ($query as $row):
    fwrite($fila, "exten =>$row->nome,1,($row->nome)\r\n");
endforeach;
