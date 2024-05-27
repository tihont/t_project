<?php
/**
 * Php-шаблон средней (контентной) секции страницы сайта для отображения ошибки входа (авторизации) на сайт.
 */
?>
<main class="container mt-4 mb-4">

    <section class="p-5">
        <h1 id="pagetitle">Failed to log in!</h1>
        <p class="lead text-muted"><?=(!empty($error_message) ? $error_message : "")?></p>
        <a class="btn btn-primary mt-4" onclick="goBack()">Back</a>
    </section>

</main>