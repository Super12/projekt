<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">


    <link href="css/jquery-ui.theme.min.css" rel="stylesheet">
    <link href="css/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="css/bootstrap-dialog.css" rel="stylesheet">
    <link href="css/perfect-scrollbar.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>

    <script type="text/javascript">

       $(window).load(function() {
            // Animacja ładowania głównej strony
            $(".se-pre-con").fadeOut("slow");

        });
        

    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="se-pre-con"></div>

<div class="navbar navbar-default navbar-fixed-top" id="navbar"><!-- strona ładowana dynamicznie --></div>

<div class="container" >
    <div class="row">
        <div class="col-sm-3 col-md-3 mCustomScrollbar" id="leftpanel" data-mcs-theme="dark"><!-- zawartość ładowana dynamicznie --></div>
         <div class="col-md-9" id="content">
         <div id="alertBox" class="alert alert-warning" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Błąd!</strong> Musisz się zalogować
        </div>
            <div id="content">

             <?php include("/backend/filmy/wszystkie.php"); ?>
             <!-- zawartośc ładowana dynamicznie -->
         </div>
         </div>
    </div>

</div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!--- ładowanie jquery ui -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.waitforimages.min.js"></script>
    <script src="js/funkcje.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    
    <script type="text/javascript">

        //ładuj pasek i menu
        loadNavbar();
        loadLeftpanel();
        sprawdzCzyZalogowany();
        // BootstrapDialog.alert('I want banana!');
        $('body').perfectScrollbar();
    </script>
</body>

</html>
