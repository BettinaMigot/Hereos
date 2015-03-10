<div id="cration_personnage_form">
	<h2>Crée ton personnage !</h2>
	<form method=POST action="index.php?action=create_pers">
		Nom : <input type="text" name="nom" value="">
		<br>
		Description : <textarea name="description" rows="3" cols="30"></textarea>
		<br>
		<br>
		Depensez vos points de résistance (3)
		<br>
		<SELECT name="resist1">
			<OPTION VALUE="air">Air</OPTION>
			<OPTION VALUE="feu">Feu</OPTION>
			<OPTION VALUE="terre">Terre</OPTION>
			<OPTION VALUE="eau">Eau</OPTION>
			<OPTION VALUE="foudre">Foudre</OPTION>
		</SELECT>
		<br>
		<SELECT name="resist2">
			<OPTION VALUE="air">Air</OPTION>
			<OPTION VALUE="feu">Feu</OPTION>
			<OPTION VALUE="terre">Terre</OPTION>
			<OPTION VALUE="eau">Eau</OPTION>
			<OPTION VALUE="foudre">Foudre</OPTION>
		</SELECT>
		<br>
		<SELECT name="resist3">
			<OPTION VALUE="air">Air</OPTION>
			<OPTION VALUE="feu">Feu</OPTION>
			<OPTION VALUE="terre">Terre</OPTION>
			<OPTION VALUE="eau">Eau</OPTION>
			<OPTION VALUE="foudre">Foudre</OPTION>
		</SELECT>
		<br>
		<br>
		<input type="submit" value="Créer le personnage">
	</form>

</div>