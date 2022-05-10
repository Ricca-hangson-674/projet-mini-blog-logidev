<?php $this->titre = "Mon Blog - Connexion" ?>

<form action="authentification/connecter" method="post">
    <h1 class="h3 mb-3 fw-normal">Connexion</h1>
    <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" required placeholder="name@example.com">
        <label for="email">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="mot_passe" id="mot_passe" required placeholder="mot de passe">
        <label for="mot_passe">Mot de passe</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
    <a href="authentification/inscription" class="w-100 btn btn-lg btn-secondary mt-1">Inscription</a>
</form>