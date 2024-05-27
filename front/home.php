<?php
/**
 * Php-шаблон средней (контентной) секции домашней страницы сайта со слайдером.
 */
?>
<main id="main" class="container mt-4 mb-4">
    <section id="content" class="w-100">
        <div id="frontpageCarousel" class="carousel carousel-dark slide carousel-fade w-100" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $index = 0; ?>
                <?php foreach ($items as $item) :?>
                <div class="carousel-item<?=($index == 0 ? ' active': '')?>">
                    <div class="carousel-item-image-wrapper">
                        <img class="slide-item"
                             src="img/full/<?=$item['image']?>"
                             alt="<?=$item['short_desc']?>"
                             title="<?=$item['title']?>"/>
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?=$item['title']?></h5>
                    </div>
                </div>
                <?php $index++; ?>
                <?php endforeach;?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#frontpageCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#frontpageCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>
</main>
<footer id="footer" class="container d-flex flex-wrap py-3 px-5 justify-content-between">
    <div id="contacts">
        <a href="mailto:tikhon.tolypin@student.ukf.sk">tikhon.tolypin@student.ukf.sk</a>
    </div>
    <div id="copyright">
        <?=date('Y');?> Tolypin Tikhon
    </div>
</footer>
