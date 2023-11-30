
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="./css/registration.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Перевірка полів форми
    $errors = array();

    if (empty($_POST["login"]) || !preg_match("/^[\p{L}\p{N}_-]{4,}$/u", $_POST["login"])) {
        $errors[] = "Логін повинен містити не менше 4 літер і може містити лише літери, цифри, нижнє підкреслення та дефіс.";
    }

    if (empty($_POST["password"]) || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{7,}$/", $_POST["password"])) {
        $errors[] = "Пароль повинен містити не менше 7 літер і включати принаймні одну велику та малу літеру та цифру.";
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $errors[] = "Повторний пароль не співпадає з введеним паролем.";
    }

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть коректну електронну пошту.";
    }

    if (!empty($_POST["phone"])) {
      if (strlen($_POST["phone"]) > 30) {
          $errors[] = "Телефонний номер не повинен перевищувати 30 символів.";
      } elseif (!preg_match("/^[\d()+\s-]+$/", $_POST["phone"])) {
          $errors[] = "Неправильний формат телефону.";
      }
  }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Реєстрація пройшла успішно!</h2>";
        echo "<p>Дякуємо за реєстрацію.</p>";
        echo "<a href='index.php'>На головну</a>";
    }
}
?>

<form method="post" action="index.php?action=registration">
  <div>
    <label for="login">Логін:</label>
    <input type="text" id="login" name="login" required>
  </div>
  <div>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
  </div>
  <div>
    <label for="confirm_password">Повторіть пароль:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
  </div>
  <div>
    <label for="email">Електронна пошта:</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div>
    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" maxlength="30">
  </div>
  <div>
    <input type="submit" value="Зареєструватися">
  </div>
</form>

</body>
</html>
