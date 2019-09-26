<?php

class Order
{

    /**
     * Сохранение заказа 
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $products = json_encode($products);

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
                . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function getOrdersList()
    {
       $db = Db::getConnection();
        $ordersList = array();
       $result = $db->query("SELECT id, user_name, user_phone,date,status FROM product_order ORDER BY id DESC "); //   
		
		$i = 0;
		
		while($row = $result->fetch())
		{
			$ordersList[$i]['id'] = $row['id'];
			$ordersList[$i]['user_name'] = $row['user_name'];
			$ordersList[$i]['user_phone'] = $row['user_phone'];
                        $ordersList[$i]['date'] = $row['date'];
                        $ordersList[$i]['status'] = $row['status'];
			 
			$i++;
			
		}
		return $ordersList; 
         
    }
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }
    
    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM product_order WHERE id=:id';
        
        $result=$db->prepare($sql);
        $result->bindParam(':id',$id, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
     public static function updateOrderById($id,$options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE product_order SET user_name=:user_name,user_phone=:user_phone, user_comment=:user_comment, date=:date,status=:status WHERE id=:id";
            
        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);// bindParam - связывает псевдопеременную с настоящей переменной и при изменении настоящей переменной, не нужно больше вызывать дополнительных ф-й, можно сразу вызвать execute()
        $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_STR);        
        $result->bindParam(':user_comment', $options['user_comment'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
       return $result->execute();
   
        
    }
    public static function getOrderById($id)
    {   
        $id = intval($id);
        if($id)
        {
         
		$db = Db::getConnection();
		 
		$result = $db->query('SELECT * FROM product_order WHERE id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
                               
		return $result->fetch();
        } 
    }

}
