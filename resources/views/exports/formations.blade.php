<!DOCTYPE html>
<html>
<head>
    <title>Liste des Formations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Liste des Formations</h1>
        <p>Généré le {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Durée</th>
                <th>Prix</th>
                <th>Niveau</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formations as $formation)
                <tr>
                    <td>{{ $formation->titre }}</td>
                    <td>{{ $formation->duree }}h</td>
                    <td>{{ number_format($formation->prix, 0, ',', ' ') }} FCFA</td>
                    <td>{{ ucfirst($formation->niveau) }}</td>
                    <td>{{ Str::limit($formation->description, 100) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>