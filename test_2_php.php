<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Pamphlet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #d4e6f1;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            color: #2c3e50;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Juice ID</th>
            <th>Juice Name</th>
            <th>Price</th>
            <th>Protein Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1001</td>
            <td><a href="selected_juice.php?id=1001">Mango</a></td>
            <td>130</td>
            <td>0.3g</td>
        </tr>
        <!-- Add more rows for other juices -->
    </tbody>
</table>

</body>
</html>
