var botaoForm = $('#submitForm');

botaoForm.on('click',function(){
    var nome = $('#nomeInput').val();
    var email = $('#exampleInputEmail3').val();
    var url = "php/form.php";

    if((nome == "") || (email == ""))
    {
        $('#appendTitle').html('Como assim você não tem nome ou e-mail?');
        $('#appendBody').html('Você deve preencher o seu nome e se e-mail, assim podemos entrar em contato com você.<br>Que tal?');
        $('#appendButton').html('Vou preencher meu nome e e-mail!');
        return;
    }

    $.post(url, {nome:nome,email:email})
    .done(function(data){
        data = $.parseJSON(data);

        var dataMensagem = data['mensagem'];

        if(data['sucesso'] == true)
        {
            $('#appendTitle').html('Obaaa!');
            $('#appendButton').html('Uhul!');
        }else{
            $('#appendTitle').html('Essa não..');
            $('#appendButton').html('Que peninha!');
        }

        $('#appendBody').html(dataMensagem);
    });

});
