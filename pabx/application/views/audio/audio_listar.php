<ul class="list-group">
    <li class="list-group-item active">Audio</li>
    <?php foreach ($query as $row): ?>    
        <li class="list-group-item">
            <?php echo $row->pasta; ?>
            <a class="btn btn-link" href="<?php echo base_url() ?>deletar/<?php echo $row->id; ?>/<?php echo $row->pasta; ?>">deletar</a>                  
        <?php endforeach; ?>
        <form class="form-inline" enctype="multipart/form-data" method="POST" action="<?php base_url() ?>audio/upload" accept-charset="utf-8">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="file" name="arquivo[]" multiple="multiple" /><br>
                        <br>
                    </div>  

                    <input class="btn btn-primary" name="enviar" type="submit" value="Enviar">
                </div>
            </div>
        </form>
    </li>
    
    <br>

    <div class="pull-right">
        <nav aria-label="Page navigation example ">
            <ul class="pagination pull-right">
                <?php echo $paginacao; ?>
            </ul>
        </nav>
    </div>
</ul>

