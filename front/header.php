<?php

?>
<header id="header" class="container-fluid navbar navbar-expand-lg sticky-top bg-primary text-white">
    <nav class="container flex-wrap py-0 px-3">
        <a id="logo" class="navbar-brand mb-0" href="<?=__SITE_ROOT__?>" title="main page">BMW E39 club</a>
        <button class="navbar-toggler btn-lg" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapseContainer" aria-controls="navbarCollapseContainer"
                aria-expanded="false"
                aria-label="Menu switcher">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapseContainer">
            <ul class="navbar-nav menu">
                <?php if (defined('__IS_ADMIN__') && __IS_ADMIN__) :?>
                    <?php foreach ($admin_menu->get_menu() as $alias => $item) :?>
                        <li class="nav-item<?=($alias === $page ? ' active' : '')?>"><a class="nav-link" title="Home" href="<?=$item['url']?>"><span><?=$item['title']?></span></a></li>
                    <?php endforeach;?>
                <?php else:?>
                    <?php foreach ($customer_menu->get_menu() as $alias => $item) :?>
                        <li class="nav-item<?=($alias === $page ? ' active' : '')?>"><a class="nav-link" title="Home" href="<?=$item['url']?>"><span><?=$item['title']?></span></a></li>
                    <?php endforeach;?>
                <?php endif;?>
            </ul>
        </div>
    </nav>
</header>
