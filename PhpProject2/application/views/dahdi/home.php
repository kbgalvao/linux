<?php
$dahdi_status = shell_exec("sudo asterisk -rx 'dahdi show status' ");
$dahdi = shell_exec("sudo asterisk -rx 'dahdi show channels' ");
$r2 = shell_exec("sudo asterisk -rx 'mfcr2 show channels' ");

?>

<div class="container bg-dark">
        <?php echo "<pre style='color:white;'>".$dahdi_status."</pre>"; ?>
        <?php echo "<pre style='color:white;' >".$dahdi."</pre>"; ?>
        <?php echo "<pre style='color:white;'>".$r2."</pre>"; ?>
</div>