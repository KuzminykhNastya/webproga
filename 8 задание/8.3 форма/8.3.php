<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
        <style>
        body {
            font-family: 'Courier New';
            background-size: cover;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: white ;
        }

        h2 {
            text-align: center;
            color: white ;
            font-size: 3em;
            
        }

        h3 {
            weight : 100%;
            text-align: center;
            color: white ;
            font-size: 1em;
            background-color: grey;
        }

        form {
            color: white;
            background-color:#4f4f4f;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 13px 13px 0px 0px  #FFFFFF;
            max-width: 400px;
            width: 100%;
        }

        label {
            color: white;
            display: block;
            margin-bottom: 8px;
            
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color:#5da3a3 ;
            color: white;
        }

        input[type="submit"]:hover {
            background-color:#9ead53;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['full_name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['date'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $date = $_POST['date'];
      
        
    } else {
        echo "<p>Пожалуйста, заполните все поля формы.</p>";
    }
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   <h2>Регистрация</h2> <br> 
    <label for="full_name"> ФИО:</label>
    <input type="text" name="full_name" required><br>
    <label for="username">Логин:</label>
    <input type="text" name="username" required><br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" required><br>
    <label for="date">Дата рождения:</label>
    <input type="date" name="date" required><br>

    <input type="submit" value="Зарегистрироваться">
</form>

</body>
</html>