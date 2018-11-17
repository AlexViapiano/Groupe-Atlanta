<?php

function smarty_function_word_count($params, $smarty)
{
	$string = html_entity_decode(html_entity_decode(strip_tags($params['content'])));
    return str_word_count($string);
}

?>