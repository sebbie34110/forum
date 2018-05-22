<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 10/04/2018
 * Time: 13:34
 */

session_start();
session_destroy();
header('Location: index.php');
exit();
