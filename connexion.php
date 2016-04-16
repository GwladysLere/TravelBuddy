<?php
$title = "Mon Compte";
include "entete.php";
?>

<form action="verifier_connexion.php" method="post" class="form-horizontal" >
<fieldset>

<!-- Form Name -->
<legend>Connexion</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="pseudo">Identifiant</label>
  <div class="controls">
    <input id="pseudo" name="pseudo" placeholder="" class="input-xlarge" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Mot de Passe</label>
  <div class="controls">
    <input id="password" name="password" placeholder="" class="input-xlarge" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="inscription"></label>
  <div class="controls">
    <button id="inscription" name="inscription" class="btn btn-primary">Connexion</button>
  </div>
</div>

</fieldset>
</form>

<p>Vous n'avez pas encore de compte ?</p>
<a href="inscription.php"><button type="button" class="btn btn-success">S'inscrire</button></a>

<?php
include "pied.php";
?>