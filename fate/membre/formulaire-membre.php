
        <div class="mb-3 text-center text-white" style="max-width: 300px;">
            <h2>Connexion</h2>
        </div>
    <form action="membre/traitement-authentification-membre.php" method="post">
        <div>
            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="pseudonyme">Pseudonyme: </label>
                <input type="text" name="pseudonyme" id="pseudonyme"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="motdepasse">Mot de passe: </label>
                <input type="password" name="motdepasse" id="motdepasse"><br>
            </div>

            <input class="card mb-3 text-center p-2" type="submit" name="membre-authentification" value="Me connecter"><br>
        </div>
    </form>
