<?php
if (isset($_POST['username'])) $_POST['username'] = sanitize($_POST['username']);
if (isset($_POST['email'])) $_POST['email'] = sanitize($_POST['email']);
if (isset($_POST['text'])) $_POST['text'] = sanitize($_POST['text']);

?>
    <form method="post" class="needs-validation">
        <div class="form-group">
            <label for="username">Имя пользователя</label>
            <input type="text"
                   class="form-control <?php echo (!empty($_POST['username']) && isset($_POST['username'])) ? 'is-valid' : ''; ?> <?php echo (empty($_POST['username']) && isset($_POST['username'])) ? 'is-invalid' : ''; ?>"
                   name="username"
                   id="username"
                   aria-describedby="usernameHelp"
                   placeholder="Ваше имя"
                   value="<?php echo (!empty($_POST['username'])) ? $_POST['username'] : $user; ?>"
            >
            <small id="usernameHelp" class="form-text text-muted">Введите ваше имя</small>
        </div>
        <div class="form-group">
            <label for="email">Ваш E-mail</label>
            <input type="email"
                   class="form-control <?php echo (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false && isset($_POST['email'])) ? 'is-valid' : ''; ?> <?php echo (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false && isset($_POST['email'])) ? 'is-invalid' : ''; ?>"
                   id="email"
                   name="email"
                   placeholder="Введите E-mail"
                   aria-describedby="emailHelp"
                   value="<?php echo (!empty($_POST['email'])) ? $_POST['email'] : $email; ?>"
            >
            <small id="emailHelp" class="form-text text-muted">Введите ваш E-mail</small>
        </div>
        <div class="form-group">
            <label for="text">Текст задачи</label>
            <textarea
                    class="form-control <?php echo (!empty($_POST['text']) && isset($_POST['text'])) ? 'is-valid' : ''; ?> <?php echo (empty($_POST['text']) && isset($_POST['text'])) ? 'is-invalid' : ''; ?>"
                    id="text"
                    name="text"
                    placeholder="Введите текст задачи"
            ><?php echo (!empty($_POST['text'])) ?  $_POST['text'] : $text; ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary float-left">Изменить задачу</button>

            <input  style="width: 40px;"
                    type="checkbox"
                    class="form-control float-right"
                    name="completed"
                    value="yes"
                    <?php echo (!empty($_POST['completed'])) ? 'checked' : ''; ?>

            >
            <span class="float-right">Задание выполнено?</span>
        </div>

    </form>
<div class="clearfix"></div>
<?php

if (!empty($status_text)) {
    if ($status == true) {
        ?>
        <div class="valid-feedback" style="display: block;">
            <?php echo $status_text; ?>
        </div>
        <?php
    }
    if ($status == false) {
        ?>
        <div class="invalid-feedback" style="display: block;">
            <?php echo $status_text; ?>
        </div>
        <?php
    }
}

?>