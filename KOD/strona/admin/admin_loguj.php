<div class="jumbotron col-md-12">
    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == "true") {
        include 'admin_zawartosc.php';
    }else{
        ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <form name='logowanieadmin' class='form' method='post'>
                    <label for='inputHaslo'>Podaj hasło admina:</label>
                    <input type='password' class='form-control' id='inputHaslo' name='haslo'>
                    <input type='submit' name='loguj' class='btn btn-primary' value='Zaloguj'>
                    <br><?php if(isset($_GET['log']) && $_GET['log'] === 'err')echo 'Nieprawidłowe Hasło'?>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['loguj'])){ // podwójne zabezpieczenie trzeba podac jeszcze raz haslo administratora aby wejsc w panel.
            $haslo = $_POST['haslo'];
            $salt = "marynowany";
            $haslo = md5($salt . $haslo);
            $p = polacz();
            $zapytanie = "SELECT Pass FROM users WHERE ID_User=".$_SESSION['id_user'].";";
            $res = $p->query($zapytanie);
            $row = $res->fetch_assoc();
            if($row){
                if($haslo == $row['Pass']){
                    $_SESSION['admin'] = "true";
                    header("Location: ../../admin.php");
                }else{
                    header("Location: ../../admin.php?log=err");
                }
            }
        }
    }?>
</div>