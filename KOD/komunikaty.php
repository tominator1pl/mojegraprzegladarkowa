<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" media="all" rel="stylesheet" type="text/css">
    <?php
    include_once 'polaczZBD.php';
    session_start();
    ?>
    <title>Komunikaty</title>
</head>
<body>
<?php include "strona/komunikaty_zawartosc.php"; ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
