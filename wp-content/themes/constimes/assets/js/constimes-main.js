/*
Theme Name: Consulting Business WordPress Theme
Theme URI: https://themeforest.net/item/constimes-consulting-business-figma-template/43743481?s_rank=2
Design by: techsometimes
Developed by: A N Abdullah Al Numan
Version: 1.0
License: 
Tags: 
*/

(($) => {
  ("use strict");

  menuBar();

  bgImg();

  myIcon();

  venoBox();

  myProgressBar();

  animeCounterUp();

  clientsReview();

  wow();

  mySelect();

  postSlider();

  preloderOption();

  bottomToTop();

  /*====== Active Plugins ======

        1 Menu Bar

        2 BG Img

        3 My Icon

        4 VenoBox

        5 My Progress Bar

        6 Anime Counter Up

        7 Clients Review

        8 Anime Wow

        9 My Select

        10 Post Slider

        11 Preloder Option

        12 Bottom To Top

    =============================*/

  /*=====================
        1 Menu Bar
    =======================*/

  function menuBar() {
    let copyMenuLogo = $(".menu-bar .menu-logo").html();
    let copyMenuList = $(".menu-bar .main-menu").html();
    let copySLink = $(".top-bar .social-link").html();

    $(".menu-bar .mobile-menu-btn").parent().append(`
        <div class="mobile-menu">
          <div class="mobile-header">
            <div class="mobile-logo">
            ${copyMenuLogo}
            </div>
              <button class="close-mobile-btn"><span class="my-icon icon-angle-arrow-left"></span></button>
            </div>
            <div class="mobile-overflow">
              <nav class="main-manu">
                ${copyMenuList}
              </nav>
              <div class="socials-links">
                ${copySLink}
              </div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div>
      `);

    $(".menu-bar .mobile-menu-btn").on("click", function () {
      $(this).addClass("active");
      $(this).nextAll().addClass("active");
    });

    $(".menu-bar .close-mobile-btn").on("click", function () {
      $(this).parent().parent().removeClass("active");
      $(this).parent().parent().prev().removeClass("active");
      $(this).parent().parent().next().removeClass("active");
    });

    $(".menu-bar .mobile-menu-overlay").on("click", function () {
      $(this).removeClass("active");
      $(this).prev().prev().removeClass("active");
      $(this).prev().removeClass("active");
    });

    $(".mobile-menu .main-manu").on("click", "li a", function (e) {
      const { target } = e;
      const href = target.getAttribute("href");
      const isExpand = target.classList.contains("menu-expand");
      if (href === "#" || isExpand) {
        e.preventDefault();
        const $parent = $(target).parent("li");
        const $siblings = $parent.siblings("li");
        const isActive = $parent.hasClass("active");
        if (isActive) {
          $parent.removeClass("active");
          $(target).siblings("ul").slideUp();
        } else {
          $parent.addClass("active");
          $siblings.removeClass("active").find("li").removeClass("active");
          $siblings.find("ul:visible").slideUp();
          $(target).siblings("ul").slideDown();
        }
      }
    });

    const handleScroll = () => {
      const $this = $(window);
      const $wpAdminbar = $("#wpadminbar");
      const $topBar = $(".top-bar");
      const $menuBar = $(".menu-bar");
      const topBarHeight = $topBar.outerHeight();
      const menuBarHeight = $menuBar.outerHeight();
      const wpBarHeight = $wpAdminbar.outerHeight();

      if ($("header").hasClass("login")) {
        if ($this.scrollTop() > topBarHeight) {
          $topBar.add($menuBar).addClass("sticky-header");
          $topBar.css({ "margin-top": menuBarHeight });
          $menuBar.css({ top: wpBarHeight });
        } else {
          $topBar.add($menuBar).removeClass("sticky-header");
          $topBar.css({ "margin-top": "auto" });
          $menuBar.css({ top: "auto" });
        }
      } else {
        if ($this.scrollTop() > topBarHeight) {
          $topBar.add($menuBar).addClass("sticky-header");
          $topBar.css({ "margin-top": menuBarHeight });
        } else {
          $topBar.add($menuBar).removeClass("sticky-header");
          $topBar.css({ "margin-top": "auto" });
        }
      }
    };

    $(window).on("scroll", handleScroll);
  }

  /*=====================
        2 BG Img
    =======================*/
  function bgImg() {
    document.querySelectorAll("[data-background]").forEach((element) => {
      element.style.backgroundImage = `url(${element.getAttribute(
        "data-background"
      )})`;
    });
  }

  /*=====================
        3 My Icon
    =======================*/
      function myIcon() {
        $(".my-icon.icon-book-pen").each(function () {
          $(this).html(`<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>`);
        });

        $(".my-icon.icon-circle").each(function () {
          $(this).html(`<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span>`);
        });

        $(".my-icon.icon-m-setting").each(function () {
          $(this).html(`<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>`);
        });

        $(".my-icon.icon-group-icon-1").each(function () {
          $(this).html(`<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>`);
        });
        
        $(".my-icon.icon-group-icon-2 , .my-icon.icon-group-icon-9").each(function () {
          $(this).html(`<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>`);
        });

      }

  /*=====================
        4 VenoBox
    =======================*/
  function venoBox() {
    new VenoBox();
  }

  /*========================
        5 My Progress Bar
    =======================*/

  function myProgressBar() {
    const $progressElements = $(".my-progress-bar .progress-vale");

    function animateElement() {
      $progressElements.each(function () {
        anime({
          targets: this,
          width: [
            `${parseInt(this.dataset.progressMinWidth)}%`,
            `${parseInt(this.dataset.progressMaxWidth)}%`,
          ],
          round: 1,
          easing: "linear",
          duration: parseInt(this.dataset.progressDuration) || 1000,
          delay: parseInt(this.dataset.progressDelay) || 500,
        });
      });
    }

    const isElementInViewport = (el) => {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
          (window.innerWidth || document.documentElement.clientWidth)
      );
    };

    const handleScroll = () => {
      $progressElements.each(function () {
        if (isElementInViewport(this)) {
          animateElement();
          $(window).off("scroll", handleScroll);
        }
      });
    };

    $(window).on("scroll", handleScroll);
  }

  /*========================
        6 Anime Counter Up
    =======================*/

  function animeCounterUp() {
    const $counterElements = $(".counter");

    function animateElement() {
      $counterElements.each(function () {
        anime({
          targets: this,
          innerHTML: [
            parseInt(this.dataset.countMin) || 0,
            parseInt(this.dataset.countMax),
          ],
          round: 1,
          easing: "linear",
          duration: parseInt(this.dataset.countDuration) || 1000,
          delay: parseInt(this.dataset.countDelay) || 500,
        });
      });
    }

    const isElementInViewport = (el) => {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
          (window.innerWidth || document.documentElement.clientWidth)
      );
    };

    const handleScroll = () => {
      $counterElements.each(function () {
        if (isElementInViewport(this)) {
          animateElement();
          $(window).off("scroll", handleScroll);
        }
      });
    };

    $(window).on("scroll", handleScroll);
  }

  /*=====================
        7 Clients Review
    =======================*/
  function clientsReview() {
    let clientsReviewSlider1 = new Swiper(".clients-review.v1 .slider", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      navigation: {
        prevEl: ".prev-btn",
        nextEl: ".next-btn",
      },
      breakpoints: {
        300: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
          centeredSlides: true,
        },
      },
    });

    let clientsReviewSlider2 = new Swiper(".clients-review.v2 .slider", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      navigation: {
        prevEl: ".prev-btn",
        nextEl: ".next-btn",
      },
      breakpoints: {
        300: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
          centeredSlides: true,
        },
      },
    });
  }

  /*=====================
        8 Anime Wow
    =======================*/

  function wow() {
    wow = new WOW({
      animateClass: "animate__animated",
      offset: 0,
    });
    wow.init();
  }

  /*=====================
        9 My Select
    =======================*/
  function mySelect() {
    const $mySelectElements = $("select");

    $mySelectElements.each((index, selectElement) => {
      const $mySelectContainer = $("<div>").addClass("my-select");

      const $selectedOption = $("<button>")
        .addClass("current")
        .attr("type", "button")
        .html(selectElement.options[selectElement.selectedIndex].innerHTML);

      const $optionsList = $("<ul>").addClass("list");

      for (const option of selectElement.options) {
        const $myOption = $("<li>").html(option.innerHTML);
        $myOption.on("click", () => {
          $selectedOption.html(option.innerHTML);
          $optionsList.removeClass("open");
          $selectedOption.removeClass("open");
        });
        $optionsList.append($myOption);
      }

      $selectedOption.on("click", () => {
        $optionsList.toggleClass("open");
        $selectedOption.toggleClass("open");
      });

      $mySelectContainer.append($selectedOption);
      $mySelectContainer.append($optionsList);
      $(selectElement).before($mySelectContainer).hide();

      // Hide options when user clicks outside of select
      $(document).on("click", (event) => {
        if (
          !$mySelectContainer.is(event.target) &&
          $mySelectContainer.has(event.target).length === 0
        ) {
          $optionsList.removeClass("open");
          $selectedOption.removeClass("open");
        }
      });
    });
  }

  /*=====================
      10 Post Slider
    =======================*/

  function postSlider() {
    let postCardSlider = new Swiper(".blog-post .slider", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      navigation: {
        prevEl: ".prev-btn",
        nextEl: ".next-btn",
      },
    });
  }


  /*=====================
        11 Preloder Option
    =======================*/
  function preloderOption() {
    $("body .preloder").prepend(`
        <svg viewBox="0 0 102 102" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path class="big-circle" d="M101 51C101 78.6142 78.6142 101 51 101C23.3858 101 1 78.6142 1 51"/>
				<path class="small-circle" d="M91 51C91 28.9086 73.0914 11 51 11C28.9086 11 11 28.9086 11 51"/>
			</svg>`);

    const preloader = $("body .preloder");

    $(window).on("load", () => {
      anime({
        targets: preloader[0],
        opacity: [1, 0],
        easing: "easeInOutQuad",
        duration: 400,
        delay: 300,
        complete: () => {
          preloader.remove();
        },
      });
    });
  }

  /*============================
        12 Bottom To Top
    =============================*/

  function bottomToTop() {

    const scrollTop = $(".scroll-bottom-Top");
    const sectionScrollHeight = $("main section").first().outerHeight();
    const topBarHeight = $(".top-bar").outerHeight();

    $(window).scroll(() => {
      if ($(window).scrollTop() > sectionScrollHeight+topBarHeight) {
        scrollTop.addClass("show");
      } else {
        scrollTop.removeClass("show");
      }
    });

    scrollTop.on("click", (e) => {
      e.preventDefault();
      anime({
        targets: "html, body",
        scrollTop: 0,
        easing: "easeInOutCubic",
        duration: 1000,
      });
    });
  }
})(jQuery);

