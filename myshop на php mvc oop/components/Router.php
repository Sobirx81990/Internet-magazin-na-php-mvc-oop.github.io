<?php
 
class Router{
    
    private $routes;
    public function __construct()
    {
       $routesPath = ROOT . '/config/routes.php';  
       $this->routes = include($routesPath);
    }
    private function getURI() //метод возвращает строку
    {
         if(!empty($_SERVER['REQUEST_URI'])) //'REQUEST_URI' -  URI, который был предоставлен для доступа к этой странице. Например, '/index.html'.
        {
            return trim($_SERVER['REQUEST_URI'], '/'); // trim - Удаляет пробелы (или другие символы) из начала и конца строки
        }
    }
    public function run()
    {
    // Получить строку запроса
     $uri = $this->getURI();
     
    // Проверить наличие такого запроса в routes.php 
    foreach($this->routes as $uriPattern => $path)
    {
        //Сравниваем $uriPattern и $uri
        if(preg_match("~$uriPattern~",$uri)) //  В качестве разделителя использована тильда.  preg_match - Выполняет проверку на соответствие регулярному выражению
        {     
            // Получаем внутренний путь из внешнего согласно правилу.
         $internalRoute = preg_replace("~$uriPattern~",$path,$uri); // uri--- http:shop/news/sport/77  ~$uriPattern~ --- 'news/([a-z]+)/([0-9]+)' =>   $path --- 'news/view/$1/$2',
              // Определить какой контроллер
                // и action обрабатывает запрос 
          $segments = explode('/', $internalRoute);//Функция explode() возвращает массив элементами которого являются строки
             $controllerName = array_shift($segments) . 'Controller'; // Извлекает первый элемент массива, далее потом его не будет в массиве
             $controllerName = ucfirst($controllerName); // uppercasefirst - Преобразует первый символ строки в верхний регистр
         
             $actionName = 'action' . ucfirst(array_shift($segments));
            
            $parametrs = $segments; // остается только id - шник
           
        }
           
        
    } 
   
    // Подключить файл класса-контроллера
   
    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php'; // ошибка с пробелом если ' .php'
    if(file_exists($controllerFile))
    { 
        include_once($controllerFile);
            
    }    
       $controllerObject  = new $controllerName;
       $result = call_user_func_array(array($controllerObject,$actionName),$parametrs); //идентично но но $result = $controllerObject->$actionName($parametrs);    
       if($result != null)
        {
            break; 
        }
        
    }

}

?>