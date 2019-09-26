 <?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                    <?php if(isset($result)): ?>
                     Данные успешно отредактированы 
                    <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Редактирование данных</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="" value="<?php if(isset($user['name']))echo $user['name']; ?>"/>
                        <input type="password" name="password" placeholder="" value="<?php if(isset($user['password']))echo $user['password']; ?>"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                    </form>
                    <?php endif; ?>
                </div><!--/sign up form-->


                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>