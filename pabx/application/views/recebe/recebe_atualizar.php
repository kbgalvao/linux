<?php foreach ($entrada as $row): ?>
    <form action="<?php echo base_url(); ?>recebe/recebe_update" method="post">
        <input type="hidden" name="id" class="form-control" id="formGroupExampleInput" value="<?php echo $row->id; ?>">

        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            primeiro:
                        </a>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">
                        <div class="form-group">
                            <label class="form-control-label form-control-sm" for="formGroupExampleInput"></label>
                            <input type="text" name="primeiro" class="form-control" id="formGroupExampleInput" value="<?php echo $row->primeiro; ?>">
                        </div> 
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            segundo:
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        <div class="card-block">
                            <div class="form-group">
                                <input type="text" name="toque" class="form-control" id="formGroupExampleInput" value="<?php echo $row->toque; ?>"">
                            </div> 
                            <div class="form-group">
                                <input type="text" name="gravacao" class="form-control" id="formGroupExampleInput" value="same=> n,GotoIf(${DB_EXISTS(GRAVACAO_ENTRADA/${EXTEN:6})}?gravacao)">
                                <input type="text" name="segundo" class="form-control" id="formGroupExampleInput" value="same=> n,Goto(interno,${EXTEN:6},1)">
                                <input type="text" name="noop" class="form-control" id="formGroupExampleInput" value="same=> n(gravacao),Noop(########### GRAVA ########)">
                                <input type="text" name="terceiro" class="form-control" id="formGroupExampleInput" value="same=> n,Goto(gravacao_entrada,${EXTEN:6},1)">
                            </div>      
                        </div>           
                    </div>
                </div>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="update entrada">
        <a class="btn badge-danger" href="<?php echo base_url(); ?>recebe/recebe_deletar/<?php echo $row->id; ?>">Deletar</a>
    </div>

    </form>
<?php endforeach; ?>