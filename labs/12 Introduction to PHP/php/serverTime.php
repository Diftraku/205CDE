<?php
if (array_key_exists('random', $_REQUEST)) {
    echo rand();
}
else {
    echo date("H:i:s");
}
?>
