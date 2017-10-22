<?php
fwrite($sip, "#include sip_troncos.conf\r\n");
fwrite($sip, "\r\n");
fwrite($sip, "[general]\r\n");
fwrite($sip, "udpbindaddr= 0.0.0.0:5060\r\n");
fwrite($sip, "t38pt_udptl=yes\r\n");
fwrite($sip, "context= default\r\n");
fwrite($sip, "disallow= all\r\n");
fwrite($sip, "allow= alaw \r\n");
fwrite($sip, "allow= ulaw \r\n");
fwrite($sip, "allow= gsm\r\n");
fwrite($sip, "nat=force_rport,comedia\r\n");
fwrite($sip, "language= pt_BR \r\n");
fwrite($sip, "dtmfmode= rfc2833 \r\n");
fwrite($sip, "allowguest= no \r\n");

fwrite($sip, "allowsubscribe=yes \r\n");
fwrite($sip, "subscribecontext= BLF \r\n");
fwrite($sip, "subscribecontext=Landell-blf \r\n");

fwrite($sip, "notifyringing= yes \r\n");
fwrite($sip, "notifyhold= yes \r\n");
fwrite($sip, "notifycid= yes \r\n");
fwrite($sip, "callcounter= yes");
fwrite($sip, " \r\n");
fwrite($sip, "#include sip_registro.conf \r\n");
fwrite($sip, " \r\n");

foreach ($query as $row):
    fwrite($sip, "[$row->ramal]\r\n");
    fwrite($sip, "type=$row->type\r\n");
    fwrite($sip, "secret= $row->secret\r\n");
    fwrite($sip, "context= $row->context\r\n");
    fwrite($sip, "host= $row->host\r\n");
    fwrite($sip, "dtmf= $row->dtmf\r\n");
    fwrite($sip, "qualify= $row->qualify\r\n");
    fwrite($sip, "directmedia= no\r\n");
    fwrite($sip, "disallow= all\r\n");
    fwrite($sip, "allow= $row->ulaw\r\n");
    fwrite($sip, "allow= $row->alaw\r\n");
    fwrite($sip, "allow= $row->gsm\r\n");
    fwrite($sip, "allow= $row->g729\r\n");
    fwrite($sip, "callgroup= $row->callgroup\r\n");
    fwrite($sip, "pickupgroup= $row->pickupgroup\r\n");
    fwrite($sip, " \r\n");
endforeach;

