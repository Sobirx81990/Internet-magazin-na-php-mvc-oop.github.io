<?php
 
class AdminCategoryController extends AdminBase{
    
    
    public function actionIndex()
    {
        self::checkAdmin(); //Проверка доступа
        $db = Db::getConnection();
        $categoriesList = Category::getCategoriesListAdmin();
        require_once(ROOT. '/views/admin_category/index.php');
    }
    
    public function actionDelete($id) //Удаление товара с указанным id
    {
         self::checkAdmin(); //Проверка доступа
         if(isset($_POST['submit']) && $_POST['submit'] == 'Да')
         {
             Category::deleteCategoryById($id);
             header("Location: /admin/category/");
         }
         elseif(isset($_POST['submit']) && $_POST['submit'] == 'Нет')
         {
             header("Location: /admin/category/");
         }
          
         
         require_once(ROOT. '/views/admin_category/delete.php');  
         
    }
    
    public function actionCreate()
    {
        self::checkAdmin(); //Проверка доступа
        $categoriesList = Category::getCategoriesListAdmin();
        
        if(isset($_POST['submit']))
        {
            //Получаем данные из форм
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];
            
            $errors = false;
           if(!isset($options['name']) || empty($options['name']))
           {
               $errors[] = 'Заполните поле';
           }
           
           if($errors == false)
           {
               $id = Category::createCategory($options);
               if($id)
               {
                   echo "успешно";
               }
           }
           
             
        }
         
        require_once(ROOT . '/views/admin_category/create.php');
    }
    
     public function actionUpdate($id)
    {
        self::checkAdmin(); //Проверка доступа
        $categoriesList = Category::getCategoriesListAdmin();
        $category = Category::getCategoryById($id);
        
        if(isset($_POST['submit']))
        {
            //Получаем данные из форм
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];         
            $options['status'] = $_POST['status'];
            
           
           //Сохраняем изменения
           if(Category::updateCategoryById($id,$options))
           {
                
                  
           }
           
           
       header("Location: /admin/category/");
        }
        require_once(ROOT . '/views/admin_category/update.php'); 
    }
}
