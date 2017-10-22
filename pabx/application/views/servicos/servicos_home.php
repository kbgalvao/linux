<ul class="list-group">
    <li class="list-group-item active">Numeros ddr</li>
    <li class="list-group-item">
        <div class="row">
            <?php foreach ($servicos as $row): ?>
                <div class="col-2">
                    <a  class="btn btn-outline-primary btn-block"href="<?php echo base_url(); ?>servicos/atualisar/<?php echo $row->id; ?>" style="margin-bottom: 5px; "><?php echo $row->ramal ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </li>
</ul>
