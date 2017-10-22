<form action="<?php echo base_url();?>saida/updateplanodiscagen" method="post">
<?php foreach ($plano as $row): ?>
    <input type="hidden" name="id" value="<?php echo $row->id ?>"
    <ul class="list-group">
        <li class="list-group-item active">Cras justo odio</li>
        <li class="list-group-item">
            <div class="row">
                 <div class="col-2">
                    <label>Numeros</label>
                    <input type="text" name="nome" class="form-control form-control-sm" value="<?php echo $row->nome; ?>">
                </div>
                <div class="col-3">
                    <label>Numeros</label>
                    <input type="text" name="numero" class="form-control form-control-sm" value="<?php echo $row->numero; ?>">
                </div>
                <div class="col-2">
                    <label>Tecnologia</label>
                    <input type="text" name="tecnologia" class="form-control form-control-sm" value="<?php echo $row->tecnologia; ?>">
                </div>
                 <div class="col-2">
                    <label>Rota</label>
                    <input type="text" name="tipo" class="form-control form-control-sm" value="<?php echo $row->tipo; ?>">
                </div>
                <div class="col-1">
                    <label>Deletar</label>
                    <select class="form-control form-control-sm" name="exten">
                        <option value="${EXTEN}">0</option>
                        <option value="${EXTEN:1}">1</option>
                        <option value="${EXTEN:2}">2</option>
                        <option value="${EXTEN:3}">3</option>
                        <option value="${EXTEN:4}">4</option>
                    </select>
                </div>
                <div class="col-1">
                    <?php if (empty($row->operadora)): ?>              
                        <input type="hidden" class="form-control" value="<?php echo $row->operadora; ?>">
                    <?php else: ?>
                        <label>Operadora</label>   
                        <input type="text" name="operadora"class="form-control form-control-sm" value="<?php echo $row->operadora; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <input  class="btn btn-primary" type="submit" value="atualizar">

        </li>
    </ul>
<?php endforeach; ?>
</form>