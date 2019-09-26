<?php

class Product
{
	const SHOW_BY_DEFAULT = 6;
	
	
	public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) // Последние товары
	{
		$count = intval($count);
		$db = Db::getConnection();
		$productList = array();
		$result = $db->query('SELECT id,name,price,image,is_new FROM product '
		. 'WHERE status = "1"' // выбирать товары где статус один
		. 'ORDER BY id DESC ' // DESC - по убывванию
		. 'LIMIT ' . $count);
		
		$i = 0;
		
		while($row = $result->fetch())
		{
			$productList[$i]['id'] = $row['id'];
			$productList[$i]['name'] = $row['name'];
			$productList[$i]['price'] = $row['price'];
			$productList[$i]['image'] = $row['image'];
			$productList[$i]['is_new'] = $row['is_new'];
			$i++;
			
		}
		return $productList; 
	}
     public static function getProductsList()  
	{
		$db = Db::getConnection();
		$productsList = array();
		$result = $db->query("SELECT id,name,price,code FROM product ORDER BY id ASC "); //  ASC - Порядок сортировки по умолчанию 
		
		$i = 0;
		
		while($row = $result->fetch())
		{
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['code'] = $row['code'];
			$productsList[$i]['price'] = $row['price'];
			 
			$i++;
			
		}
		return $productsList; 
         
	}
    public static function getProductsListByCategory($categoryId = false, $page = 1)  
	{
		if($categoryId)
        {   
           
         $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
         
		$db = Db::getConnection();
		$products = array();
		$result = $db->query("SELECT id,name,price,image,is_new FROM product "
		. "WHERE status = '1' AND category_id = '$categoryId' "  
		. "ORDER BY id ASC " // DESC - по убывванию
		. "LIMIT ".self::SHOW_BY_DEFAULT
        . ' OFFSET '. $offset);
		
		$i = 0;
		
		while($row = $result->fetch())
		{
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$products[$i]['image'] = $row['image'];
			$products[$i]['is_new'] = $row['is_new'];
			$i++;
			
		}
		return $products; 
        } 
	}
    
    public static function getProductById($id)
    {   
        $id = intval($id);
        if($id)
        {
         
		$db = Db::getConnection();
		 
		$result = $db->query('SELECT * FROM product WHERE id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
                               
		return $result->fetch();
        } 
    }
    
    
                
     public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1" AND category_id ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    
    
   
    public static function getProductsByIds($idsArray) //возвращает инфо-ю о товарах по заданным идент-м
    {
        $products = array();
        
        $db = Db::getConnection();
        
        $idsString = implode(',',$idsArray);
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
         
        $i = 0;
        while($row = $result->fetch())
        {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products; 
    }
    
    public static function deleteProductById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM product WHERE id=:id';
        
        $result=$db->prepare($sql);
        $result->bindParam(':id',$id, PDO::PARAM_INT);
        
        return $result->execute();
    }
 
    public static function createProduct($options)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO product (name,code,price,category_id,brand,availabillity,description,is_new,is_recommended,status) VALUES (:name,:code,:price,:category_id,:brand,:availabillity,:description,:is_new,:is_recommended,:status) ";
        
        $result=$db->prepare($sql);
       
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);// bindParam - связывает псевдопеременную с настоящей переменной и при изменении настоящей переменной, не нужно больше вызывать дополнительных ф-й, можно сразу вызвать execute()
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availabillity', $options['availabillity'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
         if($result->execute()){
             // Если запрос выполнен успешно, возвращаем id добавленной записи
             return $db->lastInsertId(); //PDO::lastInsertId — Возвращает ID последней вставленной строки или значение последовательности
         }
        
    }
    
    
    public static function updateProductById($id,$options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE product SET name=:name,code=:code,price=:price,category_id=:category_id,brand=:brand,availabillity=:availabillity,description=:description,is_new=:is_new,is_recommended=:is_recommended,status=:status WHERE id=:id ";
        
        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);// bindParam - связывает псевдопеременную с настоящей переменной и при изменении настоящей переменной, не нужно больше вызывать дополнительных ф-й, можно сразу вызвать execute()
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availabillity', $options['availabillity'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
       return $result->execute();
            
        
    }
    
     public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/images/home/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
}

?>