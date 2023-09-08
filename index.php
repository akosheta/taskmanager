<?php

include "bootstrap/init.php";
if (isset($_GET["delete_folder"]) && is_numeric($_GET["delete_folder"])) {
    removeFolder($_GET["delete_folder"]);
}
$folders = getFolders();
$tasks = getTasks();
// dd($tasks);


include BASE_PATH . "tpl/tpl-index.php";