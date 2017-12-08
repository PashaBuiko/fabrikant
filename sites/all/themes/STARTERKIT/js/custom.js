(function ($) {
    Drupal.behaviors.STARTERKIT = {
        attach: function (context, settings) {

            $('input[name="aprove"]').click(function () {
                var id = $(this).attr('id');
                console.log(id);
            })
            /*Add your js code here*/
            $('.view-view-industry #edit-field-list-category-value label ').click(function () {
                $(this).parent().children().eq(0).click();
                $(' #edit-submit-view-industry ').click();
            });

            $(' .view-economic-news #edit-field-list-category-value label ').click(function () {
                $(this).parent().children().eq(0).click();
                $(' #edit-submit-economic-news ').click();
            });

            $('.season-goods .slick-arrow').click(function () {
                var date = $('.season-goods .slick-current').attr('data');
                $('#edit-field-date-value-value-datepicker-popup-0').text(date);
                $('#edit-field-date-value-value-datepicker-popup-0').val(date);
                $('#edit-submit-season-goods').click();

            })


            if (!$('.main_rating .average_display').length) {
                $("<span class='average_display'></span>").insertBefore($(".main_rating .fivestar-widget-5"));
            }
            $(".main_rating .average_display").text($('.main_rating .average_value').text() + "/ ");


            $('.tab2 .term_tree span').once().bind('click', function () {
                $(this).parent().toggleClass('open');
                if ($(this).parent().hasClass('open')) {
                    console.log('open');
                    $(this).text('-')
                }
                else {
                    console.log('qwerty');
                    $(this).text('+');
                }
            });
            if (!$('.login').length) {
                $(' <a href="/" class="login">Войти </a>').once().insertAfter($('#edit-author--2 a'));

            }
            if (!$('.login-news').length) {
                $(' <a href="/" class="login-news">Войти </a>').once().insertAfter($('#edit-author--4 a'));

            }


            $('.tab2 .term_tree:not(.category_company):not(.category_goods) a').once().bind('click', function (e) {
                e.preventDefault();
                var id_term = $(this).attr('id');
                $("#edit-term-node-tid-depth [value='" + id_term + "']").attr("selected", "selected");
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

            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(1).once().find('label').prepend('<img src=' + term_21 + '>');
            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(2).once().find('label').prepend('<img src=' + term_22 + '>');
            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(3).once().find('label').prepend('<img src=' + term_23 + '>');
            $('#edit-field-category-gallery-tid-wrapper .form-radios .form-item-field-category-gallery-tid').eq(4).once().find('label').prepend('<img src=' + term_24 + '>');


            $('.tab2 .category_goods a').once().bind('click', function (e) {
                e.preventDefault();
                var id_term = $(this).attr('id');
                console.log(id_term)
                $("#edit-field-goods-category-tid [value='" + id_term + "']").attr("selected", "selected");
                $("#edit-field-goods-tags-tid [value='All']").attr("selected", "selected");
                $('#edit-submit-all-goods').click();
            });

            $('.tab2 .company_tags a').once().bind('click', function (e) {
                e.preventDefault();

                var id_term = $(this).attr('id');
                $("#edit-field-goods-tags-tid [value='" + id_term + "']").attr("selected", "selected");
                $('#edit-submit-all-goods').click();
            });

            $('.view-filters .up').click(function () {
                $("#edit-sort-order  [value='ASC']").attr("selected", "selected");
                $('#edit-submit-company-category').click();
            });

            $('.view-filters .down').click(function () {

                $("#edit-sort-order  [value='DESC']").attr("selected", "selected");
                $('#edit-submit-company-category').click();

            });
            $('#fake-edit-sort-by').change(function () {
                console.log($(this).val());
                $("#edit-sort-by [value='" + $(this).val() + "']").attr("selected", "selected");
                $('#edit-submit-company-category').click();
            });
            var address = [];
            $('.view-company-category .views-row').each(function () {
                var val = $(this).find('.views-field-field-address').find('.field-content').text();
                console.log(val);
                address.push(val);

            });


            $('.table-view').eq(0).click(function(){
                $('.table-view').addClass('active');
                $('.map-view').removeClass('active');
            });
            $('.map-view').eq(0).click(function(){
                initMap(address);
                $('.map-view').addClass('active');
                $('.table-view').removeClass('active');
            });

           $('#superfish-1 li a').click(function () {
               window.location.href = $(this).attr('href');

           });
           $('.company_tags li').click(function(){
               window.location.href = $(this).find('a').attr('href');
           })
            $('.category_company_list .category li a.active').parent().parent().addClass('active');

            var active_company_menu =  $('.company-navigation ul li.active');
            if ( active_company_menu.length == 0  ){
                $('.company-navigation ul li.menu-577 ').addClass('active');
            }



        }
    };

})(jQuery);

function initMap(address) {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: uluru
    });
    codeAddress(address, map)
}

function codeAddress(data, map) {
    if (data) {
        data.forEach(function (address, i, arr) {
            if (address) {
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == 'OK') {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

        });


    }
}