<form action="<?php echo base_url() ?>ferramentas/insert" method="post">
    <ul class="list-group">
        <li class="list-group-item active">IP Asterisk</li>
        <div class="row">
            <div class="col">
                <li class="list-group-item">
                    <input type="text" name="ip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ip/Mascara" required="">
                </li>
            </div>
            <div class="col">
                <li class="list-group-item">
                    <input type="text" name="gw" class="form-control" id="exampleInputPassword1" placeholder="gateway" required="">
                </li>
            </div>
            <div class="col">
                <li class="list-group-item">
                    <input type="text" name="dns" class="form-control" id="exampleInputPassword1" placeholder="Dns" required="">
                </li>
            </div>
            <div class="col">
                <li class="list-group-item">
                    <input type="text" name="placa" class="form-control" id="exampleInputPassword1" <input type="text" name="placa" class="form-control" id="exampleInputPassword1" value="<?php
                    $placa = shell_exec('sudo ip addr show');
                    $rede = explode(':', $placa);
                    echo substr($rede[26], 62, 10);
                    ?>">
                </li>
            </div>
        </div>
    </ul><br>
     <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

</div>