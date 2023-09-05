<?php
/*
    Template Name: home
     */
?>
<?php
get_header();
?>
<main class="main">
    <section class="banner">
        <div class="container banner__container">
            <div class="banner__content">
                <a href="" class="banner__logo"><img class="banner__logo-img" src="<?php bloginfo('template_url'); ?>/assets/img/icons/logo.svg" alt="logo"></a>
                <h1 class="banner__title">
                    <?php the_field('banner_title') ?>
                </h1>
                <p class="banner__subtext">
                    <?php the_field('banner_subtitle') ?>
                </p>
                <div class="trigger">
                    <span class="trigger__price-sale">
                        <?php the_field('banner_price') ?>
                    </span>
                    <span class="trigger__price"><?php the_field('price_sale') ?></span>
                    <span class="trigger__price-proccent">-80%</span>
                </div>
                <a class="banner__btn-link" href="<?php the_field('buy_link') ?>">
                    <button class="buy__btn banner__buy-btn">Придбати</button>
                </a>
            </div>
        </div>
    </section>
    <section class="who">
        <div class="container who__container">
            <div class="title__wrapper">
                <h2 class="title who__title">
                    кому він підійде?
                </h2>
            </div>
            <div class="who_items">
                <?php
                global $post;
                $myposts = get_posts([
                    'post_type' => "who",
                    'orderby' => 'date',
                    'order' => isset($_POST['date']) && $_POST['date'] === 'DESC' ? 'DESC' : 'ASC', // Вибір напрямку сортування
                    'numberposts' => -1,
                    'offset' => -1,
                    'category' => -1
                ]);

                if ($myposts) {
                    foreach ($myposts as $post) {
                        setup_postdata($post);
                ?>
                        <div class="who__item">
                            <h4 class="who__item-title"><?php the_field('who_title') ?></h4>
                            <?php the_field('who_text') ?>
                        </div>
                <?php
                    }
                    wp_reset_postdata(); // Сбрасываем $post
                }
                ?>
            </div>
        </div>
    </section>
    <section class="getting">
        <div class="container getting__container">
            <div class="title__wrapper">
                <h2 class="title getting__title">Що ви отримаєте?</h2>
            </div>

            <ul class="getting__list">
                <?php
                global $post;
                $myposts = get_posts([
                    'post_type' => "getting",
                    'orderby' => 'date',
                    'order' => isset($_POST['date']) && $_POST['date'] === 'DESC' ? 'DESC' : 'ASC', // Вибір напрямку сортування
                    'numberposts' => -1,
                    'offset' => -1,
                    'category' => -1
                ]);

                if ($myposts) {
                    foreach ($myposts as $post) {
                        setup_postdata($post);
                ?>
                        <li class="getting__list-item">
                            <?php the_field('getting_text') ?>
                        </li>
                <?php
                    }
                    wp_reset_postdata(); // Сбрасываем $post
                }
                ?>
            </ul>
        </div>
    </section>
    <section class="willbe">
        <div class="container willbe__container">
            <div class="title__wrapper">
                <h2 class="title willbe__title">
                    що буде на інтенсиві?
                </h2>
            </div>
            <div class="willbe__items">
                <div class="willbe__item">
                    <img class="willbe__item-img" src="<?php bloginfo('template_url'); ?>/assets/img/willbe/clipboard-icon.svg" alt="icon">
                    <ul class="willbe__list">
                        <li class="willbe__list-item">чому так важливо бути в ефірі</li>
                        <li class="willbe__list-item">що нам заважає проявлятись</li>
                        <li class="willbe__list-item">як подолати страх камери, страх критики, та страх
                            помилитись</li>
                        <li class="willbe__list-item">як говорити впевнено та транслювати це тілом</li>
                    </ul>
                </div>
                <div class="willbe__item">
                    <img class="willbe__item-img" src="<?php bloginfo('template_url'); ?>/assets/img/willbe/user-icon.svg" alt="icon">
                    <ul class="willbe__list">
                        <li class="willbe__list-item">як прокачати впевненість в собі</li>
                        <li class="willbe__list-item">як побороти хвилювання та сором’язливість</li>
                        <li class="willbe__list-item">як заявляти про себе та проявлятися</li>
                        <li class="willbe__list-item">як прибрати дискомфорт при зніманні відео</li>
                        <li class="willbe__list-item">ЯК ГОТУВАТИСЬ ДО ЗНІМАННЯ</li>
                    </ul>
                </div>
            </div>
            <div class="willbe__buy-wrapper">
                <a class="buy__link willbe__buy-link" href="<?php the_field('buy_link') ?>">
                    <button class="buy__btn">Придбати</button>
                </a>
            </div>
        </div>
    </section>
    <section class="process">
        <div class="container process__container">
            <div class="title__wrapper">
                <h2 class="title process__title">ЯК БУДЕ ПРОХОДИТИ?</h2>
            </div>
            <ul class="process__lyst">
                <li class="procces__lyst-item">
                    <svg class="procces__lyst-item__arrow" width="251" height="53" viewBox="0 0 251 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Arrow 1" d="M249.103 51.4965C249.93 51.4395 250.553 50.7233 250.496 49.8968L249.568 36.4288C249.511 35.6024 248.794 34.9786 247.968 35.0356C247.141 35.0926 246.518 35.8088 246.575 36.6352L247.4 48.6068L235.429 49.4324C234.602 49.4894 233.979 50.2056 234.036 51.0321C234.093 51.8585 234.809 52.4823 235.635 52.4253L249.103 51.4965ZM1.98517 51.1312C22.4691 33.2903 59.4079 11.8383 103.511 5.58519C147.549 -0.658885 198.77 8.24058 248.015 51.1312L249.985 48.8689C200.03 5.35952 147.917 -3.74102 103.089 2.6149C58.3254 8.96178 20.8642 30.7098 0.0148285 48.8689L1.98517 51.1312Z" fill="white" />
                    </svg>
                    <img class="procces__lyst-item__icon" src="<?php bloginfo('template_url'); ?>/assets/img/icons/procces/paper-icon.svg" alt="icon">
                    <span class="procces__lyst-item__text">ви приєднаєтесь до телеграм-каналу</span>
                </li>
                <li class="procces__lyst-item">
                    <svg class="procces__lyst-item__arrow procces__lyst-item__arrow--left" width="251" height="53" viewBox="0 0 251 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Arrow 1" d="M249.103 51.4965C249.93 51.4395 250.553 50.7233 250.496 49.8968L249.568 36.4288C249.511 35.6024 248.794 34.9786 247.968 35.0356C247.141 35.0926 246.518 35.8088 246.575 36.6352L247.4 48.6068L235.429 49.4324C234.602 49.4894 233.979 50.2056 234.036 51.0321C234.093 51.8585 234.809 52.4823 235.635 52.4253L249.103 51.4965ZM1.98517 51.1312C22.4691 33.2903 59.4079 11.8383 103.511 5.58519C147.549 -0.658885 198.77 8.24058 248.015 51.1312L249.985 48.8689C200.03 5.35952 147.917 -3.74102 103.089 2.6149C58.3254 8.96178 20.8642 30.7098 0.0148285 48.8689L1.98517 51.1312Z" fill="white" />
                    </svg>
                    <img class="procces__lyst-item__icon" src="<?php bloginfo('template_url'); ?>/assets/img/icons/procces/pen-icon.svg" alt="icon">
                    <span class="procces__lyst-item__text">6 відео уроків у записі та 6 практичних
                        завдань</span>
                </li>
                <li class="procces__lyst-item">
                    <svg class="procces__lyst-item__arrow" width="251" height="53" viewBox="0 0 251 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Arrow 1" d="M249.103 51.4965C249.93 51.4395 250.553 50.7233 250.496 49.8968L249.568 36.4288C249.511 35.6024 248.794 34.9786 247.968 35.0356C247.141 35.0926 246.518 35.8088 246.575 36.6352L247.4 48.6068L235.429 49.4324C234.602 49.4894 233.979 50.2056 234.036 51.0321C234.093 51.8585 234.809 52.4823 235.635 52.4253L249.103 51.4965ZM1.98517 51.1312C22.4691 33.2903 59.4079 11.8383 103.511 5.58519C147.549 -0.658885 198.77 8.24058 248.015 51.1312L249.985 48.8689C200.03 5.35952 147.917 -3.74102 103.089 2.6149C58.3254 8.96178 20.8642 30.7098 0.0148285 48.8689L1.98517 51.1312Z" fill="white" />
                    </svg>
                    <img class="procces__lyst-item__icon procces__lyst-item__icon--white" src="<?php bloginfo('template_url'); ?>/assets/img/icons/procces/file-icon.svg" alt="icon">
                    <span class="procces__lyst-item__text">
                        отримаєте матеріали
                        та чек-листи
                        інтенсиву
                    </span>
                </li>
                <li class="procces__lyst-item">
                    <img class="procces__lyst-item__icon procces__lyst-item__icon--white" src="<?php bloginfo('template_url'); ?>/assets/img/icons/procces/phone-icon.svg" alt="icon">
                    <span class="procces__lyst-item__text">
                        у вас буде
                        підтримка та звортній
                        зв’язок від мене
                    </span>
                </li>
            </ul>
            <div class="title__wrapper">
                <h2 class="title procces__bottom-title procces__bottom-title--mob">олексій чернецький</h2>
            </div>
            <div class="procces__content-bottom">
                <div class="procces__content-bottom__text">
                    <div class="title__wrapper">
                        <h2 class="title procces__bottom-title procces__bottom-title--desk">олексій чернецький</h2>
                    </div>
                    <ul class="procces__bottom-lyst">
                        <?php
                        global $post;
                        $myposts = get_posts([
                            'post_type' => "regalia",
                            'orderby' => 'date',
                            'order' => isset($_POST['date']) && $_POST['date'] === 'DESC' ? 'DESC' : 'ASC', // Вибір напрямку сортування
                            'numberposts' => -1,
                            'offset' => -1,
                            'category' => -1
                        ]);

                        if ($myposts) {
                            foreach ($myposts as $post) {
                                setup_postdata($post);
                        ?>
                                <li class="procces__bottom-lyst__item">
                                    <?php the_field('regalia_text') ?>
                                </li>
                        <?php
                            }
                            wp_reset_postdata(); // Сбрасываем $post
                        }
                        ?>

                        <!-- <li class="procces__bottom-lyst__item">
                            автор та наставник онлайн-курсів
                            <b>“ почни говорити” “заговори”</b>
                        </li>
                        <li class="procces__bottom-lyst__item">
                            <b>ведучий</b> івент заходів. <b>9 років на сцені
                                700+ заходів</b>
                        </li>
                        <li class="procces__bottom-lyst__item">
                            <b>заходи</b> з кількістю понад
                            <b>12000</b> осіб
                        </li>
                        <li class="procces__bottom-lyst__item">
                            <b>провів 49 мк</b> для команд ,
                            спільнот та компаній
                        </li>
                        <li class="procces__bottom-lyst__item">
                            <b>провів 120+</b> годин
                            консультацій
                        </li>
                        <li class="procces__bottom-lyst__item">
                            <b>більше 200</b> позитивних відгуків
                            за останні <b>7 місяців</b>
                        </li> -->
                    </ul>
                </div>
                <div class="procces__img-wrapper">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/procces/tablet.png" alt="speaker">
                </div>
            </div>
        </div>
        <div class="cases">
            <div class="container cases__container">
                <div class="title__wrapper">
                    <h2 class="title cases__title">відгуки</h2>
                </div>
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php
                        global $post;
                        $myposts = get_posts([
                            'post_type' => "case",
                            'orderby' => 'modified',
                            'numberposts' => -1,
                            'offset' => -1,
                            'category' => -1
                        ]);
                        if ($myposts) {
                            foreach ($myposts as $post) {
                                setup_postdata($post);
                        ?>
                                <div class="swiper-slide">
                                    <div class="swiper-slide__content">
                                        <div class="swiper__content-top">
                                            <img class="swiper__content-img" src="<?php the_field('cases_img') ?>" alt="image">
                                            <div class="swiper__content-top_text">
                                                <span class="swiper__content-expert">
                                                    <?php the_field('case_expert') ?>
                                                </span>
                                                <?php
                                                $case_link = get_field('case_link'); // Отримуємо значення поля 'case_link'

                                                if (!empty($case_link)) {
                                                    // Якщо значення поля 'case_link' не є порожнім, то виводимо його в тегу <span>
                                                    echo '<span class="swiper__content-name">inst: ' . $case_link . '</span>';
                                                }
                                                ?>


                                            </div>
                                        </div>
                                        <div class="swiper__content-bottom">
                                            <p class="swiper__content-text">
                                                <?php the_field('cases_text') ?>
                                            </p>
                                            <span class="swiper__content-read">Читати далі</span>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            wp_reset_postdata(); // Сбрасываем $post
                        }
                        ?>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="programms ">
            <div class="container programs__container">

                <div class="title__wrapper">
                    <h2 class="title programms__title">
                        Програма інтенсиву
                    </h2>
                </div>
                <div class="programms__items">
                    <?php
                    global $post;
                    $myposts = get_posts([
                        'post_type' => "module",
                        'orderby' => 'date',
                        'order' => isset($_POST['date']) && $_POST['date'] === 'DESC' ? 'DESC' : 'ASC', // Вибір напрямку сортування
                        'numberposts' => -1,
                        'offset' => -1,
                        'category' => -1
                    ]);

                    if ($myposts) {
                        foreach ($myposts as $post) {
                            setup_postdata($post);
                    ?>
                            <div class="programms__item">
                                <h3 class="programms__item-name"><?php the_field('title_module') ?></h3>
                                <?php the_field('lessons_module') ?>
                            </div>
                    <?php
                        }
                        wp_reset_postdata(); // Сбрасываем $post
                    }
                    ?>
                </div>
                <div class="checkout">
                    <h3 class="checkout__title">знижка -80% може зникнути...</h1>
                        <div class="countdown-wrapper">
                            <div id="year" class="year"></div>
                            <div class="countdown" id=countdown>
                                <div class="time">
                                    <h2 id="days">00</h2>
                                    <small>дні</small>
                                </div>
                                <div class="time">
                                    <h2 id="hours">00</h2>
                                    <small>години</small>
                                </div>
                                <div class="time">
                                    <h2 id="minutes">00</h2>
                                    <small>хвилини</small>
                                </div>
                                <div class="time">
                                    <h2 id="seconds">00</h2>
                                    <small>секунди</small>
                                </div>
                            </div>
                            <div class="preloader" id="preloader">
                                <div class="lds-ripple">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="trigger">
                            <span class="trigger__price-sale">371 грн</span>
                            <span class="trigger__price">1855 грн</span>
                            <span class="trigger__price-proccent">-80%</span>
                        </div>
                        <a href="<?php the_field('buy_link') ?>">
                            <button class="checkout__btn">придбати</button>
                        </a>
                </div>
            </div>

        </div>
    </section>

    <div id="modal" class="modal">

    </div>
</main>
</main>
<?php
get_footer();
?>