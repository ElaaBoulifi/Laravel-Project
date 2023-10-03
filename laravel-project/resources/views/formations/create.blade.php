
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une formation</title>
</head>
<body>
    <h1>Ajouter une formation</h1>
    <form method="POST" action="{{ route('formations.store') }}">
        @csrf
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <!-- Ajoutez d'autres champs ici -->
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
</body>
</html>
