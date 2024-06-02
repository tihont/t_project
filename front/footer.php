<?php

?>

<footer class="navbar navbar-expand-lg bg-light">
    <div class="container flex-wrap py-3 px-5 justify-content-md-start">
        <p class="pe-4 mb-0 text-muted col-4"><?=date('Y');?> Tolypin Tikhon</p>

        <ul class="navbar-nav flex-column justify-content-end border-start ps-3 col-4">
            <?php if ($page === 'control') :?>
                <?php foreach ($admin_menu->get_menu() as $alias => $item) :?>
                    <li class="nav-item<?=($alias === $page ? ' active' : '')?>"><a class="nav-link" href="<?=$item['url']?>"><?=$item['title']?></a></li>
                <?php endforeach;?>
            <?php else:?>
                <?php foreach ($customer_menu->get_menu() as $alias => $item) :?>
                    <li class="nav-item<?=($alias === $page ? ' active' : '')?>"><a class="nav-link" href="<?=$item['url']?>"><?=$item['title']?></a></li>
                <?php endforeach;?>
            <?php endif;?>
        </ul>

        <div class="d-flex flex-column justify-content-end border-start ps-3 col-4" id="contacts">
            <a href="tel:+421 123 456 789" class="">+421 123 456 789</a>
            <a href="mailto:tikhon.tolypin@student.ukf.sk">tikhon.tolypin@student.ukf.sk</a>
        </div>

    </div>
</footer>
