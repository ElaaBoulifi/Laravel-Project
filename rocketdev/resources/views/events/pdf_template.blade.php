<!DOCTYPE html>
<html>
<head>
    <title>Mon PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Mon Document PDF</h1>
    <p>Ceci est un exemple de contenu pour le PDF.</p>
    <p>Donnée dynamique : {{ $events }}</p>

    <!-- Table with stripped rows -->
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Lieu</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->titre }}</td>
                    <td>{{ $event->lieu }}</td>
                    <td>{{ $event->desc }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</body>
</html>
