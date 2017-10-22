<?php foreach ($queues as $row): ?>
    <form action="<?php echo base_url() ?>fila_atendimento/atualisar_queues" method="post">
        <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">

        <ul class="list-group">
            <li class="list-group-item active">Update fila</li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $row->nome ?>">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">musicclass</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="musicclass">
                                <?php foreach ($musica as $musicas): ?>
                                    <option value="<?php echo $musicas->pasta; ?>"><?php echo $musicas->pasta; ?></option>
                                <?php endforeach; ?>
                                <option value="default">default</option>

                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label>strategy:</label>
                        <input type="text" name="strategy" class="form-control" value="<?php echo $row->strategy ?>">
                    </div>
                    <div class="col">
                        <label>servicelevel:</label>
                        <input type="text" name="servicelevel" class="form-control" value="<?php echo $row->servicelevel ?>">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <label>context:</label>
                        <input type="text" name="context" class="form-control" value="<?php echo $row->context ?>">
                    </div>
                    <div class="col">
                        <label>timeout:</label>
                        <input type="text" name="timeout" class="form-control" value="<?php echo $row->timeout ?>">
                    </div>
                    <div class="col">
                        <label>wrapuptime:</label>
                        <input type="text" name="wrapuptime" class="form-control" value="<?php echo $row->wrapuptime ?>">
                    </div>
                    <div class="col">
                        <label>maxlen:</label>
                        <input type="text" name="maxlen" class="form-control" value="<?php echo $row->maxlen; ?>">
                    </div>
                </div>
            </li>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Membros</label>
                        <textarea  class="form-control " name="membros" id="exampleFormControlTextarea1"  rows="5">
                            <?php echo $row->membros ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </ul> <br />
        <input class="btn btn-primary" type="submit" value="update">
        <a class="btn btn-danger" href="<?php echo base_url() ?>fila_atendimento/deletar/<?php echo $row->id; ?>">deletar</a>
    </form>
<?php endforeach; ?>
