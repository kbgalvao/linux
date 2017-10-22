<form action="<?php base_url() ?>insert" method="post">

    <ul class="list-group">
        <li class="list-group-item active">Saida de ligaçãoes</li>
        <li class="list-group-item">
            <div class="form-row">
                <div class="col">
                    <select class="form-control form-control-sm" name="ramal">
                        <?php foreach ($ramais as $row): ?>
                            <option value="<?php echo "$row->ramal"; ?>"><?php echo $row->ramal; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control form-control-sm" name="categoria">
                        <?php foreach ($plano_discagem as $row):?>
                        <option value="<?php echo $row->nome; ?>"><?php echo $row->nome; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
        </li>
        <li class="list-group-item">
            <input class="btn btn-primary" type="submit" value="cadastrar">
        </li>
</form>
</ul>

