<ul class="list-group">
    <li class="list-group-item active">Numeros ddr</li>
    <li class="list-group-item">
        <div class="row">
            <?php foreach ($query as $row): ?>
                <div class="col-2">
                    <a  class="btn btn-outline-primary btn-block"href="<?php echo base_url(); ?>recebe/atualizar/<?php echo $row->id; ?>" style="margin-bottom: 5px; "><?php echo $row->ddr ?></a>
                </div>
            <?php endforeach; ?>  
        </div>
    </li>
</ul>


<br>
<div class="pull-right">
    <nav aria-label="Page navigation example ">
        <ul class="pagination">
            <?php echo $paginacao; ?>
        </ul>
    </nav>
</div>

