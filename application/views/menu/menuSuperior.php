<?php
if (!(isset($menu))) {
    $menu = "";
}
if ($menu == "1") {
    $activo1 = " class='active'";
} else {
    $activo1 = " ";
} //Telefonmarqueting
if ($menu == "2") {
    $activo2 = " class='active'";
} else {
    $activo2 = " ";
} //Marqueting
if ($menu == "3") {
    $activo3 = " class='active'";
} else {
    $activo3 = " ";
} //Inbox
if ($menu == "4") {
    $activo4 = " class='active'";
} else {
    $activo4 = " ";
} //Proyectos abiertos
if ($menu == "5") {
    $activo5 = " class='active'";
} else {
    $activo5 = " ";
} //Reportes
if ($menu == "6") {
    $activo6 = " class='active'";
} else {
    $activo6 = " ";
} //Reportes
?>
<header>

    <div class="navbar navbar-fixed-top">

        <a class="brand" href="">&nbsp; Techni-Translate</a>
        <ul id="menu">

            <?php if ($xxxnivel === "1") { ?>

                <li ><a <?php echo $activo1; ?> href="<?= $this->config->base_url() ?>marqueting/telefonmarketing/operador">Telefonmarqueting</a></li>
                <li ><a <?php echo $activo2; ?> href="<?= $this->config->base_url() ?>marqueting/compania">Marqueting</a>
                    <ul>
                        <li><a href="<?= $this->config->base_url() ?>marqueting/campana_marqueting/campana">Campa&ntilde;a de Marqueting</a></li>
                    </ul>
                </li>
                <!--<li ><a <?php echo $activo6; ?> href="<?= $this->config->base_url() ?>marqueting/campana_marqueting/campana">Campaña de Marqueting</a></li>-->
                <li ><a <?php echo $activo3; ?> href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/">Inbox</a></li>
                <li ><a <?php echo $activo4; ?> href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/listar">Proyectos abiertos</a></li>
                <li ><a <?php echo $activo5; ?> href="#contact">Reportes</a>
                    <!-- <ul>
                         <li><a href="#">CSS</a></li>
                         <li><a href="#">Graphic design</a></li>
                         <li><a href="#">Development tools</a>
                             <ul>
                                 <li><a href="#">CSS</a></li>
                                 <li><a href="#">Graphic design</a></li>
                                 <li><a href="#">Development tools</a></li>
                                 <li><a href="#">Web design</a></li>
                             </ul>
                         </li>
                         <li><a href="#">Web design</a></li>
                     </ul>
                    -->
                </li>


            <?php } ?>
            <?php if ($xxxnivel === "2") { ?>

                <li ><a<?php echo $activo4; ?> href="<?= $this->config->base_url() ?>proyectos/procesos/proceso/listar">Proyectos abiertos</a></li>

            <?php
            }
            if ($xxxnivel === "3") { //cliente
                ?>
                <li ><a href="<?= $this->config->base_url() ?>login/cerrar_sesion"><i class="icon-user"></i> Log Out (<?= $xxxiniciales; ?>)</a></li>            
                <?php
            } else {
                ?>
                <li ><a href="<?= $this->config->base_url() ?>login/cerrar_sesion"><i class="icon-user"></i> Cerrar Sesión <?= $xxxiniciales; ?></a></li>            
                <?php
            }
            ?>


            <!--  <li><a class="active" href="#">Home</a></li>
              <li>
                  <a href="#">Categories</a>
                  <ul>
                      <li><a href="#">CSS</a></li>
                      <li><a href="#">Graphic design</a></li>
                      <li><a href="#">Development tools</a>
                              <ul>
                                  <li><a href="#">CSS</a></li>
                                  <li><a href="#">Graphic design</a></li>
                                  <li><a href="#">Development tools</a></li>
                                  <li><a href="#">Web design</a></li>
                              </ul>
                          </li>
                      <li><a href="#">Web design</a></li>
                  </ul>
              </li>
              <li><a href="#">Work</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
            -->

        </ul>

    </div>


</header>