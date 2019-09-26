<?php
 


class CatalogController
{
	public function actionIndex()
    {
    $categories = array();
	$categories = Category::getCategoriesList();
	$latestProducts = array();
	$latestProducts = Product::getLatestProducts(12);
	require_once(ROOT. '/views/catalog/index.php');
    }
	
    
    public function actionCategory($categoryId, $page = 1)
    {   $page = str_replace('page-','',$page);     /// не будет этого станет ошибка fatal fetch bollean   6 часов искал  
         
                                  
        $categories = array();
    	$categories = Category::getCategoriesList();
    	$categoryProducts = array();
    	$categoryProducts = Product::getProductsListByCategory($categoryId,$page); //!!!! На вход в $page не должен идти page- иначе ошибка только целое число
    
        
        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

       	require_once(ROOT. '/views/catalog/category.php');
                
        
    }
    
    
    
}


?> 