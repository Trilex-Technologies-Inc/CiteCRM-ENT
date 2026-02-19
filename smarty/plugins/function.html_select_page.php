<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_page} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_page<br>
 * Purpose:  Prints the dropdowns for Page selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_page($params, &$smarty) {

    require_once(CLASS_PATH."/core/navigation.class.php");

    $navigationObj = new Navigation();

    $array = $navigationObj->load_all_active_pages();

    $html = '<select name="' . $params['fieldName'] . '">';


    foreach ($array as $navigation) {

        $html .= '<option value="' . $navigation->getPageSetupID() . '"';

        if($params['value'] == $navigation->getPageSetupID()) {
            $html .= ' selected ';
        }


        $html .='>' . $navigation->getPageSetupName() . '</option>';


    }

    

    $html .='</select>';

    return $html;

}

?>