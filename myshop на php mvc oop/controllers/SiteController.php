<?php 

 
 


class SiteController{
	
    public function actionIndex()
	{
	   $categories = array();
       $categories = Category::getCategoriesList();
       $latestProducts = array();
       $latestProducts = Product::getLatestProducts();// фактически в $latestProducts присваевается возвр-ый резул. массив  return $productList; итог $latestProducts = $productList;
       
	   require_once(ROOT . '/views/site/index.php');
	   true;
	}
    
    public function actionContact()
    {
       
 
 
      if(isset($_POST['submit']))
        {
           
          $userEmail = $_POST['userEmail'];
          $userText = $_POST['userText'];
          
          $errors = false;
          //  Процедура валидации данных
         
          
          if(!User::checkEmail($userEmail)) 
          {
            $errors[] = 'Неправильно введен email';
          }
         
          if($errors == false)
          {
            $mail = 'sagemx8@mail.ru';
            $subject = 'Тема письма';
            $message = "От: {$userEmail}, Текст: {$userText}";
            $result = mail($mail,$subject,$message);  // внимание для отправки mail с локал сервера нужно настроить иначе не будет отправояться 
          }
 
        }
        require_once(ROOT . '/views/site/contact.php');
    }

}

?>