<?php

//show parametro
function pr($str)
{
  echo '<pre>';
  print_r($str);
  echo '</pre>';
}

//Inicía projeto
function init()
{

  //URL
  $url = [];
  if (isset($_GET['pg'])) {
    $url = explode('/', $_GET['pg']);
  }
  define('CLASSE', isset($url[0]) ? $url[0] : '');
  define('METODO', isset($url[1]) ? $url[1] : '');
  define('CHAVE', isset($url[2]) ? $url[2] : '');

  //RAIZ
  define('RAIZ', __DIR__);

  //URL
  $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
  define('URL', $url);
}
