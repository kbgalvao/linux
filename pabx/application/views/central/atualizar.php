<?php foreach ($query as $row): ?>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo base_url() ?>central/update" method="post">
                <input type="hidden" name="id"class="form-control form-check" value="<?php echo $row->id; ?>">

                <ul class="list-group">
                    <li class="list-group-item active">Atualizar ramal Asterisk </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="ramal"class="form-control" value="<?php echo $row->ramal; ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="secret"class="form-control" value="<?php echo $row->ramal; ?>@landell">
                            </div>
                            <div class="col">
                                <input type="text" name="context"class="form-control" value="<?php echo $row->context; ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="host"class="form-control" value="dynamic">
                            </div>
                            <div class="col">
                                <input type="text" name="dtmf"class="form-control" value="rfc2833">
                            </div>
                        </div>
                    </li>
                    <div class="row"></div>
                    <li class="list-group-item"> 
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" id="" name="type">
                                        <option value="friend">friend</option>
                                        <option value="user">user</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" id="" name="qualify">
                                        <option value="yes">Qualify Sim</option>
                                        <option value="no">Qualify Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" id="" name="direct">
                                        <option value="yes">Direct media Sim</option>
                                        <option value="no">Direct media Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" id="" name="callgroup">
                                        <option value="1">grupo 1</option>
                                        <option value="2">grupo 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" id="" name="pickupgroup">
                                        <option value="1">captura 1</option>
                                        <option value="2">captura 2</option>
                                        <option value="1">captura 3</option>
                                        <option value="2">captura 4</option>
                                        <option value="1">captura 5</option>
                                        <option value="2">captura 6</option>
                                        <option value="2">captura 7</option>
                                        <option value="2">captura 8</option>
                                        <option value="2">captura 9</option>
                                    </select>
                                </div>
                            </div>
                    </li>
                    <li class="list-group-item"><div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="hidden" name="disallow" value="all">
                                <input class="form-check-input" type="radio" name="ulaw" id="inlineRadio1" value="ulaw" checked=""> Ulaw
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="alaw" id="inlineRadio2" value="alaw" checked=""> Alaw
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gsm" id="inlineRadio2" value="gsm" checked=""> Gsm
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="g729" id="inlineRadio2" value="g729" checked=""> G729
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <label>Gravação saida</label>       
                                <label class="custom-control custom-radio">
                                    <input id="radio1" name="gravacaosaida" type="radio" class="custom-control-input" value="sim" <?php if ($row->gravacaosaida == 'sim') { echo "checked"; } ?>>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Sim</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio2" name="gravacaosaida" type="radio" class="custom-control-input" value="nao" <?php if ($row->gravacaosaida == 'nao') { echo "checked"; } ?>>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Não</span>
                                </label>
                            </div>
                            <div class="col-2">
                                <label>Gravação entrada</label>    
                                <label class="custom-control custom-radio">
                                    <input id="radio1" name="gravacaoentrada" type="radio" class="custom-control-input" value="sim" <?php if ($row->gravacaoentrada == 'sim') { echo "checked"; } ?>>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Sim</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio2" name="gravacaoentrada" type="radio" class="custom-control-input" value="nao"  <?php if ($row->gravacaoentrada == 'nao') { echo "checked"; } ?>>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Não</span>
                                </label>
                            </div>
                        </div>
                    </li>
                </ul><br>
                <input class="btn btn-primary"type="submit" value="Cadastrar">
                <a class="btn btn-danger" href="<?php echo base_url() ?>central/deletar/<?php echo $row->id ?>">Delatar <i class="fa fa-trash" aria-hidden="true"></i></a>
            </form>
        </div>          
    </div>
<?php endforeach; ?>
