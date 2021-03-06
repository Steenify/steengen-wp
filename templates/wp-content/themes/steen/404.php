<?php get_header(); ?>

<style>
  .page__404 {
    padding-top: 110px;
    background: #ffffff;
  }

  .page__404__content {
    min-height: 100vh;
  }

  .page__404__info {
    margin-top: 15px;
    margin-bottom: 30px;
  }

  .page__404__info h1 {
    font-style: normal;
    font-weight: 800;
    line-height: normal;
    font-size: 54px;
    text-align: center;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #000000;
  }

  .page__404__info p {
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    font-size: 36px;
    text-align: center;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #000000;
    margin-bottom: 30px;
  }


  @media (max-width: 991px) {
    .page__404 {
      padding-top: 0;
    }
  }

  @media (max-width: 768px) {
    .page__404__image {
      order: -1;
    }
  }

</style>

<main class="page__404 pt-5">
    <div class="container ">
      <div class="row page__404__content align-items-center">

        <div class="col-md-6">
          <div class="page__404__info text-center">
            <h1>sorry</h1>
            <p>
              page not found !
            </p>

            <a href="/" class="color_select__btn oexpo-btn link">
              go back
              <svg width="26" height="15" viewBox="0 0 26 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.3967 14L23.9999 7.56455L17.2643 0.999999" stroke="currentcolor" stroke-width="2" />
                <line y1="-1" x2="23.894" y2="-1" transform="matrix(-1 0 0 1 23.894 8.41138)" stroke="currentcolor"
                  stroke-width="2" />
              </svg>
            </a>
          </div>
        </div>
        <div class="col-md-6 page__404__image">

          <img src="/wp-content/themes/steen/app/public/img/404__page__icon.png" alt="">

        </div>

      </div>
    </div>

  </main>
<?php get_footer(); ?>