$('.dinheiro').mask("#.##0,00", {reverse: true});
$('.date').mask('00/00/0000');
$('.mesAno').mask('00/0000');
$('.cpf').mask('000.000.000-00', {reverse: true});
$('.telefone').mask('(00) 00000-0000');

$('#unica').click(function (){
    $("#periodicidade").hide();
    $("#parcela_numero").hide();
});

$('#fixa').click(function (){
    $("#periodicidade").show();
    $("#parcela_numero").hide();
});

$('#parcelada').click(function (){
    $("#periodicidade").hide();
    $("#parcela_numero").show();
});
