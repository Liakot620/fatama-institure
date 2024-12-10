<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Table</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS file -->
    <style>
        /* Inline CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .market-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .market-table th,
        .market-table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .market-table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        .market-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .market-table tr:hover {
            background-color: #f1f1f1;
        }

        .market-table td {
            color: #555;
        }

        .actions {
            text-align: center;
        }

        .actions a {
            text-decoration: none;
            color: #4CAF50;
            margin: 0 5px;
        }

        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Market Information</h1>
    <table class="market-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Market_name</th>
                <th>Market_owner_name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($markets as $market)
                <td>{{$loop->iteration}}</td>
                <td>{{$market->market_name}}</td>
                <td>{{$market->market_owner_name}}</td>
                <td>{{$market->address}}</td>
                <td>Email: {{$market->email}}<br>Phone: {{$market->phone_number}}</td>
                <td class="actions">
                    <a href="#">View</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
                @endforeach
               
        </tbody>
    </table>
</body>
</html>
