<form class="flex-container" action="reservation.php" accept-charset="UTF-8" method="GET">
    <div class="flex-item">
		<label for="dateArrivee"><strong>Date d'arrivée</strong></label>
		<input type="date" name="dateArrivee" id="dateArrivee" class="form-control">
	   </div>
	   <div class="flex-item">
		<label for="dateDepart"><strong>Date de départ</strong></label>
		<input type="date" name="dateDepart" id="dateDepart" class="form-control">
	   </div>
	   <div class="flex-item">
		<label for="personne"><strong>Personnes</strong></label>
			<select class="form-control" id="personne" name="personne">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
			</select>
	  </div>
	  <div class="flex-item">
		<button type="submit" class="form-control"><strong>Rechercher</strong></button>
      </div>
</form>