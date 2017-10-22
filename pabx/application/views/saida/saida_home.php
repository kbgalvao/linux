<ul class="list-group">
    <li class="list-group-item active">Categoria ramais</li>
    <li class="list-group-item">
        <div class="row">
            <?php foreach ($ramais as $row): ?>
                <div class="col-3">
                    <a  class="btn btn-outline-primary btn-block"href="<?php echo base_url(); ?>saida/atualizar/<?php echo $row->id; ?>" style="margin-bottom: 5px; "><?php echo $row->ramal ?> <?php echo $row->categoria ?></a>
                </div>
            <?php endforeach; ?>  
        </div>
    </li>
</ul>