<?php
// Cookies::getInstance()->setCookie("MyCookie","MyValue",3110);
// echo Cookies::getInstance()->getCookie("MyCookie");
// Cookies::getInstance()->deleteCookie("MyCookie");
// echo Cookies::getInstance()->getCookie("MyCookie");

class Cookies {
  private static $inst = null;
  private function __construct(){}
  public static function getInstance()
  {
    if (self::$inst == null)
    {
      self::$inst = new self();
    }
    return self::$inst;
  }

  public function setCookie($name, $value = null, $time = 31536000)
  {
    $set = setcookie($name, $value, time() + $time);
    return $set;
  }

  public function getCookie($name)
  {
    if (isset($_COOKIE) && is_array($_COOKIE) && array_key_exists($name, $_COOKIE))
    {
      return $_COOKIE[$name];
    }
    return false;
  }

  public function deleteCookie($name)
  {
    if ($this->getCookie($name) != false)
    {
      setcookie($name, "", time() - 1);
      return true;
    }
    return false;
  }
}