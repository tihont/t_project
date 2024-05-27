<?php
/**
 * Php-шаблон средней (контентной) секции страницы сайта для постраничного отображения галереи фотографий.
 */
?>
<main class="container mt-4 mb-4">
    <section class="p-5">
        <h1 id="pagetitle">Gallery</h1>
        <p class="lead text-muted">This is a gallery of BMW E39 cars of members of our club.</p>
    </section>
    <section class="p-5">

        <div class="container-fluid" id="cardsContainer">
            <?php if ($prev_page > 0) :?>
                <a class="btn btn-primary mt-4 mb-4" id="prevRowTop" href="gallery.php<?=($prev_page > 1 ? '?page=' . $prev_page : '')?>">Show previous</a>
            <?php endif;?>
            <?php if (!$last_page) :?>
                <a class="btn btn-primary mt-4 mb-4" id="nextRowTop" href="gallery.php?page=<?=$next_page?>">Show next</a>
            <?php endif;?>
            <div class="row">
                <?php foreach ($items as $item) :?>
                    <div class="card" id="card<?=$item['id']?>">
                        <div class="card-image-top">
                            <?php if (!empty($item['image']) && file_exists('img/preview/' . $item['image'])) :?>
                                <img class="w-100 h-100" src="img/preview/<?=$item['image']?>" data-src="img/full/<?=$item['image']?>"
                                     alt="<?=$item['short_desc']?>">
                            <?php else :?>
                                <svg class="bd-placeholder-img card-img-top w-100 h-100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#0d6efd"></rect></svg>
                            <?php endif;?>
                        </div>
                        <h5 class="card-title text-muted"><?=$item['title']?></h5>
                        <p class="card-text text-muted"><?=$item['short_desc']?></p>
                    </div>
                <?php endforeach;?>
            </div>
            <?php if ($prev_page > 0) :?>
                <a class="btn btn-primary mt-4" id="prevRowBottom" href="gallery.php<?=($prev_page > 1 ? '?page=' . $prev_page : '')?>">Show previous</a>
            <?php endif;?>
            <?php if (!$last_page) :?>
                <a class="btn btn-primary mt-4" id="nextRowBottom" href="gallery.php?page=<?=$next_page?>">Show next</a>
            <?php endif;?>
        </div>

    </section>

    <div class="modal" id="LightBox">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"></h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid"><img src="" alt=""/></div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</main>
