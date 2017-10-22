<?php foreach ($ura as $row): ?>
    <form action="<?php echo base_url() ?>ura/update" method="post">
        <ul class="list-group">
            <li class="list-group-item active">Update ura</li>  
            <input type="hidden" name="id" class="form-control" id="exampleFormControlInput1" value="<?php echo $row->id; ?>">
            <li class="list-group-item">
                <div class="row">
                    <div class="form-group  col-6">
                        <label class="btn btn-primary btn-block btn-sm" for="nome">Nome ura:</label>
                        <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" value="<?php echo $row->nome; ?>">
                    </div>
                    <div class="form-group- col-6">
                        <label class="btn btn-primary btn-block btn-sm" for="nome">operadora :</label>
                        <select class="form-control form-control-sm" name="operadora">
                            <option value="<?php echo $row->operadora; ?>"><?php echo $row->operadora; ?></option>
                            <?php foreach ($ramais as $ramal): ?>
                                <option value="Goto(interno,<?php echo $ramal->ramal; ?>,1)"><?php echo $ramal->ramal; ?></option>
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 0:</label>
                        <select class="form-control form-control-sm" name="dg0">
                            <option value="<?php echo $row->dg1; ?>"><?php echo $row->dg1; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 1:</label>
                        <select class="form-control form-control-sm" name="dg1">
                            <option value="<?php echo $row->dg1; ?>"><?php echo $row->dg1; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 2:</label>
                        <select class="form-control form-control-sm" name="dg2">
                            <option value="<?php echo $row->dg2; ?>"><?php echo $row->dg2; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 3:</label>
                        <select class="form-control form-control-sm" name="dg3">
                            <option value="<?php echo $row->dg3; ?>"><?php echo $row->dg3; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 4:</label>
                        <select class="form-control form-control-sm" name="dg4">
                            <option value="<?php echo $row->dg4; ?>"><?php echo $row->dg4; ?></option>  
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
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 5:</label>
                        <select class="form-control form-control-sm" name="dg5">
                            <option value="<?php echo $row->dg5; ?>"><?php echo $row->dg5; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 6:</label>
                        <select class="form-control form-control-sm" name="dg6">
                            <option value="<?php echo $row->dg6; ?>"><?php echo $row->dg6; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 7:</label>
                        <select class="form-control form-control-sm" name="dg7">
                            <option value="<?php echo $row->dg7; ?>"><?php echo $row->dg7; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 8:</label>
                        <select class="form-control form-control-sm" name="dg8">
                            <option value="<?php echo $row->dg8; ?>"><?php echo $row->dg8; ?></option>  
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
                    <div class="col">
                        <label class="btn btn-primary btn-block btn-sm">Digito: 9:</label>
                        <select class="form-control form-control-sm" name="dg9">
                            <option value="<?php echo $row->dg9; ?>"><?php echo $row->dg9; ?></option>  
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
            </li>
            <li class="list-group-item">
                <div class="form-group- col-3">
                    <label class="btn btn-primary btn-block btn-sm" for="nome">Audio :</label>
                    <select class="form-control form-control-sm" name="audio">
                        <option value="<?php echo $row->audio; ?>"><?php echo $row->audio; ?></option>
                        <?php foreach ($audio as $row): ?>
                            <option value="<?php echo $row->pasta; ?>"><?php echo $row->pasta; ?></option>
                        <?php endforeach; ?>   
                    </select>           
                </div>
            </li>  
            <li class="list-group-item">
                <input class="btn btn-primary " type="submit" value="cadastrar">
                <?php foreach ($ura as $ivr)?>
                <a class="btn btn-danger " href="<?php echo base_url() ?>ura/deletar/<?php echo $ivr->id; ?>">deletar<?php echo $ivr->nome; ?></a> 
                
            </li>
        </ul>
    </form>
    <br><br><br>
    <?php
endforeach;
