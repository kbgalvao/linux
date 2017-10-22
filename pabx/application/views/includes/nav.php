<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="<?php echo base_url() ?>home"><i class="fa fa-asterisk" aria-hidden="true"></i> Pabx</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="<?php echo base_url() ?>home">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ferramentas">
                    <a class="nav-link" href="<?php echo base_url() ?>ferramentas/listar">
                        <i class="fa fa-fw fa fa-wrench"></i>
                        <span class="nav-link-text">Ferramentas</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-phone-square"></i>
                        <span class="nav-link-text">Central</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="<?php echo base_url() ?>central/listar">ramais</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>recebe">Entrada</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>saida">Saida</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>ura">Ura</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>fila_atendimento">queues</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>audio">audio</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>servicos">serviços</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-sitemap"></i>
                        <span class="nav-link-text">admin</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseMulti">
                        <li>
                            <a href="<?php echo base_url() ?>admin">Usuarios</a>
                        </li>
                    </ul>
                </li>  
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ferramentas">
                    <a class="nav-link" href="<?php echo base_url() ?>gravacao">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <span class="nav-link-text">Gravaçao</span>
                    </a>
                </li>

            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-warning" href="<?php echo base_url() ?>login/logout"> Logout <i class="fa fa-fw fa-sign-out"></i></a>  
                </li>
            </ul>
        </div>
    </nav>