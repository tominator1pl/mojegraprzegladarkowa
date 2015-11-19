<center>
<?php if(isset($_SESSION['perm'])){
    if($_SESSION['perm'] >= 1) {
        ?>
        <button type="submit" class="btn btn-warning" name="edycjauzy"><i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;Edytuj</button>
        <?php
    }
    if($_SESSION['perm'] >= 3) {
        ?>
        <button type="submit" class="btn btn-info" name="dodajuzy"><i class="fa fa-plus fa-lg"></i>&nbsp;Dodaj</button>
        <button type="submit" class="btn btn-danger" name="usunuzy"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Usuń</button>
        <?php
    }
    }?>
</center>
</form>
