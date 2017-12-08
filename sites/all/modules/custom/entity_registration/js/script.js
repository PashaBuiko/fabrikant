
(function ($) {
    Drupal.behaviors.entity_registration = {
        attach: function (context, settings) {
            /*Add your js code here*/

            $('.aprove').click(function () {
                var id = $(this).attr('id');
                console.log(id);
               $('#company-aproval-form input[name= "id_aprove"]').val(id);
               if($(this).attr('checked')){
                   action = 'checked';
               }
               else{
                   action = 'del';
               }
               $('#company-aproval-form input[name= "action"]').val(action);
               $('#company-aproval-form').submit();
            })







        }
    };
})(jQuery);

