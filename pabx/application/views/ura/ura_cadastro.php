<form action="<?php echo base_url() ?>ura/insert" method="post">
    <ul class="list-group">
        <li class="list-group-item active">Criar ura</li>  
        <li class="list-group-item">
            <div class="row">
                <div class="form-group  col-6">
                    <label class="btn btn-primary btn-block btn-sm" for="nome">Nome ura:</label>
                    <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="nome ura" required="">
                </div>
                <div class="form-group- col-6">
                    <label class="btn btn-primary btn-block btn-sm" for="nome">operadora :</label>
                    <select class="form-control form-control-sm" name="operadora">
                        <?php foreach ($ramais as $ramal): ?>
                            <option value="goto(interno/<?php echo $ramal->ramal; ?>,1)"><?php echo $ramal->ramal; ?></option>
                        <?php endforeach; ?>   
                        <?php foreach ($queues as $queue): ?>
                            <option value="queue(<?php echo $queue->nome; ?>)"><?php echo $queue->nome; ?></option>
                        <?php endforeach; ?>   
                    </select>           
                </div>

            </div>      
        </li>
        <li class="list-group-item">
            <div class="row">
                <?php for ($i = 0; $i <= 4; $i++): ?>
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: <?php echo $i; ?>:</label>
                        <select class="form-control form-control-sm" name="dg<?php echo $i ?>">
                            <?php foreach ($ramais as $ramal): ?>
                                <option value="Goto(interno,<?php echo $ramal->ramal; ?>,1)"><?php echo $ramal->ramal; ?></option>
                            <?php endforeach; ?>   
                            <?php foreach ($queues as $queue): ?>
                                <option value="queue(<?php echo $queue->nome; ?>)"><?php echo $queue->nome; ?></option>
                            <?php endforeach; ?> 
                            <?php foreach ($ura as $queue): ?>
                                <option value="Goto(<?php echo $queue->nome; ?>,s,1)"><?php echo $queue->nome; ?></option>
                            <?php endforeach; ?>     
                        </select>
                    </div>
                <?php endfor; ?> 
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <?php for ($i = 5; $i <= 9; $i++): ?>
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Opeção <?php echo $i; ?>:</label>
                        <select class="form-control form-control-sm" name="dg<?php echo $i ?>">
                            <?php foreach ($ramais as $ramal): ?>
                                <option value="Goto(interno,<?php echo $ramal->ramal; ?>,1)"><?php echo $ramal->ramal; ?></option>
                            <?php endforeach; ?>   
                            <?php foreach ($queues as $queue): ?>
                                <option value="queue(<?php echo $queue->nome; ?>)"><?php echo $queue->nome; ?></option>
                            <?php endforeach; ?>
                            <?php foreach ($ura as $queue): ?>
                                <option value="Goto(<?php echo $queue->nome; ?>,s,1)"><?php echo $queue->nome; ?></option>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                <?php endfor; ?> 
            </div>
        </li>   
        <li class="list-group-item">
            <div class="form-group- col-3">
                <label class="btn btn-primary btn-block btn-sm" for="nome">Audio :</label>
                <select class="form-control form-control-sm" name="audio">
                    <?php foreach ($audio as $row): ?>
                        <option value="<?php echo $row->pasta; ?>"><?php echo $row->pasta; ?></option>
                    <?php endforeach; ?>   
                </select>           
            </div>
        </li>    
        <li class="list-group-item">
            <input class="btn btn-primary " type="submit" value="cadastrar">
        </li>
    </ul>

</form>

