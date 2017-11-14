function showCampagneMessage() {

  if (location.search.indexOf('actie') > 0) {
    jQuery('.campagnemelding').show();
    setTimeout(function(){
      jQuery('.campagnemelding').hide();
    }, 8 * 1000);
  }
}

function resize_news_on_frontpage() {
  console.log(jQuery('.tb-posts-carousel').height());
  console.log(jQuery('.slick-track').height());
//  jQuery('.tb-posts-carousel .slick-slide').css({ height: jQuery('.tb-posts-carousel').height() + 'px'});
}

jQuery(document).ready(function() {
  showCampagneMessage();
//  resize_news_on_frontpage();

  jQuery('div.wrap-twitter .absolutecenter-stretch > div:nth-child(2)').css({width: '100%'});

});
