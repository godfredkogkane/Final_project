<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 50px;
            background-image: url("../frontend_images/bgrd2.webp");

        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            margin-top: 20px;
            font-weight: bolder;
        }
        button {
            padding: 10px 20px;
            background-color: #23cb45;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #5c3de8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Logout</h2>
        <p>Are you sure you want to logout?</p>
        <form action="../actions/logout_action.php" method="POST">
            <button type="submit">Logout</button>
        </form>
</body>
</html>
