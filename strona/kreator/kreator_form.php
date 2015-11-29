<div class="col-md-6 col-md-offset-3 jumbotron">
    <form name='wologowanie' class='form text-center' method='post'>
        <input type='submit' class='btn btn-default' name='wyloguj' value='Wyloguj'>
    </form>
    <?php
    if(isset($_POST['wyloguj']))
    {
        session_destroy();
        header("Location: ../index.php");
    }
    ?>
    <div class='text-center lead'>Kreator Postaci</div>
    <div class='text-center'>Proszę w pierwszej kolejności stworzyć postać.</div>
    <form name='rejestracja' class='form-group' method='post' enctype='multipart/form-data' action="strona/kreator/kreator_funkcja.php">
        <label for='inputNick'>Nazwa:</label>
        <input type='text' class='form-control' id='inputNick' name='nick' placeholder="Nazwa" required>
        <label for='zdjeciep'>Avatar (gif,jpg,png):</label>
        <input type="file" class='form-control' id="zdjeciep" name="zdjeciep" >
        <br><input type='submit' name='postac' class="btn btn-default"  value='Utwórz'>
    </form>
</div>