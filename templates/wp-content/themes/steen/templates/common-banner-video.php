<?php 
  $repeaters = get_field('banner_video', false);
?>
<section class="main-slider_block">
  <?php
    foreach ($repeaters as $item) {
      if ($item['included_video'] == 'video') {
        ?>
          <div class="main-slider_item">
            <div class="main-slider_item_wrapper">
              <picture>
                <source media="(min-width: 1680px)" srcset="<?php echo $item['1680px'] ?>">
                <source media="(max-width: 768px)" srcset="<?php echo $item['768px'] ?>">
                <img src="<?php echo $item['1440px'] ?>" class="w-100" alt="dyb-banner">
              </picture>

              <div class="main-slider_item__body">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-6 main-slider_item__text">
                        <h4 class="video-text">
                          <?php echo $item['sologan']; ?>
                        </h4>
                      </div>
                      <div class="col-6 main-slider_item__video">
                        <?php
                          if ($item['video_link']) {
                            ?>
                            <a class="main-slider_item__video__wrapper" data-fancybox href="<?php echo $item['video_link']?>">
                              <img src="<?php echo $item['video_cover']?>" alt="course-dreamers">
                              <div class="video__icon">
                                <svg width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M20.6743 10.4075C21.1431 10.6887 21.4712 11.1106 21.6587 11.5793C21.8462 12.095 21.8462 12.6106 21.6587 13.0793C21.4712 13.595 21.1431 13.97 20.6743 14.2512L4.17432 24.0012C3.70557 24.2825 3.18995 24.3762 2.67432 24.2825C2.11182 24.1887 1.68995 23.9543 1.31495 23.5325C0.939947 23.1575 0.799322 22.6418 0.799322 22.0793V2.57935C0.799322 1.96997 0.986822 1.45435 1.36182 1.07935C1.73682 0.704346 2.1587 0.469971 2.7212 0.376221C3.23682 0.282471 3.70557 0.376221 4.17432 0.657471L20.6743 10.4075Z"
                                    fill="currentcolor" />
                                </svg>
                              </div>
                            </a>                              
                            <?php
                          } else {
                            echo '<img src="'.$item['video_cover'].'" alt="course-dreamers">';
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
        <?php
      } else {
        ?>
          <div class="main-slider_item">
            <div class="main-slider_item_wrapper">
              <picture>
                <source media="(min-width: 1680px)" srcset="<?php echo $item['1680px'] ?>">
                <source media="(max-width: 768px)" srcset="<?php echo $item['768px'] ?>">
                <img src="<?php echo $item['1440px'] ?>" class="w-100" alt="dyb-banner">
              </picture>
              <div class="main-slider_item__body">
                <div class="container">
                  <div class="main-slider_item__text">
                    <h4>
                      <?php echo $item['sologan']; ?>
                    </h4>
                  </div>
                </div>
              </div>

            </div>
          </div>            
        <?php
      }
    }
  ?>
</section>