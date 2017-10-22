<ul class="list-group">
    <li class="list-group-item active">Todas as uras</li>
        <li class="list-group-item">
            <div class="row">
                <?php foreach ($ura as $row): ?>
                    <div class="col-3">
                    <a class="btn btn-outline-primary btn-block" href="<?php echo base_url() ?>ura/atualizar/<?php echo $row->id; ?>"><?php echo $row->nome; ?> update</a> 
                    </div>
                <?php endforeach; ?>  
            </div>
        </li>
    </ul>
</ul>