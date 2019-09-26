<?php header("Content-Type: text/html; charset=utf-8"); ?>
<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h1>Кабинет пользователя</h1>
            
            <h3>Привет, <?php if(isset($user['name']))echo $user['name']; ?>!</h3>
            <ul>
                <li><a href="/cabinet/edit/">Редактировать данные</a></li>
                <li><a href= "/cart/">Список покупок</a></li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>