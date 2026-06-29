<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if ($page == 'dashboard') {
        include_once('views/pages/dashboard.php');
    } elseif ($page == 'users') {
        include_once('views/pages/user/manage.php');
    } elseif ($page == 'create-user') {
        include_once('views/pages/user/create.php');
    } elseif ($page == 'edit-user') {
        include_once('views/pages/user/edit.php');
    } elseif ($page == 'applications') {
        include_once('views/pages/applications_list.php');
    } elseif ($page == 'categories') {
        include_once('views/pages/categories.php');
    } elseif ($page == 'companies') {
        include_once('views/pages/companies_list.php');
    } elseif ($page == 'jobs') {
        include_once('views/pages/job_list.php');
    } elseif ($page == 'reported-jobs') {
        include_once('views/pages/reported_job_list.php');
    } elseif ($page == 'roles') {
        include_once('views/pages/roles.php');
    } else {
        include_once('views/pages/dashboard.php');
    }
} else {
    include_once('views/pages/dashboard.php');
}
?>
