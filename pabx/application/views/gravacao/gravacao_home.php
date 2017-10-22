<table class="table table-sm" id="dataTable" >
    <thead class="thead-inverse">
        <tr>
            <th class="text-light text-center">Origem</th>
            <th class="text-light text-center">Destino</th>
            <th class="text-light text-center">Data</th>
            <th class="text-light text-center">Tempo</th>
            <th class="text-light text-center">Hora</th>
            <th class="text-light text-center">Acões</th>

        </tr>
    </thead>
    <tbody id="">

        <?php
        foreach ($query->result() as $row):
            $gravacao = 'monitor/' . $row->uniqueid . '.mp3';
            if (file_exists($gravacao)):
                ?>
                <tr>
                    <td class="text-center"> <?php echo $row->src; ?></td>
                    <td class="text-center"> <?php echo $row->dst; ?></td>
                    <td class="text-center">  
                        <?php
                        echo date("d/", strtotime($row->calldate));
                        $meses = array('Janeiro', 'Fevereiro', 'MarÃ§o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
                        echo $meses[(int) (date("m/", strtotime($row->calldate)) - 1)];
                        echo date("/20y", strtotime($row->calldate));
                        ?>
                    </td>
                    <td class="text-center"><?php echo gmdate("i:s", $row->duration); ?></td>
                    <td class="text-center"><?php echo date("H:i:s A ", strtotime($row->calldate)); ?></td>

                    <td class="text-center">
                      <!--  <a  href="/pabx/monitor/<?php echo $row->uniqueid; ?>.mp3" download><i class="fa fa-download" aria-hidden="true"></i></a>-->

                        <div style="display: none">
                            <audio id="<?php echo $row->uniqueid?>" controls onpause="alertaPausa()">
                                <source src="arquivo.ogg" type="audio/ogg">
                                <source src="/pabx/monitor/<?php echo $row->uniqueid; ?>.mp3" type="audio/mpeg">
                            </audio>
                        </div>
                        <div>
                            <a class="btn btn-link" onclick="document.getElementById('<?php echo $row->uniqueid?>').play()"><i class="fa fa-play" aria-hidden="true"></i></a>
                            <a class="btn btn-link" onclick="document.getElementById('<?php echo $row->uniqueid?>').pause()"><i class="fa fa-pause" aria-hidden="true"></i></a>
                            <a class="btn btn-link" onclick="document.getElementById('<?php echo $row->uniqueid?>').volume += 0.1"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
                            <a class="btn btn-link" onclick="document.getElementById('<?php echo $row->uniqueid?>').volume -= 0.1"><i class="fa fa-volume-down" aria-hidden="true"></i></a>
                            <a class="btn btn-link" onmousedown="document.getElementById('<?php echo $row->uniqueid?>').currentTime += 2"><i class="fa fa-fast-forward" aria-hidden="true"></i></a>
                            <a class="btn btn-link" onmousedown="document.getElementById('<?php echo $row->uniqueid?>').currentTime -= 2"><i class="fa fa-fast-backward" aria-hidden="true"></i></a>
                            <a  href="/pabx/monitor/<?php echo $row->uniqueid; ?>.mp3" download><i class="fa fa-download" aria-hidden="true"></i></a>
                        </div>  

                    </td>
                </tr>    
                <?php
            endif;
        endforeach;
        ?>                    
    </tbody>
</table>

<script>
    function pega_tempo() {
        alert("Duração da faixa: " + document.getElementById("<?php echo $row->uniqueid?>").duration);
    }
</script>