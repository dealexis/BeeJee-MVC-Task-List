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
                   value="<?php echo $_POST['username']; ?>"
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
                   value="<?php echo $_POST['email']; ?>"
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
            ><?php echo $_POST['text']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить задачу</button>
    </form>
<?php

if (!empty($text)) {
    if ($status == true) {
        ?>
        <div class="valid-feedback" style="display: block;">
            <?php echo $text; ?>
        </div>
        <?php
    }
    if ($status == false) {
        ?>
        <div class="invalid-feedback" style="display: block;">
            <?php echo $text; ?>
        </div>
        <?php
    }
}

?>