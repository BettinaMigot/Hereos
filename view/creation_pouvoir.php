<script type="text/javascript">
    function updateValue1(id, val) {
    	document.getElementById(id).innerHTML =val; 
    }
</script>


<hr/>

<div class="row">
	<div class="large-12 columns">
		<div class="panel">
			<div id="creation_pouvoir_form">
				<h2>Créer tes trois pouvoirs !</h2>
				<form method=POST action="index.php?action=create_pouvoir">
					
					<br>
					<h5>Placez 15 points par pouvoir.</h5>
					<br>
					<div class="pouvoir_range">
						Nom du pouvoir: <input type="text" name="nom1" value="pouvoir 1">
						Air : <span id="air1">0</span> <input type="range" value="0" name="air1" min="0" max="15" onchange="updateValue1('air1', this.value);">
						Feu : <span id="feu1">0</span> <input type="range" value="0" name="feu1" min="0" max="15" onchange="updateValue1('feu1', this.value);">
						Terre : <span id="terre1">0</span> <input type="range" value="0" name="terre1" min="0" max="15" onchange="updateValue1('terre1', this.value);">
						Eau : <span id="eau1">0</span> <input type="range" value="0" name="eau1" min="0" max="15" onchange="updateValue1('eau1', this.value);">
						Foudre : <span id="foudre1">0</span> <input type="range" value="0" name="foudre1" min="0" max="15" onchange="updateValue1('foudre1', this.value);">
					</div>
					<div class="pouvoir_range">
						Nom du pouvoir: <input type="text" name="nom2" value="pouvoir 2">
						Air : <span id="air2">0</span> <input type="range" value="0" name="air2" min="0" max="15" onchange="updateValue1('air2', this.value);">
						Feu : <span id="feu2">0</span> <input type="range" value="0" name="feu2" min="0" max="15" onchange="updateValue1('feu2', this.value);">
						Terre : <span id="terre2">0</span> <input type="range" value="0" name="terre2" min="0" max="15" onchange="updateValue1('terre2', this.value);">
						Eau : <span id="eau2">0</span> <input type="range" value="0" name="eau2" min="0" max="15" onchange="updateValue1('eau2', this.value);">
						Foudre : <span id="foudre2">0</span> <input type="range" value="0" name="foudre2" min="0" max="15" onchange="updateValue1('foudre2', this.value);">
					</div>
					<div class="pouvoir_range">
						Nom du pouvoir: <input type="text" name="nom3" value="pouvoir 3">
						Air : <span id="air3">0</span> <input type="range" value="0" name="air3" min="0" max="15" onchange="updateValue1('air3', this.value);">
						Feu : <span id="feu3">0</span> <input type="range" value="0" name="feu3" min="0" max="15" onchange="updateValue1('feu3', this.value);">
						Terre : <span id="terre3">0</span> <input type="range" value="0" name="terre3" min="0" max="15" onchange="updateValue1('terre3', this.value);">
						Eau : <span id="eau3">0</span> <input type="range" value="0" name="eau3" min="0" max="15" onchange="updateValue1('eau3', this.value);">
						Foudre : <span id="foudre3">0</span> <input type="range" value="0" name="foudre3" min="0" max="15" onchange="updateValue1('foudre3', this.value);">
					</div>

					<br>
					<br>
					<input type="submit" class="nice blue radius button" value="Créer les pouvoirs">
				</form>
			</div>
		</div>
	</div>

</div>