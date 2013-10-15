<header>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

                <a class="brand" href="">Bienvenidos a Techni-Translate</a>
                <nav class="nav-collapse">
                    <?php if ($xxxnivel==="1"){ ?>
                    <ul class="nav nav-pills">
                        <li class="active"><a href="<?= $this->config->base_url() ?>marqueting/compania">Marqueting</a></li>
                        <li class="active"><a href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/">Proyectos - Reporte Cambio de Estado</a></li>
                        <li class="active"><a href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/listar">Proyectos - Control de Procesos</a></li>
                        <li class="active"><a href="#contact">Reportes</a></li>
                    </ul>
                    <?php } ?>
                    <?php if ($xxxnivel==="2"){ ?>
                    <ul class="nav nav-pills">
                        <li class="active"><a href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/listar">Proyectos - Control de Procesos</a></li>
                    </ul>
                    <?php } ?>
                    

                </nav>


                <ul class="nav pull-right">
                    <li class="active"><a href="<?= $this->config->base_url() ?>login/cerrar_sesion">Cerrar Sesión <?=$xxxiniciales;?></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>