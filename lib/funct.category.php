<?php
function toggle_category_status($vars)
{
    global $db;

    print_r($vars);

    $ret['status'] = 0;
    $ret['error'] = '';

    $categoryId = $vars["categoryId"];
    $isActive = $vars["isActive"];

    $db->query("UPDATE Category SET IsActive = ? WHERE CategoryID = ?",  $isActive, $categoryId); 
    $ret['status'] = 1;
    $ret['error'] = '';
    return $ret;
}

?>