<?php
return array(
    
  '' => 'site/index', // actionIndex в SiteController
  'catalog' => 'catalog/index', //actionIndex в CatalogController
   'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController 
  'user' => 'user/register', 
  'cabinet' => 'cabinet/index',
  'user/request'=>'user/request',
  'user/login'=>'user/login',
  'user/logout'=>'user/logout',
  'cabinet/edit'=>'cabinet/edit',
  'contact'=>'site/contact',
   'cart' => 'cart/index',
  'cart/add/([0-9]+)'=>'cart/add/$1',
  'cart/delete/([0-9]+)'=>'cart/delete/$1',
  'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController
  'admin' => 'admin/index',
   //Управление товарами
   'admin/product' => 'AdminProduct/index',
   'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
   'admin/product/create' => 'adminProduct/create',
   'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    //Управление категориями
   'admin/category' => 'AdminCategory/index',
   'admin/category/create' => 'AdminCategory/create',
    'admin/category/delete' => 'AdminCategory/delete',
   'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
      // Управление заказами:    
    'admin/order' => 'adminOrder/index',
     'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
  
     
  //'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
  'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
  'product/([0-9]+)' => 'product/view/$1', 
);

?>