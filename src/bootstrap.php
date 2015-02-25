<?php
/**
 * Bootstrapping functions, essential and needed for Erwin to work together with some common helpers. 
 *
 */
 
/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
  echo "Erwin: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');
 
 
/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
  $path = ERWIN_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$class}' does not exists.");
  }
}
spl_autoload_register('myAutoloader');


/**
 * Visa innehållet i en array/variabel. Verkar visas högst upp på sidan, även om man t.ex. använder .= på det som är lagrat i erwin['main']
 *
 */
function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

/**
 * Som ovan fast tar en array/variabel och ger tillbaka en sträng med innehållet i variabeln. Redo att skriva ut, t.ex via echo. 
 *
 */
function dumpAsString($array) {
  $string = "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
  return $string;
}

/**
 * Ger länk till nuvarande sida, t.ex. för att skapa permalänk till aktuell sida.
 *
 */
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}
 

/**
 * Håller reda på vilket menyval som är selected. anropas innefrån metoden CNavigation
 *
 */
function modifyNavbar($items) {
  // jämför med array-strukturen i config för att förstå.
  // ifall det finns en lagrad item med samma namn som $pageName, då ska just den item få värdet 'selected'. funkar även för multi-sidor pga basename tar bort extra "p=12" osv? 
  
  $pageName = (basename($_SERVER['SCRIPT_FILENAME']));
  // The absolute pathname of the currently executing script.
  
  // $ref får värdet av  -- isset($items[$pageName])) 
  $ref = (basename($_SERVER['SCRIPT_FILENAME']) == $items[$pageName]['url']) ? $pageName : null; // $items[$pageName]['url']
  if($ref) {
    $items[$ref]['class'] .= 'selected'; 
  }
  //echo $items['url'];
  //echo $ref;
  return $items;
}