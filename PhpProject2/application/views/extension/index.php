

<div class="container">
    <div class="jumbotron">
        <ul class="list-group">
            <form>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Operadora fixo:</label>
                        <div class="row">
                            <?php foreach ($op_fixo as $row): ?>
                                <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $row->nome ?>">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $row->facilidade ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Operadora celular:</label>
                        <div class="row">
                            <?php foreach ($op_cel as $row): ?>
                                <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $row->nome ?>">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $row->facilidade ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Desvio Imediato:</label>
                        <div class="row">
                            <?php foreach ($desvio_imediato as $row): ?>
                                <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $row->nome ?>">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $row->facilidade ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-dark">
                    <div class="form-group row">
                        <div class="row">
                            <?php foreach ($desvio_nao_atende_ativa as $row): ?>
                                <input type="hidden">
                                <div class="col-10">
                                    <input type="text" class="form-control"  value="<?php echo $row->nome ?>">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" value="<?php echo $row->facilidade ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-dark">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </li>  
            </form>
        </ul>
    </div>
</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
  </style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>

 
<ul id="sortable">
  <li class="ui-state-default">1</li>
  <li class="ui-state-default">2</li>
  <li class="ui-state-default">3</li>
  <li class="ui-state-default">4</li>
  <li class="ui-state-default">5</li>
  <li class="ui-state-default">6</li>
  <li class="ui-state-default">7</li>
  <li class="ui-state-default">8</li>
  <li class="ui-state-default">9</li>
  <li class="ui-state-default">10</li>
  <li class="ui-state-default">11</li>
  <li class="ui-state-default">12</li>
</ul>
 
 
