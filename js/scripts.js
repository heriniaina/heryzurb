(function ($, Drupal) {
    Drupal.behaviors.STARTER = {
        attach: function (context, settings) {
            // Get your Yeti started.

            jQuery('.cycle-slideshow').cycle({
                fx: "fade"
            });
            jQuery('section.block-views-flash-info-block .view-content').cycle({
                fx: "scrollHorz",
                slides: "> div"
            });
            jQuery('section.block-block.block-block-2 p').cycle({
                fx: "tileBlind"
            });
            jQuery('section.block-block.block-block-3 p').cycle({
                fx: "tileBlind"
            });
            jQuery('section.block-block.block-block-4 p').cycle({
                fx: "tileBlind"
            });


            jQuery('a').filter(function () {
                if (typeof $(this).attr('href') !== 'undefined') {
                    return $(this).attr('href').match(/\.(jpg|png|gif)/i);
                }
                ;
            }).attr('rel', 'gallery').fancybox({
                prevEffect: 'none',
                nextEffect: 'none',
                helpers: {
                    title: {
                        type: 'inside'
                    },
                    thumbs: {
                        width: 50,
                        height: 50
                    }
                },
                beforeShow: function () {
                    var alt = this.element.find('img').attr('alt');
                    this.inner.find('img').attr('alt', alt);
                    this.title = alt;
                }

            });
        }
    };

})(jQuery, Drupal);
