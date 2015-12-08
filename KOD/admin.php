<html>
<head>
    <?php include 'strona/naglowek.php';?>
    <title>Panel Administracyjny</title>
</head>
<body>
<div class="container">
    <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0){ ?>
    <div class="jumbotron col-md-12 gora-strony">
        <div class="row">
            <div class="text-center col-md-9 col-sm-9 col-xs-12 moje-logo">
                <h1>Panel Administracyjny</h1>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <?php
                if(!isset($_GET['noscript'])){
                    include 'logowanie/logowanie_zawartosc.php';
                    include 'strona/admin/admin_wyjdz.php';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
        include 'strona/admin/admin_loguj.php';
    ?>
    <?php }else{
        header("Location: index.php");
    }?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="strona/admin_table_skrypt.js"></script>
</body>
</html>