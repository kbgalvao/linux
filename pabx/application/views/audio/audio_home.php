<ul class="list-group">
    <li class="list-group-item active">Audio</li>
    <?php foreach ($query as $row): ?>    
        <li class="list-group-item">
            <?php echo $row->pasta; ?>
            <a class="btn btn-link" href="<?php base_url() ?>audio/deletar/<?php echo $row->id; ?>/<?php echo $row->pasta; ?>">deletar</a>                  

        </li>
    <?php endforeach; ?>
</li>
<li class="list-group-item">
    <form class="form" enctype="multipart/form-data" method="POST" action="<?php base_url() ?>upload" accept-charset="utf-8">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="file" name="arquivo[]" multiple="multiple" /><br>
                    <br>
                </div>  
            </div>
            <div class="col">
                <select class="form-control" id="exampleFormControlSelect2" name="pasta">
                    <?php foreach ($query as $row): ?>
                        <option value="<?php echo $row->pasta; ?>"><?php echo $row->pasta; ?></option>
                    <?php endforeach; ?>
                </select>            </div>
        </div>
        <div class="col">
            <input class="btn btn-primary" name="enviar" type="submit" value="Enviar">
        </div>
    </form>
</li>
</ul><br>


