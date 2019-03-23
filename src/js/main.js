/* jshint esversion: 6, browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document */

// Import dependencies
import lazySizes from 'lazysizes';
import smoothscroll from 'smoothscroll-polyfill';

// Import style
import '../styl/site.styl';

class Site {
  constructor() {
    this.mobileThreshold = 601;

    this.handleScrollNav = this.handleScrollNav.bind(this);
    this.updateActiveCarouselItem = this.updateActiveCarouselItem.bind(this);

    $(window).resize(this.onResize.bind(this));

    $(document).ready(this.onReady.bind(this));

  }

  onResize() {

  }

  onReady() {
    lazySizes.init();
    //smoothscroll.polyfill();
    this.bindScrollNav();
    this.initCarousel();
  }

  fixWidows() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  }

  bindScrollNav() {
    $('.nav-item').on('click', this.handleScrollNav);
  }

  handleScrollNav(event) {
    const sectionId = $(event.target).attr('data-id');
    const section = document.getElementById(sectionId);

    section.scrollIntoView();
  }

  initCarousel() {
    if ($('.carousel-item').length) {
      this.carouselLength = $('.carousel-item').length;
      this.activeCarouselIndex = 0;

      setInterval(this.updateActiveCarouselItem, 10000);
    }
  }

  updateActiveCarouselItem() {
    $('.carousel-item[data-index="' + this.activeCarouselIndex + '"]').removeClass('active');

    if (this.activeCarouselIndex === (this.carouselLength - 1)) {
      this.activeCarouselIndex = 0;
    } else {
      this.activeCarouselIndex++;
    }

    $('.carousel-item[data-index="' + this.activeCarouselIndex + '"]').addClass('active');
  }
}

new Site();
