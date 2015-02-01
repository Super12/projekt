<?php
    // Pobierz polączenie z bazą danych
    // prblem z includami, rozwiązany w ten sposób
    if ($_GET['js'] == '1')
        require '../funkcje/baza.php'; else
        require 'backend/funkcje/baza.php';
    // dodawanie do zapytania sql

    if ($_GET['sortuj'] == 'najlepsze')
        $sqlSort = ' ORDER BY `ocena` DESC'; 
    elseif ($_GET['sortuj'] == 'najpopularniejsze') 
        $sqlSort = ' ORDER BY `ile_razy_kupiono` DESC';  
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
                $results = $baza->get_results("SELECT * FROM filmy".$sqlSort." LIMIT 3");
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
    // Pobierz filmy z bazy

    $results = $baza->get_results("SELECT * FROM filmy".$sqlSort);
    // iteruj po wszystkich filmach
    foreach($results as $film) {
        
?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <div class="ratio" style="background-image:url('<?=$film->adres_do_obrazka?>')">
            <div class="caption2 col-md-12">
            <div class="col-md-4">
            <a href="javascript:kup(<?=$film->id?>)" class="btn btn-success btn-xs">
            <i class="fa fa-shopping-cart"></i> Zakup </a> 
            </div><div class="col-md-4">
            <a href="javascript:pokaz(<?=$film->id?>)" rel="tooltip" class="btn btn-info btn-xs">
            <i class="fa fa-eye"></i>Pokaz</a></p>
            </div>
            <div class="pull-right col-md-4">
            <a href="javascript:usun(<?=$film->id?>)" rel="tooltip" class="btn btn-danger btn-xs pull-right">
            <i class="fa fa-trash-o"></i>Usuń</a></div>
            
            </div>

            </div>
          
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

<script>
        $(document).ready(function(){
         
            $("[rel='tooltip']").tooltip(); 
         
            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption2').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption2').slideUp(250); //.fadeOut(205)
                }
            );  
         
        }); 
    </script>