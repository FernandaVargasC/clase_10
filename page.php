<?php include('header.php');?> <!--include encabezado-->

<?php 
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/FernandaVargasC/clase_10/master/data/top10-animacion.csv')); # ir a buscar un csv
      array_walk($csv, function(&$a) use ($csv) { #transformarlo para que la primera linea lo entienda por encabezado
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">¡Top 10! - Mejores películas animadas de Netflix</h1> <!--texto-->
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?> <!-- ciclo for para pregunta linea por linea-->
    <div class="col-sm-4 col-md-3 py-3">
    <h3 class="border-top pt-3"><?php print($csv[$t]['nombre'])?></h3>
    
    <figure style="height:120px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['img'] == NULL){ #pregunto por la imagen
        print ("img/image.jpg"); #si es q no hay ninguna pone
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>

    <h6 class="border-top pt-3">Estreno: <?php print($csv[$t]['estreno'])?></h6>
    <h6 class="border-top pt-3">Duración: <?php print($csv[$t]['duracion'])?></h6>
    <p class="border-top pt-3"><b>Descripción: </b><?php print($csv[$t]['descripcion'])?></p>

    <?php if ($csv[$t]['nombre'] == NULL){
        print '<p><a href="'.($csv[$t]['url']).'">Recaudación</a></p>';
    } else {
        print '<p><a href="'.($csv[$t]['url']).'">Recaudación</a></p>';
    }?>


    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?> <!--include pie de página-->