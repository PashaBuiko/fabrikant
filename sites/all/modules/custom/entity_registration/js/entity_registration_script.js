(function ($) {
    Drupal.behaviors.entity_registration = {
        attach: function (context, settings) {
            /*Add your js code here*/

            $('.form-item-activity-field').dropdown({
                limitCount: 5,
                searchable: false,
                choice: function () {
                    (arguments[1]['id'] > 0 ) ? $('.form-item-activity-field .dropdown-chose-list').addClass('check-ok').removeClass('check-error') : $('.form-item-activity-field .dropdown-display').addClass('check-error').removeClass('check-ok');
                }
            });
            $('.form-item-form-owner').dropdown({
                limitCount: 5,
                searchable: false,
                choice: function () {
                    ($('.form-item-form-owner .dropdown-selected  .del ').attr('data-id') != '') ? $('.form-item-form-owner .dropdown-chose-list').addClass('check-ok').removeClass('check-error') : $('.form-item-form-owner .dropdown-chose-list').addClass('check-error').removeClass('check-ok');
                }
            });
            $('.form-item-activity-field .dropdown-clear-all').click(function () {
                $('.form-item-activity-field .dropdown-chose-list').addClass('check-error').removeClass('check-ok');
            });
            $('.form-item-form-owner  .dropdown-clear-all').click(function () {
                $('.form-item-form-owner .dropdown-chose-list').addClass('check-error').removeClass('check-ok');

            });

            /* $('#my-first-form input').on('keyup keypress', function(e) {
             if($(this).has('edit-house')){
             var letters=' +-()1234567890';
             // return (letters.indexOf(String.fromCharCode(e.which))!=-1);
             }
             return true

             });*/


            $('#edit-note').ForceNumericOnly();

            $('#company-registration-form input.required').focusout(function () {
                console.log('pasha');
                if (!$(this).val()) {
                    $(this).parent().addClass('check-error').removeClass('check-ok');
                }
                else {

                    $(this).parent().addClass('check-ok').removeClass('check-error')
                }

                if ($(this).is('#edit-email')){
                   if(! emailcheck($(this).val())){
                       $(this).parent().addClass('check-error').removeClass('check-ok');
                   }
                    else{
                       $(this).parent().addClass('check-ok').removeClass('check-error')
                   }
                }


            });


            $('#edit-site-url').focusout(function () {
                $valid_url = true;

                $valid_url = isValidUrl($(this).val());

                if ($valid_url) {
                    $(this).parent().addClass('check-ok').removeClass('check-error')

                }
                else {
                    $(this).parent().addClass('check-error').removeClass('check-ok');

                }
                ;
                if (!$(this).val()) {
                    $(this).parent().removeClass('check-ok').removeClass('check-error');
                }
            });

            function isValidUrl(url) {
                var objRE = /(^https?:\/\/)?[a-z0-9~_\-\.]+\.[a-z]{2,9}(\/|:|\?[!-~]*)?$/i;
                return objRE.test(url);
            }


            $('#edit-note').keyup(function () {
                var $this = $(this);
                if ($this.val().length > 100)
                    $this.val($this.val().substr(0, 100));
            });
            $('#edit-note').after("<div class='valid_note_text'>Введено <span>0</span> из 100 допустимых символов</div>");


            function emailcheck(email)
            {
                var e = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                return e.test(email);
            }

        }
    };
})(jQuery);

jQuery.fn.ForceNumericOnly =
    function () {
        return this.each(function () {
            jQuery(this).keyup(function (e) {
                element=  jQuery(this);
                jQuery('.valid_note_text span').text(element.val().length);
                    return true
            });
        });
    };