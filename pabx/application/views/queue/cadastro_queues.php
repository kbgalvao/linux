<form action="<?php echo base_url() ?>fila_atendimento/insert" method="post">

    <ul class="list-group">
        <li class="list-group-item active">Cadastro fila</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required="">
                    
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">musicclass</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="musicclass">
                            <option value="default">default</option>
                            <?php foreach ($query as $row): ?>
                                <option value="<?php echo $row->pasta; ?>"><?php echo $row->pasta; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="col">
                    <label>strategy:</label>
                    <input type="text" name="strategy" class="form-control" value="rrmemory">
                </div>
                <div class="col">
                    <label>servicelevel:</label>
                    <input type="text" name="servicelevel" class="form-control" value="60">
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <label>context:</label>
                    <input type="text" name="context" class="form-control" value="default">
                </div>
                <div class="col">
                    <label>timeout:</label>
                    <input type="text" name="timeout" class="form-control" value="15">
                </div>
                <div class="col">
                    <label>wrapuptime:</label>
                    <input type="text" name="wrapuptime" class="form-control" value="10">
                </div>
                <div class="col">
                    <label>maxlen:</label>
                    <input type="text" name="maxlen" class="form-control" value="10">
                </div>
            </div>
        </li>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Membros</label>
            <textarea class="form-control" name="membros"  rows="3" cols="3">
.
            </textarea>
        </div>
    </ul> <br />
    <input class="btn btn-primary" type="submit" value="cadastrar">
</form>

