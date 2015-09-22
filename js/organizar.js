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
        $('#tab1').modal();
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