<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty string_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     string_format<br>
 * Purpose:  format strings via sprintf
 * @link http://smarty.php.net/manual/en/language.modifier.string.format.php
 *          string_format (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_phone_format($string){
    $npa =  substr($string, 0, 3);
    $nnx =  substr($string, 3, 3);
    $line =  substr($string, 6, 4);


    if(!empty($npa)){
        $phone = "($npa) $nnx - $line";
    } else {
        $phone = $nnx . $line;
    }

    return $phone;

}

/* vim: set expandtab: */

?>
