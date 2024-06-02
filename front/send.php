<?php

?>
<main class="container mt-4 mb-4">
    <section class="p-5">
        <?php if ($status): ?>
            <h1>Thank you for contacting us!</h1>
            <p>We will definitely read your message and respond to you as soon as possible.</p>
            <a class="btn btn-primary mt-4" onclick="goBack()">Back</a>
        <?php else: ?>
            <h1>Something went wrong!</h1>
            <p>Unfortunately, your message was not sent. Please try again later.</p>
            <a class="btn btn-primary mt-4" onclick="goBack()">Back</a>
        <?php endif; ?>
    </section>
</main>