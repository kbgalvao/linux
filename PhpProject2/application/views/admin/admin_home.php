<div class="container">
    <ul class="list-group">
        <li class="list-group-item bg-dark" id="link">Usuários cadastrados <i class="fa fa-user-circle" aria-hidden="true"></i></li>
        <li class="list-group-item bg-dark">
            <div class="row">
                <?php foreach ($usuarios as $row): ?>
                    <div class="col-2">
                        <a  class="btn btn-link btn-block"href="<?php echo base_url(); ?>admin/atualizar/<?php echo $row->id; ?>" id="link" "><?php echo $row->login ?> <i class="fa fa-user-o" aria-hidden="true"></i>
                        </a>
                    </div>
                <?php endforeach; ?>  
            </div>
        </li>
    </ul>
</div>
