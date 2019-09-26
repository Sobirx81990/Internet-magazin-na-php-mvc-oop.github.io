<?php

/**
 * @author sobir
 * @copyright 2019
 */

class CabinetController
{
    function actionIndex()
    {
       
       
        $userId = User::checkLogged();
        $user = User::getUserById($userId); //Получаем массив с информацией о текущем пользователе
        
        require_once(ROOT. '/views/cabinet/index.php');
    }
    
    function actionEdit()
    { 
        
        //Получаем идент-ор пользователя из сессии
        $userId = User::checkLogged();
        
        //Получаем id пользователе ил БД
         $user = User::getUserById($userId);
         
         
        if(isset($_POST['submit']))
        {
           
          $name = $_POST['name'];
          $password = $_POST['password'];  
          
          $errors = false;
          //  Процедура валидации данных
               
          if(!User::checkName($name)) 
          {
            $errors[] = 'Имя должно содержать не меньше 2-х символов';
          }
          
           
          if(!User::checkPassword($password)) 
          {
           $errors[] = 'Пароль должен содержать не меньше 6-ти символов';
          }
          
          if($errors == false)
          {
            $result =  User::userEdit($userId,$name,$password);
          } 
        } 
           
        
       
        require_once(ROOT. '/views/cabinet/edit.php');
    }
}

?>