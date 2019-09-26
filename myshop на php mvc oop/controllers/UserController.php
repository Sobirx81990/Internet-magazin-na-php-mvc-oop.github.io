<?php

class UserController 
{
 
    
    public function actionRegister()
    {
            $name = '';
            $email = '';
            $password = '';
            $result = false;
        
        if(isset($_POST['submit']))
        {   
          $name = $_POST['name'];
          $email = trim($_POST['email']);
          $password = trim($_POST['password']);
          $password_2 = $_POST['password_2'];
          $errors = false;
          //  Процедура валидации данных
          if(!User::checkName($name)) 
          {
            $errors[] = 'Имя должно содержать не меньше 2-х символов';
          }
          
          if(!User::checkEmail($email)) 
          {
            $errors[] = 'Неправильно введен email';
          }
          
           if(User::checkEmailExists($email)) 
          {
            $errors[] = 'Такой email уже используется';
          }
          
          if(!User::checkPassword($password)) 
          {
           $errors[] = 'Пароль должен содержать не меньше 6-ти символов';
          }
          if($password != $password_2)
          {
            $errors[] = 'Повторный пароль введён не верно!';
          }
          
          if($errors == false)
          {
            $password = password_hash($password,PASSWORD_DEFAULT); //Создание хеш пароля
            $result =  User::register($name,$email,$password);
			 
          }
           
        }
        require_once ROOT. '/views/user/register.php';
        
      
    }
    
    public function actionRequest() 
	{
		require_once(ROOT. '/views/user/request.php');
	}
    
    
    
          public function  actionLogin()
        {
             
            $email = '';
            $password = '';
            
        
        if(isset($_POST['submit']))
        {
           
          $email = $_POST['email'];
          $password = $_POST['password'];  
          
          $errors = false;
          //  Процедура валидации данных
               
          if(!User::checkEmail($email)) 
          {
            $errors[] = 'Неправильно введен email';
          }
       
          if(!User::checkPassword($password)) 
          {
           $errors[] = 'Пароль должен содержать не меньше 6-ти символов';
          }
          
          //Проверяем существует ли пользователь
          
            $userId = User::checkUserData($email,$password);
        
        
          
          if(!$userId)
          {  // Если данные неправильные - показываем ошибку
           $errors[] = 'Неправильные данные для входа на сайт';
          }
          else{
            //Если данные правильные, запоминаем пользователя (сессии)
            User::auth($userId);
            // Перенаправляем пользователя в закрытую часть -кабинет
            header("Location: /cabinet/");
          }
            
        }
                require_once(ROOT. '/views/user/login.php');
       }
      
      
       
       public function actionLogout()
       {
          
         unset($_SESSION['user']);
        
         header("Location: /");
       }
}
 

?>