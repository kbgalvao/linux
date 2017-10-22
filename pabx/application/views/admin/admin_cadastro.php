<form action="<?php echo base_url()?>admin/insert" method="post">
    <ul class="list-group">
        <li class="list-group-item active">Cras justo odio</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-3">
                    <input type="text" name="login" class="form-control form-control-sm" placeholder="Login" required="">
                </div>
                <div class="col-4">
                    <input type="text" name="senha" class="form-control form-control-sm" placeholder="Senha" required="">
                </div>
                <div class="col-2">
                    <select class="form-control form-control-sm" name="tipo">
                        <option value="administrador">Administrador</option>
                        <option value="colaborador">Colaborador</option>
                        <option value="usuario">Usuário</option>
                    </select>     
                </div>
                <div class="col-3">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="ativado" checked=""> ativado
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="desativado"> desativado
                        </label>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <input class="btn btn-primary" type="submit" value="cadastrar">       
        </li>
    </ul>
</form>