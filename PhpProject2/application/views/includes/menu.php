
<body > 
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa fa-asterisk" aria-hidden="true"> <?php echo $this->session->user; ?></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin <i class="fa fa-user-secret" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu bg-warning" aria-labelledby="dropdown01" id="link">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>admin"><i class="fa fa-users" aria-hidden="true"></i>
                                Usuarios</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>admin/cadastro"><i class="fa fa-address-book" aria-hidden="true"></i>
                                Cadastro</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Extension <i class="fa fa-phone-square" aria-hidden="true"></i>

                        </a>
                        <div class="dropdown-menu bg-warning" aria-labelledby="dropdown01" id="link">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>extension"><i class="fa fa-list" aria-hidden="true"></i>
                                listar</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>extension/exec"><i class="fa fa-repeat" aria-hidden="true"></i>
                                exec</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" id="link">
                    <a class="btn btn-warning" href="<?php echo base_url() ?>login/logout"> Logout <i class="fa fa-fw fa-sign-out"></i></a>  
                </form>
            </div>
        </div>
    </nav>
    <br><br><br>
