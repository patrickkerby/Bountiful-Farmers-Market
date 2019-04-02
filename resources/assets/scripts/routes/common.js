export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $(document).ready(function(){
      $('.grid-layout').slickLightbox({
        itemSelector: '> div > a',
      });
      $('.gallery').slickLightbox({
        itemSelector: '> div > a',
      });
    });      
  },
};
