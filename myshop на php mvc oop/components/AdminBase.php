<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminBase
 *
 * @author asus
 */
abstract class AdminBase {
    
    
     public static function checkAdmin()
     {
         // Проверяем авторизован ли пользователь. Если нет, он будет переадресован
         
         $userId = User::checkLogged();
         
        //Получаем информацию о текущем пользователе
         $user = User::getUserById($userId);
         
         //Если роль текущего пользователя "admin" , пускаем его в админпанель
         
         if($user['role'] == 'admin')
         {
             return true;
         }
         // иначе завершаем работу с сообщением об закрытом достпе
         die('Access denied');
     }
}
