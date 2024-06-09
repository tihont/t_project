<?php

?>
<main class="container mt-4 mb-4">
    <section class="p-5">
        <h1 id="pagetitle"><?=$errorMessage->getMessageTitle()?></h1>
        <p class="lead text-muted"><?=$errorMessage->getMessageText()?></p>
        <a class="btn btn-primary mt-4" onclick="goBack()">Back</a>
    </section>
</main>