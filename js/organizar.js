$( document ).on('click', '.next', function() {
    
    var valeur = 0;
    
        if ( $(this).attr('value') > valeur )
        {
            valeur =  $(this).attr('value');
        }
    
    $('.progress-bar').css('width', valeur+'100%').attr('aria-valuenow', valeur);
    $('.enviar').removeClass('hidden');
    $('.next').addClass('hidden');

});

$( document ).on('click', '.previous', function() {
    
    var valeur = 0;
    
        if ( $(this).attr('value') > valeur )
        {
            valeur =  $(this).attr('value');
        }
    
    $('.progress-bar').css('width', valeur+'50%').attr('aria-valuenow', valeur);
    $('.enviar').addClass('hidden');
    $('.next').removeClass('hidden');
});

$( document ).on('click', '#home', function() {
    
    var valeur = 0;
    
        if ( $(this).attr('value') > valeur )
        {
            valeur =  $(this).attr('value');
        }
    $('.progress-bar').css('width', valeur+'50%').attr('aria-valuenow', valeur);
    $('.enviar').addClass('hidden');
    $('.next').removeClass('hidden');
    $('#tab11').modal();
});

$( document ).on('click', '#tab', function() {
    
    var valeur = 0;
    
        if ( $(this).attr('value') > valeur )
        {
            valeur =  $(this).attr('value');
        }
    $('.progress-bar').css('width', valeur+'50%').attr('aria-valuenow', valeur);
    $('.enviar').addClass('hidden');
    $('.next').removeClass('hidden');
    $('#tab12').modal();

});

$( document ).on('click', '#home1', function() {
    
    var valeur = 0;
    
        if ( $(this).attr('value') > valeur )
        {
            valeur =  $(this).attr('value');
        }
    $('.progress-bar').css('width', valeur+'50%').attr('aria-valuenow', valeur);
    $('.enviar').addClass('hidden');
    $('.next').removeClass('hidden');
    $('#tab11').modal();
});

$( document ).on('click', '#tab1', function() {
    
    var valeur = 0;
    
        if ( $(this).attr('value') > valeur )
        {
            valeur =  $(this).attr('value');
        }
    $('.progress-bar').css('width', valeur+'50%').attr('aria-valuenow', valeur);
    $('.enviar').addClass('hidden');
    $('.next').removeClass('hidden');
    $('#tab12').modal();

});

$(function(){
    $('#cod_estados').change(function(){
        if( $(this).val() ) {
            $('#cod_cidades').hide();
            $('.carregando').show();
            $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                console.log(j);
                var options = '<option value=""></option>'; 
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                }   
                $('#cod_cidades').html(options).show();
                $('.carregando').hide();
            });
        } else {
            $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
        }
    });
});

 $(function(){
    $('#cod_estados1').change(function(){
        if( $(this).val() ) {
            $('#cod_cidades1').hide();
            $('.carregando').show();
            $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                console.log(j);
                var options = '<option value=""></option>'; 
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                }   
                $('#cod_cidades1').html(options).show();
                $('.carregando').hide();
            });
        } else {
            $('#cod_cidades1').html('<option value="">– Escolha um estado –</option>');
        }
    });
}); 


$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.numero').mask('00000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/, 
          fallback: '/'
        }, 
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

});

$(document).ready(function(){
   $(".form1").submit(function(){
      var email = $(".email").val();
      if(email != "")
      {
         var filtro = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if(filtro.test(email))
         {
            // alert("Este endereço de email é válido!");
            return true;
         } else {
           alert("Este endereço de email !");
           return false;
         }
      } else {
        alert('Este endereço de email não é válido!'); 
        return false;
      }
   });
});

$(document).ready(function(){
   $(".form2").submit(function(){
      var emails = $(".emails").val();
      if(emails != "")
      {
         var filtro = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if(filtro.test(emails))
         {
            // alert("Este endereço de email é válido!");
            return true;
         } else {
           alert("Este endereço de email !");
           return false;
         }
      } else {
        alert('Este endereço de email não é válido!'); 
        return false;
      }
   });
});











