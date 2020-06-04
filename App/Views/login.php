<?php

if(is_array($data)){
    extract($data);
}

?>

<form method="post">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="name" aria-describedby="usernameHelp" placeholder="Ваше имя">
        <small id="usernameHelp" class="form-text text-muted">Введите ваше имя</small>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
    </div>

    <button type="submit" class="btn btn-primary">Войти</button>
</form>

<?php

echo $response;