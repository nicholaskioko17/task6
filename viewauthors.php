<?php
require_once "../configs/Dbconn.php";

$stmt = $DBconn->prepare("SELECT * FROM authorstb ORDER BY author_fullname ASC");
$stmt->execute();
$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authors</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Registered Authors</h2>
    <table>
        <thead>
            <tr>
                <th>Author ID</th>
                <th>Email</th>
                <th>Address</th>
                <th>Full Names</th>
                <th>Biography</th>
                <th>Date of Birth</th>
                <th>Suspension</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author): ?>
                <tr>
                    <td><a href="DelAuth.php?author_id=<?= $author['author_id']; ?>">Delete</a></td>
                    <td><a href="edit.php?author_id=<?= $author['author_id']; ?>">Edit</a></td>
                    <td><?= $author['email']; ?></td>
                    <td><?= $author['address']; ?></td>
                    <td><?= $author['full_name']; ?></td>
                    <td><?= $author['biography']; ?></td>
                    <td><?= $author['date_of_birth']; ?></td>
                    <td><?= $author['suspension']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>