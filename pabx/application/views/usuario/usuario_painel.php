<meta HTTP-EQUIV='refresh' CONTENT='2'>
<div class="alert alert-dark" role="alert">
    <?php
    foreach ($cdr->result() as $row):
        echo $row->src . "<br>";
    endforeach;
    ?>
</div>


<?php
foreach ($query as $row):
    $ramal = $row->ramal;
    $var = shell_exec("sudo asterisk -rx 'core show hint $ramal' ");
    $teste = explode(":", $var);
    ?>
    <?php if ($teste[2] === "Idle            Presence"): ?>
        <a  class="btn btn-success" href="<?php echo base_url() ?>usuario/paineldisca/<?php echo $row->ramal ?>" style="margin-bottom: 10px;"><?php echo $row->ramal; ?> <i class="fa fa-tty" aria-hidden="true"></i></a>
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

        
   <?php
    $park = shell_exec("sudo asterisk -rx 'core show hint 701' ");
    $estacionar = explode(":", $park);
 
    echo $estacionar[03];
    ?>
    
      