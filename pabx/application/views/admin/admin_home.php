<ul class="list-group">
    <li class="list-group-item active">Usuarios cadastrados</li>
    <li class="list-group-item">
        <div class="row">
            <?php foreach ($usuarios as $row): ?>
                <div class="col-2">
                    <a  class="btn btn-outline-primary btn-block"href="<?php echo base_url(); ?>admin/atualizar/<?php echo $row->id; ?>" style="margin-bottom: 5px; "><?php echo $row->login ?> <?php echo $row->id ?></a>
                </div>
            <?php endforeach; ?>  
        </div>
    </li>
</ul>