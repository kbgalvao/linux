<?php foreach ($query as $ip): ?>
    <form action="<?php echo base_url() ?>ferramentas/insert" method="post">
        <ul class="list-group">
            <li class="list-group-item active">IP Asterisk</li>
            <div class="row">
                <div class="col">
                    <li class="list-group-item">
                        <input type="text" name="ip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $ip->ip; ?>">
                    </li>
                </div>
                <div class="col">
                    <li class="list-group-item">
                        <input type="text" name="gw" class="form-control" id="exampleInputPassword1" value="<?php echo $ip->gw; ?>">
                    </li>
                </div>
                <div class="col">
                    <li class="list-group-item">
                        <input type="text" name="dns" class="form-control" id="exampleInputPassword1" value="<?php echo $ip->dns; ?>">
                    </li>
                </div>
                <div class="col">
                    <li class="list-group-item">
                        <input type="text" name="placa" class="form-control" id="exampleInputPassword1" <input type="text" name="placa" class="form-control" id="exampleInputPassword1" value="<?php echo $ip->placa; ?>">
                    </li>
                </div>
            </div>
        </ul><br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-danger "href="<?php echo base_url() ?>ferramentas/deletar/<?php echo $ip->id; ?>">deletar</a>   
    </form>
<?php endforeach; ?>
</div>
