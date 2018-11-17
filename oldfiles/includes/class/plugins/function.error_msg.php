<?php

function smarty_function_error_msg($params, $smarty)
{
  $msg = $params['msg'];
  if (!empty($msg))
	  return '<span class="error_msg">'.$msg.'</span>';
}

?>