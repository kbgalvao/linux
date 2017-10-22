

        <form action="<?php echo base_url() ?>ferramentas/rede" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">IPv4:</label>
                <input type="text" name="ip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="IP">
                <small id="ip" class="form-text text-muted">Adicione um endereço ip</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mascara:</label>
                <input type="text" name="mask" class="form-control" id="exampleInputPassword1" placeholder="Mascara">
                <small id="mask" class="form-text text-muted">Adicione uma mascara</small>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Gateway:</label>
                <input type="text" name="gw" class="form-control" id="exampleInputPassword1" placeholder="gateway">
                <small id="gw" class="form-text text-muted">Adicione um Gateway</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">dns primario:</label>
                <input type="text" name="dns" class="form-control" id="exampleInputPassword1" placeholder="gateway">
                <small id="gw" class="form-text text-muted">Adicione um Gateway</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form><br>
        <div class="alert alert-dark text-center"  role="alert">
            <?php
            echo "IP Servidor é: " . $_SERVER['SERVER_NAME'];
            ?>
        </div>
    </div>
</div>
