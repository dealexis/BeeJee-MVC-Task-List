<?php

/**
 * @var $id
 * @var $email
 * @var $user
 * @var $text
 * @var $status
 * */

?>

<div class="blog-post">
    <h2 class="blog-post-title">Задача <?php echo $id;?></h2>
    <p class="blog-post-meta">От <?php echo $user;?></p>
    <p class="blog-post-meta">Email: <?php echo $email;?></p>
    <p class="float-left"><?php echo $text;?></p>

    <div class="float-right">
        <?php
        if($status !== 'new'){
            ?>
            <p class="blog-post-meta">Отредактировано администратором.</p>
            <?php
        }
        if($status === 'completed'){
            ?>
            <p class="blog-post-meta">Выполнено.</p>
            <?php
        }
        ?>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="clearfix"></div>

    <?php

    if($_SESSION['logged_in'] == true){
        echo '<p class="float-right"><a href="/edit-task?task='.$id.'">Изменить задачу</a></p>';
    }

    ?>

</div>
<div class="clearfix"></div>