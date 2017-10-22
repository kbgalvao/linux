<ul class="list-group">
    <li class="list-group-item active">Fila atendimento</li>
        <li class="list-group-item">
            <div class="row">
                <?php foreach ($queues as $row): ?>
                    <div class="col-3">
                    <a class="btn btn-outline-primary btn-block" href="<?php echo base_url() ?>fila_atendimento/update_queues/<?php echo $row->id; ?>"><?php echo $row->nome; ?></a> 
                    </div>
                <?php endforeach; ?>  
            </div>
        </li>
    </ul>
</ul>