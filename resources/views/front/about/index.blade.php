@extends('layouts.app')

@section('content')

    <!-- Start Breadcrumb -->
    <div class="ak-height-150 ak-height-lg-120"></div>
    <div class="breadcrumb-area">
      <div class="container container-customize">
        <div class="breadcrumb-wapper">
          <div class="breadcrumb-title-box">
            <h1 class="breadcrumb-title">
              We thrive on <span class="highlight-text">creativity</span> &
              <span class="highlight-text">innovation</span>
              in digital presence
            </h1>
            <div class="breadcrumb-caption">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="223"
                  height="12"
                  viewBox="0 0 223 12"
                  fill="none"
                >
                  <path
                    d="M1.33789 1.18359H221.034L209.173 10.9822"
                    stroke="#FF4A23"
                    stroke-linecap="round"
                  ></path>
                </svg>
              </span>
              <span><a href="index-2.html">Home</a> / About Us </span>
            </div>
          </div>
          <div class="breadcrumb-img-box">
            <video autoplay="" muted="" loop="">
              <source src="assets/videos/about.mp4" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
            <div class="breadcrumb-cricle">
              <div class="cricle-animated-text">
                <div class="rounded-text rotating">
                  <svg viewBox="0 0 200 200">
                    <path
                      id="textPath"
                      d="M 85,0 A 85,85 0 0 1 -85,0 A 85,85 0 0 1 85,0"
                      transform="translate(100,100)"
                      fill="none"
                      stroke-width="0"
                    ></path>
                    <g font-size="22.1px">
                      <text text-anchor="start">
                        <textPath
                          class="coloring"
                          xlink:href="#textPath"
                          startOffset="0%"
                        >
                          DIGITAL PRESENCE CREATIVITY & INNOVATION I N &nbsp;
                        </textPath>
                      </text>
                    </g>
                  </svg>
                </div>
                <div class="cricle-ceneter-text"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Video -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <a
      href="https://www.youtube.com/watch?v=VcaAVWtP48A"
      class="ak-center ak-video-block ak-style1 ak-video-open ak-bg about-video-block"
    >
      <img
        src="assets/img/bg/about-video-bg.png"
        class="video-img ak-bg"
        alt="..."
      />
      <span class="video-player-btn circle-btn-anim ak-center">
        <span class="text">Play Now</span>
      </span>
    </a>
    <!-- End Video -->

    <!-- Start Moving text -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <div class="slideing-text-content style2">
      <p class="slideing-text text-color-three">
        Design / Product Development / Brand Design
      </p>
      <p class="slideing-text text-color-two">
        Digital Design / Product Design / Brand Design
      </p>
    </div>
    <!-- End Moving text -->

    <!-- Start About -->
    <div class="ak-height-95 ak-height-lg-80"></div>
    <section class="about-content container">
      <div class="star-content">
        <img src="assets/img/shape/star-2.png" alt="star" class="star-1" />
        <img src="assets/img/shape/star-2.png" alt="star" class="star-2" />
      </div>
      <div class="about-info">
        <h3 class="about-title text-color-shiption">
          We thrive on
          <span class="highlight ak-black-color">creativity</span> and
          <span class="highlight">innovation</span>. Our team is constantly
          exploring new ideas and approaches to ensure your
          <span class="highlight">digital presence</span> is fresh, engaging,
          and ahead of the competition.
        </h3>
        <a href="portfolio.html" class="more-btn">
          <span class="morebtn-text">View Latest Project </span>
          <span class="primary-icon-anim">
            <i class="flaticon-up-right-arrow"></i>
            <i class="flaticon-up-right-arrow"></i>
          </span>
        </a>

        <img
          src="assets/img/shape/line-2.png"
          alt="swirl design"
          class="swirl"
        />
      </div>
    </section>
    <!-- End About -->

    <!-- Start  Awards-->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <div class="container">
      <div class="ak-section-heading ak-style-1 type-2">
        <div class="ak-section-left">
          <h2
            class="ak-section-title text-animation"
            data-ease="power2.out"
            data-split-text="chars"
            data-duration="0.7"
            data-direction="textTop"
            data-offset="100%"
          >
            <span class="highlight">Awards</span> <br />
            Achievement
          </h2>
        </div>
        <div class="ak-section-right">
          <div
            class="ak-section-caption fade-animation"
            data-direction="right"
            data-delay="0.3"
          >
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="223"
                height="12"
                viewBox="0 0 223 12"
                fill="none"
              >
                <path
                  d="M1.33789 1.18359H221.034L209.173 10.9822"
                  stroke="#FF4A23"
                  stroke-linecap="round"
                />
              </svg>
            </span>
            <span> Awards </span>
          </div>
        </div>
      </div>
      <div class="ak-height-75 ak-height-lg-50"></div>
      <div class="awards-box">
        <div class="awards-hover-image">
          <img id="awardsHover" src="assets/img/404.html" alt="Hover Image" />
        </div>
        <div class="awards-list">
          <div class="awards-card fade-animation" data-direction="bottom">
            <div class="awards-hover">
              <img src="assets/img/award/hover-img-1.png" alt="..." />
            </div>
            <h6 class="awards-title">01. Dribbble Award 2024</h6>
            <p class="awards-type">Audience Choice</p>
            <p class="awards-category">Design of the day</p>
            <div class="awards-img">
              <img src="assets/img/award/awards-1.svg" alt="..." />
            </div>
          </div>
          <div class="awards-card fade-animation" data-direction="bottom">
            <div class="awards-hover">
              <img src="assets/img/award/hover-img-2.png" alt="..." />
            </div>
            <h6 class="awards-title">02. Product hunt Award 2024</h6>
            <p class="awards-type">Audience Choice</p>
            <p class="awards-category">Feature Product</p>
            <div class="awards-img">
              <img src="assets/img/award/awards-2.svg" alt="..." />
            </div>
          </div>
          <div class="awards-card fade-animation" data-direction="bottom">
            <div class="awards-hover">
              <img src="assets/img/award/hover-img-3.png" alt="..." />
            </div>
            <h6 class="awards-title">03. Envato Award 2024</h6>
            <p class="awards-type">Audience Choice</p>
            <p class="awards-category">Trendsetter</p>
            <div class="awards-img">
              <img src="assets/img/award/awards-3.svg" alt="..." />
            </div>
          </div>
          <div class="awards-card fade-animation" data-direction="bottom">
            <div class="awards-hover">
              <img src="assets/img/award/hover-img-4.png" alt="..." />
            </div>
            <h6 class="awards-title">04. Google Award 2024</h6>
            <p class="awards-type">Honorable Mention</p>
            <p class="awards-category">Best Problem Solver</p>
            <div class="awards-img">
              <img src="assets/img/award/awards-4.svg" alt="..." />
            </div>
          </div>
          <div class="awards-card fade-animation" data-direction="bottom">
            <div class="awards-hover">
              <img src="assets/img/award/hover-img-5.png" alt="..." />
            </div>
            <h6 class="awards-title">05. Microsoft Award 2024</h6>
            <p class="awards-type">Honorable Mention</p>
            <p class="awards-category">Best Developer</p>
            <div class="awards-img">
              <img src="assets/img/award/awards-5.svg" alt="..." />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End  Awards-->

    <!-- Start Goal  -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <section class="ak-solidblack-bg">
      <div class="ak-height-150 ak-height-lg-80"></div>
      <div class="container">
        <div class="ak-section-heading ak-style-1 bg-black">
          <div class="ak-section-left">
            <h2 class="ak-section-title text-animation">
              <span
                class="highlight underline-anim text-white text-underline-white"
                >Our Goal
              </span>
              Maximizing Client
              <span class="highlight underline-anim text-underline"> ROI </span>
              Through Data-Driven
              <span
                class="highlight underline-anim text-white text-underline-white"
                >Campaigns</span
              >
            </h2>
          </div>
          <div class="ak-section-right">
            <div class="ak-section-caption">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="223"
                  height="12"
                  viewBox="0 0 223 12"
                  fill="none"
                >
                  <path
                    d="M1.33789 1.18359H221.034L209.173 10.9822"
                    stroke="#FF4A23"
                    stroke-linecap="round"
                  />
                </svg>
              </span>
              <span> Straight Goal </span>
            </div>
            <p class="ak-section-desp">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500s, when an unknown printer took a galley of
              type and scrambled.
            </p>
          </div>
        </div>
        <div class="ak-height-75 ak-height-lg-50"></div>
        <div class="progress-goal">
          <div class="progress-container">
            <div class="ak-skill-box type-2">
              <div class="ak-skill-text">
                <p class="ak-skill-title">UI/UX Design</p>
                <p class="ak-skill-per">95%</p>
              </div>
              <div class="ak-skill-bar">
                <div class="ak-skill-fill" data-percentage="95"></div>
              </div>
            </div>
            <div class="ak-skill-box type-2">
              <div class="ak-skill-text">
                <p class="ak-skill-title">Web Development</p>
                <p class="ak-skill-per">80%</p>
              </div>
              <div class="ak-skill-bar">
                <div class="ak-skill-fill" data-percentage="80"></div>
              </div>
            </div>
            <div class="ak-skill-box type-2">
              <div class="ak-skill-text">
                <p class="ak-skill-title">App Development</p>
                <p class="ak-skill-per">95%</p>
              </div>
              <div class="ak-skill-bar">
                <div class="ak-skill-fill" data-percentage="95"></div>
              </div>
            </div>
            <div class="ak-skill-box type-2">
              <div class="ak-skill-text">
                <p class="ak-skill-title">CMS Development</p>
                <p class="ak-skill-per">98%</p>
              </div>
              <div class="ak-skill-bar">
                <div class="ak-skill-fill" data-percentage="98"></div>
              </div>
            </div>
          </div>
          <div class="goal-circle-container">
            <div class="goal-circle">
              <div class="goal-circle-overlay">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="238"
                  height="237"
                  viewBox="0 0 238 237"
                  fill="none"
                >
                  <path
                    opacity="0.5"
                    d="M202.545 35.0658C180.23 12.7513 150.543 0.446655 119 0.446655C87.457 0.446655 57.7695 12.7513 35.4551 35.0658C13.1406 57.3802 0.835938 87.0677 0.835938 118.611C0.835938 150.154 13.1406 179.841 35.4551 202.156C57.7695 224.47 87.457 236.775 119 236.775C150.543 236.775 180.23 224.47 202.545 202.156C224.859 179.841 237.164 150.154 237.164 118.611C237.164 87.0677 224.859 57.3802 202.545 35.0658ZM36.8223 200.788C14.8984 178.816 2.78906 149.665 2.78906 118.611C2.78906 87.556 14.8984 58.4056 36.8223 36.433C53.082 20.1732 73.2969 9.33337 95.2695 4.79236C80.9629 10.2123 67.8281 20.515 57.0371 35.1635C40.582 57.4779 31.5 87.1166 31.5 118.611C31.5 150.105 40.582 179.744 57.0371 202.058C67.8281 216.658 80.9629 227.009 95.2695 232.429C73.2969 227.888 53.082 217.048 36.8223 200.788ZM33.4531 118.611C33.4531 58.8939 66.8027 9.52869 109.527 3.1322C101.178 7.86853 93.5605 18.9525 87.5059 35.4076C79.3027 57.6244 74.7617 87.2142 74.7617 118.611C74.7617 150.007 79.3027 179.597 87.5059 201.814C93.5605 218.269 101.178 229.353 109.527 234.089C66.8027 227.693 33.4531 178.328 33.4531 118.611ZM118.023 234.822C107.281 234.138 97.125 222.273 89.3125 201.179C81.1582 179.158 76.7148 149.861 76.7148 118.66C76.7148 87.4584 81.207 58.1615 89.3125 36.14C97.125 14.9974 107.281 3.1322 118.023 2.44861V234.822Z"
                    fill="url(#paint0_radial_2575_3352)"
                  />
                  <defs>
                    <radialGradient
                      id="paint0_radial_2575_3352"
                      cx="0"
                      cy="0"
                      r="1"
                      gradientUnits="userSpaceOnUse"
                      gradientTransform="translate(119 118.611) rotate(180) scale(95.8638 806.41)"
                    >
                      <stop stop-color="#FF4A23" offset="0%" />
                      <stop offset="1" stop-color="#FF4A23" stop-opacity="0" />
                    </radialGradient>
                  </defs>
                </svg>
              </div>
              <img
                src="assets/img/bg/goal-circle-overlay.png"
                alt="Team Working"
              />
            </div>
            <div class="goal-shape">
              <svg
                width="38"
                height="236"
                viewBox="0 0 38 236"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M2.43478 235.611C2.85261 235.611 3.26987 235.45 3.5898 235.132L33.1457 205.578C33.7768 204.946 33.7768 203.9 33.1457 203.269L5.92429 176.044L34.3456 147.624C34.9738 146.992 34.9738 145.953 34.3456 145.315L7.22382 118.204L35.7826 89.6482C36.4167 89.0101 36.4167 87.9751 35.7826 87.3393L8.55949 60.1168L36.9796 31.6978C37.6166 31.062 37.6166 30.0253 36.9796 29.3895L8.91846 1.33423C8.28326 0.696697 7.24306 0.696697 6.61019 1.33423C5.97441 1.97001 5.97441 3.00497 6.61019 3.6425L33.5128 30.5451L5.11485 58.9466C4.47849 59.5841 4.47849 60.6191 5.11485 61.2549C5.15797 61.298 5.20867 61.3137 5.25821 61.3505C5.31415 61.4285 5.34329 61.5195 5.41788 61.5882L32.324 88.4955L3.92371 116.896C3.5222 117.299 3.40389 117.854 3.50821 118.373C3.49772 118.803 3.64865 119.244 3.9779 119.574L30.8916 146.484L2.47325 174.876C1.84097 175.508 1.84097 176.553 2.47325 177.185C2.51987 177.229 2.57231 177.252 2.61776 177.274C2.67662 177.35 2.70635 177.446 2.78094 177.51L29.683 204.418L1.28327 232.813C0.64516 233.451 0.64516 234.487 1.28327 235.122C1.59388 235.456 2.01171 235.611 2.43478 235.611Z"
                  fill="url(#paint0_radial_2575_334645662)"
                />
                <defs>
                  <radialGradient
                    id="paint0_radial_2575_334645662"
                    cx="0"
                    cy="0"
                    r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(19.131 118.233) rotate(180) scale(14.8677 801.041)"
                  >
                    <stop stop-color="#FF4A23" offset="0%" />
                    <stop offset="1" stop-color="#FF4A23" stop-opacity="0" />
                  </radialGradient>
                </defs>
              </svg>
              <svg
                width="38"
                height="236"
                viewBox="0 0 38 236"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M2.43478 235.611C2.85261 235.611 3.26987 235.45 3.5898 235.132L33.1457 205.578C33.7768 204.946 33.7768 203.9 33.1457 203.269L5.92429 176.044L34.3456 147.624C34.9738 146.992 34.9738 145.953 34.3456 145.315L7.22382 118.204L35.7826 89.6482C36.4167 89.0101 36.4167 87.9751 35.7826 87.3393L8.55949 60.1168L36.9796 31.6978C37.6166 31.062 37.6166 30.0253 36.9796 29.3895L8.91846 1.33423C8.28326 0.696697 7.24306 0.696697 6.61019 1.33423C5.97441 1.97001 5.97441 3.00497 6.61019 3.6425L33.5128 30.5451L5.11485 58.9466C4.47849 59.5841 4.47849 60.6191 5.11485 61.2549C5.15797 61.298 5.20867 61.3137 5.25821 61.3505C5.31415 61.4285 5.34329 61.5195 5.41788 61.5882L32.324 88.4955L3.92371 116.896C3.5222 117.299 3.40389 117.854 3.50821 118.373C3.49772 118.803 3.64865 119.244 3.9779 119.574L30.8916 146.484L2.47325 174.876C1.84097 175.508 1.84097 176.553 2.47325 177.185C2.51987 177.229 2.57231 177.252 2.61776 177.274C2.67662 177.35 2.70635 177.446 2.78094 177.51L29.683 204.418L1.28327 232.813C0.64516 233.451 0.64516 234.487 1.28327 235.122C1.59388 235.456 2.01171 235.611 2.43478 235.611Z"
                  fill="url(#paint0_radial_2574355_3362)"
                />
                <defs>
                  <radialGradient
                    id="paint0_radial_2574355_3362"
                    cx="0"
                    cy="0"
                    r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(19.131 118.233) rotate(180) scale(14.8677 801.041)"
                  >
                    <stop stop-color="#FF4A23" offset="0%" />
                    <stop offset="1" stop-color="#FF4A23" stop-opacity="0" />
                  </radialGradient>
                </defs>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="ak-height-150 ak-height-lg-80"></div>
    </section>
    <!-- End Goal  -->

    <!-- Start Testmonial -->
    <section>
      <div class="container">
        <div class="testmonial-slider ak-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testmonial-content style-1">
                <div class="testmonial-card">
                  <div class="ak-height-100 ak-height-lg-50"></div>
                  <p class="testmonial-desp">
                    “Working with them has been an absolute game-changer for our
                    business. Their innovative strategies, coupled with their
                    deep understanding of our industry, have significantly
                    boosted our online presence.”
                  </p>
                  <div class="ak-height-50 ak-height-lg-30"></div>
                  <div class="testmonial-info">
                    <img
                      class="testmonial-img"
                      src="assets/img/testmonial/testmonial-1.png"
                      alt=".."
                    />
                    <h6 class="testmonial-title">Mostahid Jackma</h6>
                    <p class="testmonial-shot-desp">From USA</p>
                  </div>
                  <div class="ak-height-100 ak-height-lg-50"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testmonial-content style-1">
                <div class="testmonial-card">
                  <div class="ak-height-100 ak-height-lg-50"></div>
                  <p class="testmonial-desp">
                    “Working with them has been an absolute game-changer for our
                    business. Their innovative strategies, coupled with their
                    deep understanding of our industry, have significantly
                    boosted our online presence.”
                  </p>
                  <div class="ak-height-50 ak-height-lg-30"></div>
                  <div class="testmonial-info">
                    <img
                      class="testmonial-img"
                      src="assets/img/testmonial/testmonial-2.png"
                      alt=".."
                    />
                    <h6 class="testmonial-title">Morgan Brown</h6>
                    <p class="testmonial-shot-desp">From USA</p>
                  </div>
                  <div class="ak-height-100 ak-height-lg-50"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testmonial-content style-1">
                <div class="testmonial-card">
                  <div class="ak-height-100 ak-height-lg-50"></div>
                  <p class="testmonial-desp">
                    “Working with them has been an absolute game-changer for our
                    business. Their innovative strategies, coupled with their
                    deep understanding of our industry, have significantly
                    boosted our online presence.”
                  </p>
                  <div class="ak-height-50 ak-height-lg-30"></div>
                  <div class="testmonial-info">
                    <img
                      class="testmonial-img"
                      src="assets/img/testmonial/testmonial-1.png"
                      alt=".."
                    />
                    <h6 class="testmonial-title">Mostahid Jackma</h6>
                    <p class="testmonial-shot-desp">From USA</p>
                  </div>
                  <div class="ak-height-100 ak-height-lg-50"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testmonial-content style-1">
                <div class="testmonial-card">
                  <div class="ak-height-100 ak-height-lg-50"></div>
                  <p class="testmonial-desp">
                    “Working with them has been an absolute game-changer for our
                    business. Their innovative strategies, coupled with their
                    deep understanding of our industry, have significantly
                    boosted our online presence.”
                  </p>
                  <div class="ak-height-50 ak-height-lg-30"></div>
                  <div class="testmonial-info">
                    <img
                      class="testmonial-img"
                      src="assets/img/testmonial/testmonial-2.png"
                      alt=".."
                    />
                    <h6 class="testmonial-title">Morgan Brown</h6>
                    <p class="testmonial-shot-desp">From USA</p>
                  </div>
                  <div class="ak-height-100 ak-height-lg-50"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="testmonial-swiper-controller">
          <div class="testmonial-button-prev">
            <div>
              <span class="svg-icon">
                <i class="flaticon-left-up"></i>
              </span>
              <span> Previous </span>
            </div>
          </div>
          <div class="testmonial-button-next">
            <div>
              <span> Next </span>
              <span class="svg-icon">
                <i class="flaticon-up-right-arrow"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Testmonial -->

    <!-- Start  funfact -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <div class="container">
      <div class="funfact-content">
        <div class="funfact style1">
          <div class="funfact-card style-1">
            <div class="funfact-number">
              <span id="count1" class="amin_auto_count">65</span>
              <span>K</span>
            </div>
            <p class="funfact-text">Project Completed</p>
          </div>
        </div>
        <div class="funfact style1">
          <div class="funfact-card style-1">
            <div class="funfact-number">
              <span id="count2" class="amin_auto_count">8</span>
              <span>K</span>
            </div>
            <p class="funfact-text">Happy Customers</p>
          </div>
        </div>

        <div class="funfact style1">
          <div class="funfact-card style-1">
            <div class="funfact-number">
              <span id="count3" class="amin_auto_count">32</span>
              <span>+</span>
            </div>
            <p class="funfact-text">Years of Experience</p>
          </div>
        </div>
        <div class="funfact style1">
          <div class="funfact-card style-1">
            <div class="funfact-number">
              <span id="count4" class="amin_auto_count">13</span>
            </div>
            <p class="funfact-text">Award Achievement</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End funfact -->

    <!-- Start Core Feature -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <section class="core-features-area ak-solidblack-bg">
      <div class="ak-height-150 ak-height-lg-80"></div>
      <div class="container">
        <div class="ak-section-heading ak-style-1 bg-black">
          <div class="ak-section-left">
            <h2 class="ak-section-title text-animation">
              Our <span class="highlight">Exceptional</span> Digital
              Transformation <span class="highlight">Services</span>
            </h2>
          </div>
          <div class="ak-section-right">
            <p class="ak-section-desp">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. has been industry and typesetting of the printing .
            </p>
            <div class="ak-section-caption">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="223"
                  height="12"
                  viewBox="0 0 223 12"
                  fill="none"
                >
                  <path
                    d="M1.33789 1.18359H221.034L209.173 10.9822"
                    stroke="#FF4A23"
                    stroke-linecap="round"
                  />
                </svg>
              </span>
              <span> Services </span>
            </div>
          </div>
        </div>
        <div class="ak-height-75 ak-height-lg-50"></div>
        <div class="core-features ak-slider slider-two">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="core-feature-card type-1 style-2">
                <div class="b-top-left">
                  <div class="horizontal"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-top-right d-flex">
                  <div class="horizontal"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-bottom-right d-flex flex-end">
                  <div class="horizontal flex-end align-self-end"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-bottom-left">
                  <div class="verticle"></div>
                  <div class="horizontal"></div>
                </div>
                <div class="icon">
                  <i class="flaticon-circle"></i>
                </div>
                <h6 class="core-feature-title">Strategic Marketing</h6>
                <p class="core-feature-desp">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been industry.
                </p>
                <p class="core-feature-number">01</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="core-feature-card type-1 style-2">
                <div class="b-top-left">
                  <div class="horizontal"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-top-right d-flex">
                  <div class="horizontal"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-bottom-right d-flex flex-end">
                  <div class="horizontal flex-end align-self-end"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-bottom-left">
                  <div class="verticle"></div>
                  <div class="horizontal"></div>
                </div>
                <div class="icon">
                  <i class="flaticon-folded"></i>
                </div>
                <h6 class="core-feature-title">Strategic Marketing</h6>
                <p class="core-feature-desp">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been industry.
                </p>
                <p class="core-feature-number">02</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="core-feature-card type-1 style-2">
                <div class="b-top-left">
                  <div class="horizontal"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-top-right d-flex">
                  <div class="horizontal"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-bottom-right d-flex flex-end">
                  <div class="horizontal flex-end align-self-end"></div>
                  <div class="verticle"></div>
                </div>
                <div class="b-bottom-left">
                  <div class="verticle"></div>
                  <div class="horizontal"></div>
                </div>
                <div class="icon">
                  <i class="flaticon-twirl"></i>
                </div>
                <h6 class="core-feature-title">Strategic Marketing</h6>
                <p class="core-feature-desp">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been industry.
                </p>
                <p class="core-feature-number">03</p>
              </div>
            </div>
          </div>
        </div>
        <div class="core-features-swiper-pagination"></div>
      </div>
      <div class="ak-height-150 ak-height-lg-80"></div>
    </section>
    <!-- Start Core Feature -->

    <!-- Start Team  -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <section>
      <div class="container">
        <div class="ak-section-heading ak-style-1">
          <div class="ak-section-left">
            <h2 class="ak-section-title text-animation">
              Our <span class="highlight">Exceptional</span> Digital Industrial
              <span class="highlight">Team Members</span>
            </h2>
          </div>
          <div class="ak-section-right">
            <p class="ak-section-desp">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. has been industry and typesetting of the printing .
            </p>
            <div class="ak-section-caption">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="223"
                  height="12"
                  viewBox="0 0 223 12"
                  fill="none"
                >
                  <path
                    d="M1.33789 1.18359H221.034L209.173 10.9822"
                    stroke="#FF4A23"
                    stroke-linecap="round"
                  />
                </svg>
              </span>
              <span> 426+ Team Members </span>
            </div>
          </div>
        </div>
      </div>
      <div class="ak-height-75 ak-height-lg-50"></div>
      <div class="team-swiper-controller">
        <div class="team-logs-scrollbar"></div>
        <div class="team-logs-navigation">
          <div class="team-logs-button-prev">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="10"
              viewBox="0 0 28 10"
              fill="none"
            >
              <g clip-path="url(#clip0_2272f3423_379)">
                <path
                  d="M0.716728 5.58228L6.17073 1.58728V5.24028L26.5947 5.58228L6.17073 5.92428V9.57728L0.716728 5.58228Z"
                  fill="#353535"
                />
              </g>
              <defs>
                <clipPath id="clip0_2272f3423_379">
                  <rect
                    width="27"
                    height="9"
                    fill="white"
                    transform="matrix(-1 0 0 1 27.4551 0.949463)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="team-logs-button-next">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="10"
              viewBox="0 0 28 10"
              fill="none"
            >
              <g clip-path="url(#clip0_2272_374345)">
                <path
                  d="M27.1934 5.58228L21.7394 1.58728V5.24028L1.31543 5.58228L21.7394 5.92428V9.57728L27.1934 5.58228Z"
                  fill="#353535"
                />
              </g>
              <defs>
                <clipPath id="clip0_2272_374345">
                  <rect
                    width="27"
                    height="9"
                    fill="white"
                    transform="translate(0.455078 0.949463)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
        </div>
      </div>
      <div class="mt-4 ak-slider ak-team-slider">
        <div
          class="swiper-wrapper row row-cols-1 row-cols-md-5 mx-auto flex-nowrap"
        >
          <div class="swiper-slide">
            <a href="#" class="border-0 team-card">
              <div class="team-img-top">
                <img src="assets/img/team/team-1.png" alt="..." />
                <div class="team-social-icon">
                  <span class="icon">
                    <i class="flaticon-facebook-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-instagram-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-twitter"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-linkedin"></i>
                  </span>
                </div>
              </div>
              <div class="team-body">
                <h6 class="team-title">Alex Johnson</h6>
                <p class="team-text">Creative Director</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="border-0 team-card">
              <div class="team-img-top">
                <img src="assets/img/team/team-2.png" alt="..." />
                <div class="team-social-icon">
                  <span class="icon">
                    <i class="flaticon-facebook-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-instagram-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-twitter"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-linkedin"></i>
                  </span>
                </div>
              </div>
              <div class="team-body">
                <h6 class="team-title">Taylor Smith</h6>
                <p class="team-text">Graphic Designer</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="border-0 team-card">
              <div class="team-img-top">
                <img src="assets/img/team/team-3.png" alt="..." />
                <div class="team-social-icon">
                  <span class="icon">
                    <i class="flaticon-facebook-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-instagram-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-twitter"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-linkedin"></i>
                  </span>
                </div>
              </div>
              <div class="team-body">
                <h6 class="team-title">Jamie Lee</h6>
                <p class="team-text">Art Director</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="border-0 team-card">
              <div class="team-img-top">
                <img src="assets/img/team/team-4.png" alt="..." />
                <div class="team-social-icon">
                  <span class="icon">
                    <i class="flaticon-facebook-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-instagram-logo"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-twitter"></i>
                  </span>
                  <span class="icon">
                    <i class="flaticon-linkedin"></i>
                  </span>
                </div>
              </div>
              <div class="team-body">
                <h6 class="team-title">Morgan Brown</h6>
                <p class="team-text">UX/UI Designer</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Start Team  -->

    <!-- Start Client Logo -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <section class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h6 class="w-25">Our Trusted Partner</h6>
        <div class="ak-border-width w-75"></div>
      </div>
      <div class="ak-slider client-logo-slider">
        <div
          class="swiper-wrapper row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 flex-nowrap"
        >
          <div class="swiper-slide">
            <div class="client-logo border-0">
              <img src="assets/img/client/client-1.png" alt="" />
              <div class="client-info">
                <h6 class="client-title">Credesign</h6>
                <p class="client-shot-title">Portfolio Template</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client-logo border-0">
              <img src="assets/img/client/client-2.png" alt="" />
              <div class="client-info">
                <h6 class="client-title">Vixan Dev</h6>
                <p class="client-shot-title">Portfolio Template</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client-logo border-0">
              <img src="assets/img/client/client-3.png" alt="" />
              <div class="client-info">
                <h6 class="client-title">Enfhess Star</h6>
                <p class="client-shot-title">NFT Market Star Point</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client-logo border-0">
              <img src="assets/img/client/client-1.png" alt="" />
              <div class="client-info">
                <h6 class="client-title">Credesign</h6>
                <p class="client-shot-title">Portfolio Template</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client-logo border-0">
              <img src="assets/img/client/client-4.png" alt="" />
              <div class="client-info">
                <h6 class="client-title">Fingcon Con</h6>
                <p class="client-shot-title">Consulting Hub GloBAL</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <div class="ak-border-width w-75"></div>
        <div class="d-flex gap-3">
          <div class="arrow-circle-btn prev client-logo-prev">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="10"
              viewBox="0 0 28 10"
              fill="none"
            >
              <g clip-path="url(#clip0_2423272_379)">
                <path
                  d="M0.716728 5.58228L6.17073 1.58728V5.24028L26.5947 5.58228L6.17073 5.92428V9.57728L0.716728 5.58228Z"
                  fill="#353535"
                />
              </g>
              <defs>
                <clipPath id="clip0_2423272_379">
                  <rect
                    width="27"
                    height="9"
                    fill="white"
                    transform="matrix(-1 0 0 1 27.4551 0.949463)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="arrow-circle-btn next client-logo-next">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="10"
              viewBox="0 0 28 10"
              fill="none"
            >
              <g clip-path="url(#clip0_2272434234_376)">
                <path
                  d="M27.1934 5.58228L21.7394 1.58728V5.24028L1.31543 5.58228L21.7394 5.92428V9.57728L27.1934 5.58228Z"
                  fill="#353535"
                />
              </g>
              <defs>
                <clipPath id="clip0_2272434234_376">
                  <rect
                    width="27"
                    height="9"
                    fill="white"
                    transform="translate(0.455078 0.949463)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
        </div>
      </div>
    </section>
    <!-- End Client Logo -->

    <!-- Start Newsletter -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <section class="container">
      <div class="newsletter-content style-2">
        <div class="newsletter-title-content text-animation">
          <h2 class="newsletter-title">
            Join Our
            <span class="highlight text-underlines underline-anim">
              Newsletter</span
            >
            for the Latest
            <span class="highlight">Exclusive</span> Content
          </h2>
        </div>

        <form class="newsletter-form">
          <input
            type="email"
            class="newsletter-input style-2"
            placeholder="Enter your email..."
            required
          />
          <button type="submit" class="newsletter-btn">
            <span class="newbtn-text"> Newsletter </span>
            <span class="primary-icon-anim">
              <i class="flaticon-up-right-arrow"></i>
              <i class="flaticon-up-right-arrow"></i>
            </span>
          </button>
        </form>
      </div>
    </section>
    <!-- End Newsletter -->

   @endsection