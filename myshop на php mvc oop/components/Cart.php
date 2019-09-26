<?php

/**
 * @author sobir
 * @copyright 2019
 */
class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        $productsInCart = array();
        
        if(isset($_SESSION['products']))
        {
            $productsInCart = $_SESSION['products'];
        }
        
        
        
        if(array_key_exists($id, $productsInCart)) //Проверяет, присутствует ли в массиве указанный ключ или индекс
        {
            $productsInCart[$id] ++;
        }
        else
        {
            $productsInCart[$id] = 1;
        }
        
        $_SESSION['products'] = $productsInCart;
        
        return self::countItems();
        
    }
    
    public static function deleteProduct($id)
    {
       /* $id = intval($id);
        $productsInCart = array();
        
        if(isset($_SESSION['products']))
        {
            $productsInCart = $_SESSION['products'];
        }
        if(array_key_exists($id, $productsInCart)) //Проверяет, присутствует ли в массиве указанный ключ или индекс
        {
           unset($productsInCart[$id]);
        }
        $_SESSION['products'] = $productsInCart; */
       // получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();
        
        //Удаляем из массива элемент с указанием id
         unset($productsInCart[$id]);
         //Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
        
    }

    
    
        public static function countItems()
    {
            if(isset($_SESSION['products']))
            {
                $count = 0;
                foreach($_SESSION['products'] as $id=>$quantity)
                {
                    $count = $count+$quantity;
                }
                return $count;
            }
            else 
            { 
                return 0;
            }
    } 
        
       public static function getProducts()
       {
                if(isset($_SESSION['products']))
                {
                    return $_SESSION['products'];
                }
                return false;
       }
        
       public static function getTotalPrice($products)
       {
         $productsIncart = self::getProducts();
         
          $total = 0;
         if(($productsIncart))
         {
            foreach($products as $item)
            {     
              $total = $total + $item['price'] * $productsIncart[$item['id']]; //$productsIncart[$item['id']] - количество выбранного товара пользователем 
            }
         }
         return $total;
       }
       
       public static function  clear()
       {
         if(isset($_SESSION['products']))
         {
             unset($_SESSION['products']);
         }
       }
   
     

    
}


?>