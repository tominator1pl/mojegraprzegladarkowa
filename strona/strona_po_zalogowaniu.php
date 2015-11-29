<div class="col-md-2 col-sm-2 col-xs-12">
	<div class="row">
		<div class="jumbotron col-md-11 col-sm-11 sidebar">
			<div class="lead">Menu</div>
			<a href="postac.php" target="iframe-zawartosc"><div class="wybor">
					Postać
				</div></a>
			<a href="ekwipunek.php" target="iframe-zawartosc"><div class="wybor">
					Ekwipunek
				</div></a>
			<a href="sklep.php" target="iframe-zawartosc"><div class="wybor">
					Sklep
				</div></a>
			<a href="bank.php" target="iframe-zawartosc"><div class="wybor">
					Bank
				</div></a>
			<a href="przygoda.php" target="iframe-zawartosc"><div class="wybor">
					Przygoda
				</div></a>
			<a href="walka.php" target="iframe-zawartosc"><div class="wybor">
					Arena
				</div></a>
			<?php
			if($_SESSION['permission'] == 0){
				echo '<a href="admin/"><div class="wybor">Panel Admina</div></a>';
			}
			?>
		</div>
	</div>
</div>
<div class="jumbotron col-md-10 col-sm-10 col-xs-12 nie-sidebar">
<iframe name="iframe-zawartosc" src="postac.php" class="iframe-zawartosc"></iframe>
</div>