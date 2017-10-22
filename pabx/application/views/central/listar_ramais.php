<ul class="list-group">
    <li class="list-group-item active">Ramais cadastrados</li>
    <li class="list-group-item">
        <div class="row">
            <?php foreach ($query as $row): ?>
                <div class="col-2">
                    <a  class="btn btn-outline-primary btn-block"href="<?php echo base_url(); ?>central/atualizar/<?php echo $row->id; ?>" style="margin-bottom: 5px; "><?php echo $row->ramal ?></a>
                </div>
            <?php endforeach; ?>  
        </div>
    </li>
</ul>
<div class="pull-right">
    <nav aria-label="Page navigation example ">
        <ul class="pagination">
            <?php echo $paginacao; ?>
        </ul>
    </nav>
</div>