<ul class="nav" id="nav1">
    <?php
    foreach ($companias as $p) {
    ?>
        <li><?= $p->idcompania; ?>: <?= $p->nombre; ?></li>
    <?php 
    }
    ?>
</ul>
<?
echo "<ul id=\"pagina\">";
echo $pag_links;
echo "</ul>";
?>