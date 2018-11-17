<?php
/**
* Smarty plugin
* 
* @package Smarty
* @subpackage PluginsFilter
*/

/**
* Smarty htmlspecialchars variablefilter plugin
* 
* @param string $source input string
* @param object $ &$smarty Smarty object
* @return string filtered output
*/
function smarty_function_htmlspecialchars($params, &$smarty)
{
    return htmlspecialchars($params['content']);
} 

?>