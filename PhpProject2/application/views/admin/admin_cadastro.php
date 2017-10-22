<div class="container">
    <form action="<?php echo base_url() ?>admin/insert" method="post">
        <ul class="list-group">
            <li class="list-group-item bg-dark" id="link">
 Cadastro de Usuarios <i class="fa fa-user-circle" aria-hidden="true"></i></li>
            <li class="list-group-item bg-secondary">
                <div class="row">
                    <div class="col-3">
                        <input type="text" name="login" id="link" class="form-control form-control-sm" placeholder="Login" required="">
                    </div>
                    <div class="col-4">
                        <input type="text" name="senha" id="link" class="form-control form-control-sm" placeholder="Senha" required="">
                    </div>
                    <div class="col-2" id="link">
                        <select class="form-control form-control-sm" name="tipo">
                            <option value="administrador">Administrador</option>
                            <option value="colaborador">Colaborador</option>
                            <option value="usuario">Usuário</option>
                        </select>     
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline" id="link">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="ativado" checked=""> ativado
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
            <li class="list-group-item bg-dark" id="link">
                <button class="btn btn-dark"  type="submit">Cadastrar <i class="fa fa-pencil-square" aria-hidden="true"> </i></button>       
            </li>
        </ul>
    </form> 
</div>