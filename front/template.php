<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BMW E39 club">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?=__SITE_ROOT__?>css/style.css" rel="stylesheet">
    <?php if (defined('__IS_ADMIN__') && __IS_ADMIN__) :?>
    <title><?=($admin_menu->check_page($page) && $page !== 'home' ? $admin_menu->get_menu()[$page]['title'] . ' / ': '')?>BMW E39 club</title>
    <?php else:?>
    <title><?=($customer_menu->check_page($page) && $page !== 'home' ? $customer_menu->get_menu()[$page]['title'] . ' / ': '')?>BMW E39 club</title>
    <?php endif;?>
</head>
<body>
<?php
include_once 'header.php';
if ($page === 'home')  {
    include_once 'home.php';
} else {
    include_once $page . '.php';
    include_once 'footer.php';
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<?php if (in_array($page, array('gallery', 'contacts', 'success'))) :?>
<script src="<?=__SITE_ROOT__?>js/app.js"></script>
<?php elseif ($page === 'about') : ?>
<script>
    // Accordion
    document.addEventListener('DOMContentLoaded', function() {
        var listItems = document.querySelectorAll('#accordionSwitcher button');
        var accordionButtons = document.querySelectorAll('.accordion .accordion-item .accordion-button');

        listItems.forEach(function(listItem, index) {
            listItem.addEventListener('click', function() {
                var event = new Event('click');
                accordionButtons[index].dispatchEvent(event);
            });
        });
    });
</script>
<?php elseif ($page === 'send' || $page === 'auth') : ?>
<script>
    // Back button
    function goBack() {
        window.history.back();
    }
</script>
<?php endif; ?>
</body>
</html>
