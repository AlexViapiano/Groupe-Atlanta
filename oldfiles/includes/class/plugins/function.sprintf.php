 
<?php 
function smarty_function_sprintf($params, $smarty) 
{ 
  if ( !isset($params['format']) ) 
  { 
    trigger_error("sprintf: required parameter 'format' missing.", E_USER_WARNING); 
    return false; 
  } 

  $fmt = $params['format']; 
  $fmt_e = explode('%', $fmt); 

  # Do NOT skip the first element when the first character is '%' 
  $skip_next = substr($fmt, 0, 1) != '%'; 
  foreach( $fmt_e as $idx => $piece ) 
  { 
    if ( $skip_next ) 
    { 
      $skip_next = false; 
      continue; 
    } 

    if ( $piece == '' ) // %% 
    { 
      unset($fmt_e[$idx]); 
      $skip_next = true; 
      continue; 
    } 

    # read name until next space 
    $name = ''; 
    for( $i = 0, $total = strlen($piece); $i < $total; ++$i ) 
    { 
      if ( strpos(" \r\t\n", $piece{$i}) !== false ) 
        break; 
      $name .= $piece{$i}; 
    } 

    if ( !isset($params[$name]) ) 
    { 
      trigger_error( "sprintf: unknown argument '%{$name}'.", E_USER_WARNING ); 
      continue; 
    } 

    $fmt_e[$idx] = $params[$name] . substr($piece, strlen($name)); 
  } 

  return implode($fmt_e); 
} 
?>