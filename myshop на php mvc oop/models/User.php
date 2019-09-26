<?php

/**
 * @author sobir
 * @copyright 2019
 */

 class User{
    
    
    public static function checkName($name)
    {
                if(strlen($name)>= 2)
                {
                    return true;
                }
                else
                {
                    return false;
                }
                
        
    }
    
      public static function checkEmail($email)
    {
                if(filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    return true;
                }
                else
                {
                    return false;
                }
        
        
    } 
    
        public static function checkPassword($password)
    {
                if(strlen($password)>= 6)
                {
                    return true;
                }
                else
                {
                    return false;
                }
        
        
    }
    
      public static function checkPhone($userPhone)
    {
          if(strlen($userPhone)>= 12)
                {
                    return true;
                }
                else
                {
                    return false;
                }
    }
    public static function checkEmailExists($email)
    {
                $db = DB::getConnection();
                $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
                
                $result = $db->prepare($sql);
                $result->bindParam(':email',$email,PDO::PARAM_STR);
                $result->execute();
                if($result->fetchColumn())
                    return true;
                
                return false; 
    }
    
     public static function register($name,$email,$password)
     {
                 $db = DB::getConnection();
                 $sql = 'INSERT INTO user (name,email,password) '
                 . 'VALUES (:name,:email,:password)';
                 
                 $result = $db->prepare($sql);
                 $result->bindParam(':name', $name,PDO::PARAM_STR);
                 $result->bindParam(':email', $email,PDO::PARAM_STR);
                 $result->bindParam(':password', $password,PDO::PARAM_STR);
                 return $result->execute();
         
     }
     
     
  
    
  
    
     public static function checkUserData($email,$password) // Проверка данных пользователя
     {
               
                $db = Db::getConnection();
                 
                $sql = 'SELECT id,name,email,password FROM user ';
                $result = $db->query($sql);
              
                $i=0;
               
                 while($row = $result->fetch(PDO::FETCH_ASSOC))
                 {
                    $users[$i]['id'] = $row['id'];
                    $users[$i]['email'] = $row['email'];
		            $users[$i]['password'] = $row['password'];
                    $i++;
                }
                             
                foreach($users as $user)                
                {  
                  
                if($email == $user['email'] and password_verify($password, $user['password'])) //password_verify Проверяет, соответствует ли пароль хешу         
                    {
                         return $user['id'];
                    }
               
                }                                
               
      
     }
     
     
     
     public static function auth($userId)
     {
         
                $_SESSION['user'] = $userId; 
     }
    
    
    public static function checkLogged()
    {
        
                 
                // Если сессия есть, вернем идентификатор пользователя
                if(isset($_SESSION['user']))
                {
                    return $_SESSION['user'];
                }
                header("Location: /user/login");
    } 
    
    public static function isGuest()
    { 
                if(isset($_SESSION['user']))
                {
                    return false;
                }
                return true;
    }
    
    public static function getUserById($id) // Получаем имя пользователя по id
    {   
                $id = intval($id);
                if($id)
                {   
                     $db = Db::getConnection();
                     $sql = "SELECT * FROM user WHERE id = :id";
                     $result = $db->prepare($sql);
                     $result->bindParam(':id', $id, PDO::PARAM_INT);
                     //Указываем что хотим получить данные в виде массива
                     $result->setFetchMode(PDO::FETCH_ASSOC);
                     $result->execute();
                     
                     return $result->fetch(); //возвращает массив с информацией о текущем пользователе
                     
                }
    }
    
    
    public static function userEdit($id,$name,$password)
    { 
          
         $db = DB::getConnection();
                 $sql = 'UPDATE user SET name = :name,password = :password
                 WHERE id=:id';
                 
                 $result = $db->prepare($sql);
                 $result->bindParam(':id', $id,PDO::PARAM_INT);
                 $result->bindParam(':name', $name,PDO::PARAM_STR);
                 $result->bindParam(':password', $password,PDO::PARAM_STR);
                 return $result->execute();
    }
    
    
        
 }

?>