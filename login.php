<?php
include "./include/start.inc";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            background: linear-gradient(135deg, #6a00f4, #a100f2);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h4 {
            color: #333;
            font-size: 22px;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #6a00f4;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #5a00e4;
        }
        .alert-danger {
            color: #f00;
            background: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        p a {
            text-decoration: none;
            color: #6a00f4;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h4>Login</h4>

    <form action="gestioneUtenti/loginUser.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Accedi</button>
    </form>

    <p>Non hai un account? <a href="register.php">Registrati</a></p>
</div>

</body>
</html>

<?php include "./include/end.inc"; ?>