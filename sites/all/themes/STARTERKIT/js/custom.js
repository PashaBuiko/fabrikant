(function ($) {
    Drupal.behaviors.THEMENAME = {
        attach: function(context, settings) {
            /*Add your js code here*/
            $('.view-view-industry #edit-field-list-category-value label ').click(function(){
                  $(this).parent().children().eq(0).click();
                  $(' #edit-submit-view-industry ').click();
            });

            $(' .view-economic-news #edit-field-list-category-value label ').click(function(){
                $(this).parent().children().eq(0).click();
                $(' #edit-submit-economic-news ').click();
            });

            $('.season-goods .slick-arrow').click(function () {
                 var date = $('.season-goods .slick-current').attr('data');
                 $('#edit-field-date-value-value-datepicker-popup-0').text(date);
                 $('#edit-field-date-value-value-datepicker-popup-0').val(date);
                 $('#edit-submit-season-goods').click();

            })



            if (! $('.average_display').length ) {
                $( "<span class='average_display'></span>" ).insertBefore( $( ".fivestar-widget-5" ) );
            }
            $(".average_display").text($('.average_value').text()+"/ " );


             $('.company-navigation a.active').parent().addClass('active').children().removeClass('active');

        }
    };
})(jQuery);