<?php 

/* function validate_string($username):bool {

    $i = 0;
    $status = 0;
    while ($i < strlen($username))
    {
        if (preg_match('/\d/', $username[$i]) || is_numeric($username[$i]) || $username[$i] == '_')
           $status = 1;
        else
            $status = 0;
        echo $username[$i];
        $i++;
    }
    echo $i."\n";
    if ($status == 1)
        return true;
    return false;
}
 */
/*if (validate_string("hello"))
    echo "true";
else
    echo "false";*/
    //echo preg_match('/\d/', "c")."\n";
    echo is_numeric("c")."\n"; 
?>