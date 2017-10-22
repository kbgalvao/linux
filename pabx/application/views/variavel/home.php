<!--<meta HTTP-EQUIV='refresh' CONTENT='2'>-->
<?php
foreach ($query as $row):
    $ramal = $row->ramal;
    $var = shell_exec("sudo asterisk -rx 'core show hint $ramal' ");
    $teste = explode(":", $var);
    ?>
    <?php if ($teste[2] === "Idle            Presence"): ?>
        <button type="button" class="btn btn-success " style="margin-bottom: 10px; "><?php echo $row->ramal; ?> <i class="fa fa-tty" aria-hidden="true"></i></button>     
    <?php elseif ($teste[2] === "Ringing         Presence"): ?>
        <button type="button" class="btn btn-warning " style="margin-bottom: 10px; "><?php echo $row->ramal; ?> <i class="fa fa-volume-control-phone" aria-hidden="true"></i></button>     
    <?php elseif ($teste[2] === "InUse           Presence"): ?>
        <button type="button" class="btn btn-danger " style="margin-bottom: 10px; "><?php echo $row->ramal; ?> <i class="fa fa-phone" aria-hidden="true"></i></button>     
    <?php else: ?>
        <button type="button" class="btn btn-secondary " style="margin-bottom: 10px; "><?php echo $row->ramal; ?> <i class="fa fa-frown-o" aria-hidden="true"></i></button>     
    <?php
    endif;
endforeach;
?> 




<script>
    function pega_tempo() {
        alert("Duração da faixa: " + document.getElementById("demo").duration);
    }
</script>

<div style="display: none">
<audio id="demo" controls onpause="alertaPausa()">
    <source src="arquivo.ogg" type="audio/ogg">
    <source src="http://landellv6.dynv6.net:8080/pabx/monitor/1507148606.198.mp3" type="audio/mpeg">
</audio>
</div>
<div>
    <button class="btn-danger btn-sm" onclick="document.getElementById('demo').play()">►</button>
    <button onclick="document.getElementById('demo').pause()">||</button>
    <button onclick="document.getElementById('demo').volume += 0.1">▲</button>
    <button onclick="document.getElementById('demo').volume -= 0.1">▼</button>
    <button onmousedown="document.getElementById('demo').currentTime += 2">»</button>
    <button onmousedown="document.getElementById('demo').currentTime -= 2">«</button>
</div>      



