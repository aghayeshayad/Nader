<?php
/**
 * Created By: Bahram Shahabi
 * Email: bahramshahabi@gmail.com
 * Contract No.: +98-9155001695
 */

/**
 * Helpers Files
 * e.g: Menu.php -> Menu
 * Route/Routers.php -> Route/Routers
*/
$helpers = [
    'Menu'
];

/**
 * Load helper files
*/
foreach ($helpers as $helper) {
    require_once __DIR__ . "/$helper.php";
}
