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

    $(window).resize(this.onResize.bind(this));

    $(document).ready(this.onReady.bind(this));

  }

  onResize() {

  }

  onReady() {
    lazySizes.init();
    smoothscroll.polyfill();
    this.bindScrollNav();
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

    section.scrollIntoView({ behavior: 'smooth' });
  }
}

new Site();
