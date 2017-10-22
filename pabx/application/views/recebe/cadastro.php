
<form action="<?php echo base_url() ?>recebe/insert" method="post">
    <ul class="list-group">
        <li class="list-group-item active">Configuração de entrada de numeros externos</li>
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <input type="text" name="ddr" class="form-control form-control-sm" placeholder="DDR">
                </div>
                <div class="col">
                    <select class="form-control form-control-sm" name="aplicacao">
                        <option value="Dial(SIP/">SIP</option>
                        <option value="Dial(IAX2/">IAX2</option>
                        <option value="Queue(">Queue</option>
                        <option value="Goto(">Goto</option>             
                        <option value="Dial(DAHDI/g0/">DAHDI/g0</option>
                        <option value="Dial(DAHDI/g1/">DAHDI/g1</option>
                        <option value="Dial(DAHDI/g2/">DAHDI/g2</option>
                        <option value="Dial(DAHDI/g3/">DAHDI/g3</option>        
                    </select>                
                </div>
                <div class="col">
                    <input class="form-control form-control-sm" type="text" name="goto" value="entrada">               
                </div>
                
       
                <div class="col">
                    <select class="form-control form-control-sm" name="primeiro">
                        <?php foreach ($ramais as $row): ?> 
                            <option value="<?php echo $row->ramal; ?>"><?php echo $row->ramal; ?></option>
                        <?php endforeach; ?>
                        <?php foreach ($queues as $row): ?> 
                            <option value="<?php echo $row->nome; ?>"><?php echo $row->nome; ?></option>
                        <?php endforeach; ?>
                        <?php foreach ($ura as $row): ?> 
                            <option value="<?php echo $row->nome; ?>"><?php echo $row->nome; ?></option>
                        <?php endforeach; ?>
                            <option value="s">s</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="tempoprimeiro">
                            <option value="90">90</option>
                            <?php
                            for ($tempo = 1; $tempo < 61; $tempo++) {
                                echo "<option value=" . $tempo . ">" . $tempo . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="opecoes">
                            <option value="t">t</option>
                            <option value="tT">tT</option>
                            <option value="rtT">rtT</option>
                            <option value="rtTk">rtTk</option>
                            <option value="rtTkK">rtTkK</option>
                        </select>
                    </div>
                </div>

            </div>
        </li>
        <li class="list-group-item">

        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <input type="text" name="ring" class="form-control form-control-sm" placeholder="dr1">
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="grava" id="inlineRadio1" value="garva"> Ativa gravação
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="grava" id="inlineRadio2" value="" checked=""> Desativa gravação
                        </label>
                    </div>
                </div>
            </div>
        </li>
    </ul><br />
    <input class="btn btn-primary" type="submit" value="cadastrar">
</form>    
</div>