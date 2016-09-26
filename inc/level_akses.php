 <?php
 $db=new db();
$sql = $db->query("select medule from level_rule where level = '". $_SESSION['level']."'");
foreach ($sql as $ha){
$h[]=$ha;
}
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}	
    ?>