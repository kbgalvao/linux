<div class="container">
    <?php foreach ($usuario as $row): ?> 
        <form action="<?php echo base_url() ?>admin/update" method="post">
            <input type="hidden" name="id" class="form-control form-control-sm" value="<?php echo $row->id; ?>">
            <ul class="list-group">
                <li class="list-group-item bg-dark" id="link">Update Cadastro <i class="fa fa-user-circle" aria-hidden="true"></i></li>
                <li class="list-group-item bg-secondary">
                    <div class="row">
                        <div class="col-3" id="link">
                            <input type="text" name="login" class="form-control form-control-sm" value="<?php echo $row->login; ?>" required="">
                        </div>
                        <div class="col-4" id="link">
                            <input type="text" name="senha" class="form-control form-control-sm" value="123456" required="">
                        </div>
                        <div class="col-2" id="link">
                            <select class="form-control form-control-sm" name="tipo">
                                <?php if ($row->tipo === "administrador"): ?>
                                    <option value="<?php echo $row->tipo ?>"><?php echo $row->tipo ?></option>
                                    <option value="colaborador">Colaborador</option>
                                    <option value="colaborador">Usuário</option>
                                <?php elseif ($row->tipo === "colaborador"): ?>
                                    <option value="<?php echo $row->tipo ?>"><?php echo $row->tipo ?></option>
                                    <option value="administrador">administrador</option>
                                    <option value="usuario">Usuário</option>
                                <?php elseif ($row->tipo === "usuario"): ?>
                                    <option value="<?php echo $row->tipo ?>"><?php echo $row->tipo ?></option>
                                    <option value="administrador">administrador</option>
                                    <option value="colaborador">Colaborador</option>
                                <?php endif; ?>

                            </select>     
                        </div>
                        <div class="col-3">
                            <div class="form-check form-check-inline" id="link">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="ativado" checked="" > ativado
                                </label>
                            </div>
                            <div class="form-check form-check-inline" id="link">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="desativado"> desativado
                                </label>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-dark">
                    <button class="btn btn-link " type="submit" id="link">Update <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>                     
                    <a class="btn btn-link "id="link" href="<?php echo base_url(); ?>admin/deletar/<?php echo $row->id; ?>"> Deletar <i class="fa fa-trash"></i></a>
                </li>
            </ul>
        <?php endforeach; ?>
    </form>
</div>