<?php
/*
 * @link https://getbootstrap.com/docs/4.5/examples/starter-template/#
 * */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="https://beejee.ru/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo (!empty($title)) ? $title : 'BeeJee'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Список задач</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-task">Добавить задачу</a>
                </li>
                <?php
                if(!isset($_SESSION['logged_in'])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Войти в аккаунт</a>
                    </li>
                    <?php
                }

                if(isset($_SESSION['logged_in'])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login?logout=1">Выйти</a>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <div>
                <form method="get" action="" style="display: flex; align-items: flex-end;">
                    <div class="form-group">
                        <label for="sorting" style="color:#fff;">Выберите сортировку</label>
                        <select class="form-control" name="sorting" id="sorting">
                            <option value="name_up">Имя: по возрастанию</option>
                            <option value="name_down">Имя: по убыванию</option>
                            <option value="email_up">Email: по возрастанию</option>
                            <option value="email_down">Email: по убыванию</option>
                            <option value="status_up">Статус: по возрастанию</option>
                            <option value="status_down">Статус: по убыванию</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Сортировать</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<main role="main" class="container">
    <div class="default-template">
        <?php include 'App/Views/' . $content_view; ?>
    </div>
</main><!-- /.container -->
</body>
</html>