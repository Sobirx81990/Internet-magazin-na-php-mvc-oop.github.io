<?php if($result){
	header("Location: /user/request");exit;}
?>                
<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
            
                <?php if(isset($errors) && is_array($errors)): ?>
                <ul class="list-group">
                 
                    <li class="list-group-item"><?php echo array_shift($errors); ?></li>
                   
                </ul>
                <?php endif;?>
              
                    <div class="signup-form"><!--sign up form-->
                        <h2 style="text-align:center;">Регистрация на сайте</h2>
                        <form action="" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo @$_POST['name']; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo @$_POST['email']; ?>"/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo @$_POST['password']; ?>"/>
                             <input type="password" name="password_2" placeholder="Введите еще раз пароль" value=""/>
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                        </form>
                    </div><!--/sign up form-->
                
                
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>