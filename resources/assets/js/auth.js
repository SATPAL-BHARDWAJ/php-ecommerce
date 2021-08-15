var inP     =   $('.input-field');

inP.on('blur', function () {
    if (!this.value) {
        $(this).parent('.f_row').removeClass('focus');
    } else {
        $(this).parent('.f_row').addClass('focus');
    }
}).on('focus change', function () {
    $(this).parent('.f_row').addClass('focus');
    $('.btn').removeClass('active');
    $('.f_row').removeClass('shake');
});


$('.resetTag').click(function(e){
    e.preventDefault();
    $('.formBox').addClass('level-forget').removeClass('level-reg');
});

$('.back').click(function(e){
    e.preventDefault();
    $('.formBox').removeClass('level-forget').addClass('level-login');
});



$('.regTag').click(function(e){
    e.preventDefault();
    $('.formBox').removeClass('level-reg-revers');
    $('.formBox').toggleClass('level-login').toggleClass('level-reg');
    if(!$('.formBox').hasClass('level-reg')) {
        $('.formBox').addClass('level-reg-revers');
    }
});
$('.formBox .btn').each(function() {
     $(this).on('click', function(e){
        e.preventDefault();
        var form = $(this).parent('form');
        var finp =  form.find('input');
        var email = form.find('input[name="email"]');
        var password = form.find('input[name="password"]');
       
       console.log('click on submit button', $(this));
       
        if (!finp.val() == 0) {
            //console.log(form.find('button:submit'));
            $(this).addClass('active');
            form.trigger('submit');
        }
        
        setTimeout(function () {
            
            inP.val('');
            
            $('.f_row').removeClass('shake focus');
            $('.btn').removeClass('active');
            
        }, 2000);
         
        if(inP.val() == 0) {
            inP.parent('.f_row').addClass('shake');
        }
          
    });
});
