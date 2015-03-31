<!--<div id="creation_personnage_form">
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

</div>-->

 <hr />

    <div class="row">
      <div class="large-12 columns">
      	<div class="panel">
	        <h3>Céer ton personnage ! </h3>
	       	    <form method=POST action="index.php?action=create_pers">
				  <div class="row">
				    <div class="large-12 columns">
				      <label>Nom</label>
				      <input type="text" name="nom" placeholder="nom" />
				    </div>
				  </div>
				  <div class="row">
				    <div class="large-12 columns">
				      <label>Description</label>
				      <textarea name="description" placeholder="description"></textarea>
				    </div>
				  </div>

				 <div class="row">
				 	<div class="large-12 columns">
				    	<label>Dépensez vos points de résistance (3)</label>
					</div>
				</div>

				  <div class="row">
					<div class="large-4 medium-4 columns">
					      <select name="resist1">
							<OPTION VALUE="air">Air</OPTION>
							<OPTION VALUE="feu">Feu</OPTION>
							<OPTION VALUE="terre">Terre</OPTION>
							<OPTION VALUE="eau">Eau</OPTION>
							<OPTION VALUE="foudre">Foudre</OPTION>
					      </select>
				    </div>
				    <div class="large-4 medium-4 columns">
				    	<label> </label>
					      <select name="resist2">
							<OPTION VALUE="air">Air</OPTION>
							<OPTION VALUE="feu">Feu</OPTION>
							<OPTION VALUE="terre">Terre</OPTION>
							<OPTION VALUE="eau">Eau</OPTION>
							<OPTION VALUE="foudre">Foudre</OPTION>
					      </select>
				    </div>
				    <div class="large-4 medium-4 columns">
					      <select name="resist3">
							<OPTION VALUE="air">Air</OPTION>
							<OPTION VALUE="feu">Feu</OPTION>
							<OPTION VALUE="terre">Terre</OPTION>
							<OPTION VALUE="eau">Eau</OPTION>
							<OPTION VALUE="foudre">Foudre</OPTION>
					      </select>
				    </div>
				  </div>
				 <input type="submit" class="nice blue radius button" value="Créer le personnage">
				
				</form>
 
      	</div>
      </div>
    </div>