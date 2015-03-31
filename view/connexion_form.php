
<script>
    function submitForm(action)
    {
        document.getElementById('login-form').action = action;
        document.getElementById('login-form').submit();
    }
</script>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form id="login-form" name="login-form" class="login-form" method=POST>

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Connectez-vous</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Rejoins la ligue des justiciers ou des grands méchants et règne sur le monde!</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
   
	<!--USERNAME--><input name="login" type="text" class="input username" value="Pseudo" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="pass" type="password" class="input password" value="Mot de Passe" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input  type="submit" onclick="submitForm('index.php?action=connect')" value="Connexion" name="submit" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><input type="submit" onclick="submitForm('index.php?action=register')" name="submit" value="Inscription" class="register" /><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->


