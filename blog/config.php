<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

const DATABASE_ADMIN_PATH = __DIR__ . '/database/admin/';

$page = $_REQUEST['page'] ?? null;

function isLoged(): bool
{
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}