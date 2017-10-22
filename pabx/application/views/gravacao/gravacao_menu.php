<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?php echo base_url() ?>gravacao">Home</a>
            </li>
            <li class="breadcrumb-item">
                <!-- Trigger the modal with a button -->
                <a data-toggle="modal" data-target="#myModal">Pesquisar data</a>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pesquisar data</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url(); ?>gravacao/listar" method="post">
                                    <div class="row" >
                                        <div class="col-sm-12">
                                            <div class="input-group date">
                                                <input type="text" name="date1" class="form-control form-control-sm" id="exemplo1"  placeholder="data inicio">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div><br /> <br />

                                        <div class="col-sm-12">
                                            <div class="input-group date">
                                                <input type="text" name="date2" class="form-control form-control-sm" id="exemplo2" placeholder="data fim" >
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>  
                                                </div><br>
                                            </div>
                                        </div>
                                    </div><br />
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Pesquisar</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
        </ol>

        <div class="row">
            <div class="col-12">