<?php
    // Pobierz polączenie z bazą danych
    require '/../funkcje/baza.php';

?>

<!-- https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=movie&imgsz=large -->

<div class="row carousel-holder">

    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
            // Pobieramy pierwsze 3 obrazki do karuzeli
                $results = $baza->get_results("SELECT * FROM filmy LIMIT 3");
                // iteruj po wszystkich filmach
                foreach($results as $film) {?>
                    <div class="item <?php if ($film === reset($results)) echo 'active' ?>">
                        <img class="slide-image" src="<?=$film->adres_do_obrazka?>" alt="">
                        <div class="carousel-caption">
                          <h3><?=$film->nazwa?></h3>
                      </div>
                    </div>
                    <?php } ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>

<div class="row">
<?php
    $results = $baza->get_results("SELECT * FROM filmy");
    // iteruj po wszystkich filmach
    foreach($results as $film) {
        
?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <div class="ratio" style="background-image:url('<?=$film->adres_do_obrazka?>')"></div>
          
            <div class="caption">
                <h4 class="pull-right">$<?=$film->cena?></h4>
                <h4><a href="#"><?=$film->nazwa?></a>
                </h4>
                <p><?=$film->opis?></p>
            </div>
            <div class="ratings">
                <p class="pull-right"><?=$film->ile_razy_kupiono?> zakupów</p>
                <p>
                    <?php 
                    for ($i=0;$i<$film->ocena;$i++)
                        echo '<span class="glyphicon glyphicon-star"></span>'
                    ?>
                    
                </p>
            </div>
        </div>
    </div>
<?php
  }
   // var_dump($results);
?>

</div>