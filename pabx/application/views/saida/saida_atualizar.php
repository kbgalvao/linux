<?php foreach ($query as $row): ?>
    <form action="<?php echo base_url() ?>saida/update" method="post">
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

        <ul class="list-group">
            <li class="list-group-item active">Saida de ligaçãoes</li>
            <li class="list-group-item">
                <div class="form-row">
                    <div class="col">
                        <select class="form-control form-control-sm" name="ramal">
                            <option value="<?php echo $row->ramal; ?>"><?php echo $row->ramal; ?></option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control form-control-sm" name="categoria">
                            <?php foreach ($plano_discagem as $plano): ?>
                                <option value="<?php echo $plano->nome; ?>"><?php echo $plano->nome; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </li>
            <li class="list-group-item">
                <input class="btn btn-primary" type="submit" value=atualizar>
                <a class="btn btn-danger" href="<?php echo base_url() ?>saida/deletar/<?php echo $row->id; ?>">Deletar</a>
            </li>
    </form>
    </ul>
    <?php
endforeach;
