<?php

$groups = $specification->getGroups();
?>
<main class="container mt-4 mb-4">
    <section class="p-5">
        <h1>About us</h1>
        <p>Welcome to the BMW E39 Enthusiasts Club in Nitra, Slovakia!</p>
        <h2>Club History</h2>
        <p>Our club has a rich history deeply rooted in the automotive culture of Nitra, Slovakia. Established with a
            passion for the iconic BMW E39, our community has grown over the years, bringing together enthusiasts who
            share a love for precision engineering, timeless design, and the sheer joy of driving.</p>
        <div id="accordionSwitcher" class="btn-group btn-group-lg mb-3" role="group" aria-label="Large button group">
            <?php $i = 1; ?>
            <?php foreach ($groups as $group): ?>
                <button type="button" class="btn btn-outline-primary"><?= $group['group_name'] ?></button>
            <?php endforeach; ?>
        </div>
        <div class="accordion" id="aboutAccordion">
            <?php foreach($groups as $group): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $group['id'] ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?= $group['id'] ?>" aria-expanded="<?=($i == 1 ? "true" : "false")?>" aria-controls="collapse<?= $group['id'] ?>">
                        <?= $group['group_name'] ?>
                    </button>
                </h2>
                <div id="collapse<?= $group['id'] ?>" class="accordion-collapse collapse<?=($i == 1 ? " show" : "")?>" aria-labelledby="heading<?= $group['id'] ?>"
                     data-bs-parent="#aboutAccordion">
                    <div class="accordion-body"><?= $group['description'] ?></div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        <p class="mt-3">
            Join us in celebrating the legacy of the BMW E39 and the camaraderie of automotive enthusiasts in Nitra!
        </p>

    </section>
</main>
