<?php

 
class AdminProductController extends AdminBase {
    
    public function actionIndex()
    {
         self::checkAdmin(); //Проверка доступа
         $productsList = Product::getProductsList();
          require_once(ROOT. '/views/admin_product/index.php');  
    }
   
    public function actionDelete($id) //Удаление товара с указанным id
    {
         self::checkAdmin(); //Проверка доступа
         if(isset($_POST['submit']) && $_POST['submit'] == 'Да')
         {
             Product::deleteProductById($id);
             header("Location: /admin/product/");
         }
         elseif(isset($_POST['submit']) && $_POST['submit'] == 'Нет')
         {
             header("Location: /admin/product/");
         }
          
         
         require_once(ROOT. '/views/admin_product/delete.php');  
         
    }
    
    public function actionCreate()
    {
        self::checkAdmin(); //Проверка доступа
        $categoriesList = Category::getCategoriesListAdmin();
        
        if(isset($_POST['submit']))
        {
            //Получаем данные из форм
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availabillity'] = $_POST['availabillity'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            
            $errors = false;
           if(!isset($options['name']) || empty($options['name']))
           {
               $errors[] = 'Заполните поле';
           }
           
           if($errors == false)
           {// Ошибок нет добавляем новый товар
               $id = Product::createProduct($options);
               if($id)
               {
                   if(is_uploaded_file($_FILES["image"]["tmp_name"]))// Проверим загружалось ли через форму изображение
                   {
                       move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/images/home/{$id}.jpg");
                   }
               
                   // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
             }
           }
           
             
        }
         
        require_once(ROOT . '/views/admin_product/create.php');
    }
    
    
    public function actionUpdate($id)
    {
        self::checkAdmin(); //Проверка доступа
        $categoriesList = Category::getCategoriesListAdmin();
        $product = Product::getProductById($id);
        
        if(isset($_POST['submit']))
        {
            //Получаем данные из форм
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availabillity'] = $_POST['availabillity'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            
           
           //Сохраняем изменения
          if(Product::updateProductById($id,$options))
          {
           if(is_uploaded_file($_FILES["image"]["tmp_name"]))
           {
               move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/images/home/{$id}.jpg");
            }
           
           
           header("Location: /admin/product/");
           }
            
        }
        require_once(ROOT . '/views/admin_product/update.php'); 
    }
}
