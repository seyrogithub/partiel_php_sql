<form action="nouvelle_matiere.php" method="post">
        <label>Titre</label>
        <input type="text" name="titre" />
        <br>
        <label>Description</label>
        <textarea name="message" rows="8" cols="45" >
            Votre description ici:
        </textarea>
        <br>
        <label>Durée (en min)</label>
        <input type="text" name="duree" />
        <br>
        <label>Date</label>
        <input type="text" name="date" />
        <br>
        <label>Genre :</label>
        <select name="choix">
            <option value="Science Fiction">Science Fiction</option>
            <option value="Western">Western</option>
            <option value="Drame">Drame</option>
            <option value="Animation">Animation</option>
        </select>
        <br>
        <label>Réalisateur :</label>
        <select name="choix">
            <option value="Christophe Nolan">Christophe Nolan</option>
            <option value="Quentin Tarantino">Quentin Tarantino</option>
            <option value="Adrian Molina">Adrian Molina</option>
            <option value="Todd Phillips">Todd Phillips</option>
        </select>
        <br>
        <label>Valider</label>
        <input type="submit" value="Valider" />
        </form>