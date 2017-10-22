<?php
    fwrite($musica, "[general]\r\n");
    fwrite($musica, "\r\n");
    fwrite($musica, "[default]\r\n");
    fwrite($musica, "mode=files\r\n");
    fwrite($musica, "directory=moh\r\n");

foreach ($pasta as $pastas):
    shell_exec('sudo mkdir /var/lib/asterisk/custom/' . $pastas->pasta . '');
    shell_exec('sudo chmod 777 /var/lib/asterisk/custom/*');
    fwrite($musica, "\r\n");    

    fwrite($musica, "[$pastas->pasta]\r\n");
    fwrite($musica, "mode=files\r\n");
    fwrite($musica, "directory=/var/lib/asterisk/custom/$pastas->pasta\r\n"); 
    fwrite($musica, "random=yes\r\n"); 
endforeach;

