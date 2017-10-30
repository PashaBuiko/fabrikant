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


            if (! $('.main_rating .average_display').length ) {
                $( "<span class='average_display'></span>" ).insertBefore( $( ".main_rating .fivestar-widget-5" ) );
            }
            $(".main_rating .average_display").text($('.main_rating .average_value').text()+"/ " );


          /*  if (! $('.rating_comment .average_display').length ) {
                $( "<span class='average_display'></span>" ).insertBefore( $( ".rating_comment .fivestar-widget-5" ) );
            }
            $(".rating_comment .average_display").text($('.rating_comment .average_value').text()+"/ " );


             $('.company-navigation a.active').parent().addClass('active').children().removeClass('active');
*/

             ///// tabs in company node

            /*$('.company-navigation  li a').click(function (e) {
                e.preventDefault();
                $('.company-navigation ul  li').removeClass('active');
                $(this).parent().addClass('active');
                var id = $(this).parent().attr('class').split(' ',1 )[0];
                $('.node-company .tab').removeClass('active');

                switch (id){
                    case 'menu-577' :   $('.node-company .tab1').addClass('active');     break;
                    case 'menu-565' :   $('.node-company .tab2').addClass('active');     break;
                    case 'menu-566' :   $('.node-company .tab3').addClass('active');     break;
                    case 'menu-567' :   $('.node-company .tab4').addClass('active');     break;
                    case 'menu-569' :   $('.node-company .tab5').addClass('active');     break;
                }
            });
*/

            $('.tab2 .term_tree span').once().bind('click', function(){
                    $(this).parent().toggleClass('open');
                    if ($(this).parent().hasClass('open') ){
                        console.log('open');
                        $(this).text('-')
                    }
                    else{
                        console.log('qwerty');
                        $(this).text('+');
                    }
            });
            if ( ! $('.login').length ) {
                $(' <a href="/" class="login">Войти </a>').once().insertAfter($('#edit-author--2 a'));
            }






            $('.tab2 .term_tree a').once().bind('click', function(e){
                e.preventDefault();
                var id_term = $(this).attr('id');
                $("#edit-term-node-tid-depth [value='"+id_term+"']").attr("selected", "selected");
                $('#edit-submit-company-goods').click();
                $('.entry-text').removeClass()

            });

            $('.tab2 .term_tree li .list-tree-element ').click(function () {
                $('.tab2 .term_tree li .list-tree-element').removeClass('active');
                $(this).addClass('active');
            })
            $('.view-company-goods.view-display-id-page_1 .views-field-title .field-content > a').remove();

            term_21 = $('.tid-21').attr('src');
            term_22 = $('.tid-22').attr('src');
            term_23 = $('.tid-23').attr('src');
            term_24 = $('.tid-24').attr('src');

            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(1).once().find('label').prepend('<img src='+term_21+'>');
            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(2).once().find('label').prepend('<img src='+term_22+'>');
            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(3).once().find('label').prepend('<img src='+term_23+'>');
            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(4).once().find('label').prepend('<img src='+term_24+'>');



        }
    };
})(jQuery);