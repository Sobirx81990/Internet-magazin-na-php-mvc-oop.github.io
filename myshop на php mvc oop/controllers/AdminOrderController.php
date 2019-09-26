<?php

 
class AdminOrderController extends AdminBase{
     
    public function actionIndex()
    {        
        self::checkAdmin();
         $db = Db::getConnection();
        $ordersList = Order::getOrdersList();
        require_once(ROOT. '/views/admin_order/index.php');
    }
    
    public function actionDelete($id) //Удаление товара с указанным id
    {
         self::checkAdmin(); //Проверка доступа
         
         if(isset($_POST['submit']) && $_POST['submit'] == 'Да')
         {
             Order::deleteOrderById($id);
             header("Location: /admin/order/");
         }
         elseif(isset($_POST['submit']) && $_POST['submit'] == 'Нет')
         {
             header("Location: /admin/order");
         }
          
         
          require_once(ROOT. '/views/admin_order/delete.php');
         
    }
     
     
    
     public function actionUpdate($id)
    {
        self::checkAdmin(); //Проверка доступа
          
        $order = Order::getOrderById($id);
        
        if(isset($_POST['submit']))
        {
            //Получаем данные из форм
         $options['user_name'] = $_POST['userName'];
            $options['user_phone'] = $_POST['userPhone'];         
            $options['user_comment'] = $_POST['userComment'];
             $options['date'] = $_POST['date'];
             $options['status'] = $_POST['status'];
              
           
           
           //Сохраняем изменения
           if(Order::updateOrderById($id,$options))
           {
                
                  
           }
           
           
       header("Location: /admin/order/");
        
        
    }
    require_once(ROOT . '/views/admin_order/update.php'); 
    }
    
    public function actionView($id)
    {
       
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
         $productsIds = array_keys($productsQuantity);
       $products = Product::getProductsByIds($productsIds);
        
        require_once(ROOT . '/views/admin_order/view.php');
        true;
    }  
  
}
