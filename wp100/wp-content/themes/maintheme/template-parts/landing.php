<div class="landing-content">

    <div class="promo-slider position-relative mb-25p">
        <style>
            [class="promo-slider__bg position-absolute overflow-hidden w-100"] {
                background: url('<?php echo get_stylesheet_directory_uri() . '/assets/images/welcome-bonus-bg.png'; ?>') top center no-repeat;
                background-size: cover;
                height: 600px;
                z-index: 1;
            }
        </style>
        <div class="promo-slider__bg position-absolute overflow-hidden w-100">
            <img class="promo-slider__image position-absolute d-block" style="z-index: 2;" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/welcome-bonus-image.png'; ?>" alt="First Deposit Bonus">
        </div>

        <div class="promo-slider__content">
            <div class="promo-slider__content-text">
                <div class="promo-slider__content-text-inner">
                    <p class="heading heading--h1 heading--color-white"><strong><span lang="EL"><?php echo $GLOBALS['bonus_title']; ?></span></strong></p>
                    <div class="promo-slider__mobile-title">
                        <?php echo $GLOBALS['bonus_subtitle']; ?>
                    </div>
                    <p class="for-desktop steps-text">
                        <?php echo $GLOBALS['bonus_text']; ?>
                    </p>
                </div>
            </div>

            <div class="steps-as-icons">
                <p class="steps-as-icons__heading"> <?php echo $GLOBALS['step_info']; ?></p>
                <div class="steps-as-icons__items d-flex">
                    <?php

                    $stepsImage = '' . get_stylesheet_directory_uri() . '/assets/images/hexagon.svg';

                    for ($i = 1; $i <= 4; $i++) {

                        switch ($i) {
                            case 1:
                                $iconClass = "nc-check";
                                break;
                            case 2:
                                $iconClass = "nc-coin";
                                break;
                            case 3:
                                $iconClass = "nc-emoji-smile";
                                break;
                            case 4:
                                $iconClass = "nc-gift";
                                break;
                        }
                        $text = $GLOBALS['step_' . $i] ?: '';
                    ?>
                        <div class="steps-as-icons__item d-flex ">
                            <div class="hexagon-icon">
                                <img src="<?php echo $stepsImage ?>" alt="Step">
                                <div class="hexagon-icon__icon"><span class="font-icon <?php echo $iconClass; ?>">&zwnj;</span></div>
                                <div class="hexagon-icon__pos"><?php echo $i; ?></div>
                            </div>
                            <div class="steps-as-icons__item-text">
                                <?php echo $text; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>


                <div class="promo-slider__button-wrapper">
                    <a class="text-decoration-none px-2" href="<?php echo $GLOBALS['aff_link']; ?>">
                        <button class="app-button app-button--default" type="button" data-action="login">
                            <span><?php echo $GLOBALS['bonus_btn']; ?></span>
                        </button>
                    </a>
                </div>

                <div class="footer__content reversed">
                </div>


            </div>

        </div>

    </div>