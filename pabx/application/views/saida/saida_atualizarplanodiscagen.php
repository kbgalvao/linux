<form action="<?php echo base_url(); ?>saida/updateplanodiscagen" method="post">
    <?php foreach ($plano as $row): ?>
        <input type="hidden" name="id" value="<?php echo $row->id ?>"
               <ul class="list-group">
            <li class="list-group-item active">Deletar plano discagem</li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-2">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control form-control-sm" value="<?php echo $row->nome; ?>">
                    </div>
                    <div class="col-2">
                        <label>Include</label>
                        <input type="text" name="include" class="form-control form-control-sm" value="<?php echo $row->include; ?>">

                    </div>
            </li>
            <li class="list-group-item">
                <input  class="btn btn-primary" type="submit" value="atualizar">
                <a class="btn btn-danger" href="<?php echo base_url() ?>saida/deletarplanodiscagem/<?php echo $row->id; ?>">Deletar</a>

            </li>
        </ul>
    <?php endforeach; ?>
</form>