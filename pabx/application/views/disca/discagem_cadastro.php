<form action="<?php echo base_url(); ?>saida/updateplanodiscagen" method="post">
    <ul class="list-group">
        <li class="list-group-item active">Cras justo odio</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-2">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control form-control-sm" value="">
                </div>
                <div class="col-3">
                    <label>Numeros</label>
                    <input type="text" name="numero" class="form-control form-control-sm" value="">
                </div>
                <div class="col-2">
                    <label>Tecnologia</label>
                    <input type="text" name="tecnologia" class="form-control form-control-sm" value="">
                </div>
                <div class="col-2">
                    <label>Rota</label>
                    <input type="text" name="tipo" class="form-control form-control-sm" value="">
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
                    <label>Operadora</label>   
                    <input type="text" name="operadora"class="form-control form-control-sm" value="">
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <input  class="btn btn-primary" type="submit" value="atualizar">

        </li>
    </ul>
</form>