<header>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="">Bienvenidos a Techni-Translate</a>
                <nav class="nav-collapse">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#">Alertas</a>
                            <ul class="nav">
                                <!--<li class="active"><a href="reporteCambioEstado.php">Reporte de Cambios de Estados</a></li>
                                <li ><a href="listar.php">Control de Procesos</a></li>
                                <li><a href="#about"></a></li>
                                -->
                            </ul>
                        </li>
                        <li class="active"><a href="<?= $this->config->base_url() ?>marqueting/compania">Marqueting</a></li>
                        <li class="active"><a href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/">Proyectos- Reporte</a></li>
                        <li class="active"><a href="#contact">Reportes</a></li>
                    </ul>

                </nav><!--/.nav-collapse -->
                <ul class="nav pull-right">
                    <li class="active"><a href="<?= $this->config->base_url() ?>login/cerrar_sesion">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>