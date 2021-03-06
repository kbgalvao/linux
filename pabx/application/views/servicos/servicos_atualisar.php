<?php foreach ($query as $row): ?>
    <form action="<?php echo base_url() ?>servicos/update" method="post">
        <input type="hidden" name="id" value="<?php echo $row->id ?>">
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                            Adicionar Ramal
                        </a>
                    </h5>
                </div>

                <div id="collapsefour" class="collapse show" role="tabpanel" aria-labelledby="headingfour">
                    <div class="card-block">
                        <div class="col">
                            <input type="text" name="ramal" class="form-control" value="<?php echo $row->ramal ?>">
                        </div>      
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Destino 1
                        </a>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" name="primeiro" class="form-control form-control-sm" value="<?php echo $row->primeiro ?>">
                            </div>
                            <div class="col-3">
                                <select class="form-control form-control-sm" name="tempo1">
                                    <option value="<?php echo $row->tempo1 ?>"><?php echo $row->tempo1 ?></option>
                                    <?php for ($i = 1; $i <= 100; $i++) : ?>
                                        <option value="<?php echo $i . ",tT"; ?>"> <?php echo $i.",tT"; ?></option>
                                    <?php endfor; ?>

                                </select>
                            </div>      
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Destino 2
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" name="segundo" class="form-control form-control-sm" value="<?php echo $row->segundo ?>">
                            </div>
                            <div class="col-3">
                                <select class="form-control form-control-sm" name="tempo2">
                                    <option value="<?php echo $row->tempo2 ?>"><?php echo $row->tempo2 ?></option>
                                    <?php for ($i = 1; $i <= 100; $i++) : ?>
                                        <option value="<?php echo $i . ",tT"; ?>"> <?php echo $i.",tT"; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>      
                        </div>           
                    </div>
                </div>
            </div><br>
            <div class="card">
                <div class="card-header" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Destino 3
                        </a>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="card-block">
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" name="terceiro" class="form-control form-control-sm" value="<?php echo $row->terceiro ?>">
                            </div>
                            <div class="col-3">
                                <select class="form-control form-control-sm" name="tempo3">
                                    <option value="<?php echo $row->tempo3 ?>"><?php echo $row->tempo3 ?></option>
                                    <?php for ($i = 1; $i <= 100; $i++) : ?>
                                        <option value="<?php echo $i . ",tT"; ?>"> <?php echo $i.",tT"; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>      
                        </div>                
                    </div>
                </div>
            </div>
        </div>
        <br>
        <input  class="btn btn-primary" type="submit" value="Update"> 
        <a class="btn btn-danger" href="<?php echo base_url()?>servicos/deletar/<?php echo $row->id;?>">Deletar<a>
    </form>
<?php endforeach; ?>
