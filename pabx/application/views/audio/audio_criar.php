<form class="form" action="<?php echo base_url() ?>audio/insert" method="post">
    <ul class="list-group">
        <li class="list-group-item active">Criar pasta</li>
        <li class="list-group-item">
            <div class="form-group mx-sm-3">
                <label for="inputPassword2" class="sr-only">Criar pasta</label>
                <input type="text" name="pasta" class="form-control" id="inputPassword2" placeholder="nome pasta">
            </div>
        </li>
        <li class="list-group-item">    <button type="submit" class="btn btn-primary">Enviar</button>
        </li>
    </ul>
</form>