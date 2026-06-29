<?php
$page = $_GET['page'] ?? 'dashboard';

$routes = [
    'dashboard'        => 'views/pages/dashboard.php',
    // Users
    'users'            => 'views/pages/user/manage.php',
    'create-user'      => 'views/pages/user/create.php',
    'edit-user'        => 'views/pages/user/edit.php',
    // Categories
    'categories'       => 'views/pages/categories/manage.php',
    'create-category'  => 'views/pages/categories/create.php',
    'edit-category'    => 'views/pages/categories/edit.php',
    // Jobs
    'jobs'             => 'views/pages/jobs/manage.php',
    // Companies
    'companies'        => 'views/pages/companies/manage.php',
    // Applications
    'applications'     => 'views/pages/applications/manage.php',
    // Roles
    'roles'            => 'views/pages/roles/manage.php',
    'create-role'      => 'views/pages/roles/create.php',
    'edit-role'        => 'views/pages/roles/edit.php',
];

if (array_key_exists($page, $routes)) {
    include_once($routes[$page]);
} else {
    include_once('views/pages/dashboard.php');
}
?>
