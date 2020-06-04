<?php

/**
 * @var $data
 * @var $tasks
 * @var $total_pages
 * @var $page
 */

extract($data);
if (is_array($tasks)) {
    ?>
    <div class="col-md-12 blog-main">

        <?php
        foreach ($tasks as $task) {
            extract($task);
            include 'App/Views/task-item.php';
        }
        ?>

        <?php

        if($total_pages != 1){
            $sorting = '';
            if(!empty($_GET['sorting'])){
                $sorting = '&sorting='.$_GET['sorting'];
            }

            ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page=1<?php echo $sorting;?>">В начало</a>
                </li>
                <li class="page-item <?php if ($page <= 1) {
                    echo 'disabled';
                } ?>">
                    <a class="page-link" href="<?php if ($page <= 1) {
                        echo '#';
                    } else {
                        echo "?page=" . ($page - 1) . $sorting;
                    } ?>">Назад</a>
                </li>
                <li class="page-item <?php if ($page >= $total_pages) {
                    echo 'disabled';
                } ?>">
                    <a class="page-link" href="<?php if ($page >= $total_pages) {
                        echo '#';
                    } else {
                        echo "?page=" . ($page + 1) . $sorting;
                    } ?>">Вперед</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $total_pages . $sorting; ?>">В конец</a>
                </li>
            </ul>
            <?php
        }

        ?>
    </div>
    <?php
} else {
    echo $tasks;
}