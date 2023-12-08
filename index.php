
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Page Title</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <?php include './layout/header.php'; ?>

  <?php

    $action = isset($_GET['action']) ? $_GET['action'] : 'main';

    switch ($action) {
      case 'about':
        include './views/about.php';
        break;
      case 'registration':
        include './views/registration.php';
        break;
      default:
        include './views/main.php';
        break;
    }

   ?>

  <?php include './layout/footer.php'; ?>
</body>
</html>
