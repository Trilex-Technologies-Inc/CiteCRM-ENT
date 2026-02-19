<?php
/** 
 * Type:     Cite CMS Core Class<br>
 * Name:     Session<br>
 * Purpose:  For all session handeling<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class Session {

  function Session()
  {
    session_start();
  }

  
  function set($name, $value)
  {
    $_SESSION[$name] = $value;
  }

  
  function get($name)
  {
    if (isset($_SESSION[$name])) {
      return $_SESSION[$name];
    } else {
      return false;
    }
  }

  
  function del($name) {
    unset($_SESSION[$name]);
  }

 
  function destroy()
  {
    $_SESSION = array();
    session_destroy();
  }
} 
?>