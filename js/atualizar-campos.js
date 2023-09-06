const formulario = document.querySelector("form");
const inputPrimeira = formulario.querySelector("#primeira");
const inputSegunda = formulario.querySelector("#segunda");
const inputMedia = formulario.querySelector("#media");
const inputSituacao = formulario.querySelector("#situacao");

let primeira, segunda, media, situacao;

function atualizarMedia(nota1, nota2){
    return (nota1 + nota2) / 2;
}

function atualizarSituacao(resultadoDaMedia){
    if(resultadoDaMedia >= 7){
        situacao = "aprovado";
    } else if(resultadoDaMedia >= 5){
        situacao = "recuperacao";
    } else {
        situacao = "reprovado";
    }
    return situacao;
}

inputPrimeira.addEventListener("input", function(){
    primeira = parseFloat(this.value);
    media = atualizarMedia(primeira, parseFloat(inputSegunda.value));
    inputMedia.value = media.toFixed(2);
    inputSituacao.value = atualizarSituacao(media);
});

inputSegunda.addEventListener("input", function(){
    segunda = parseFloat(this.value);
    media = atualizarMedia(parseFloat(inputPrimeira.value), segunda);
    inputMedia.value = media.toFixed(2);
    inputSituacao.value = atualizarSituacao(media);
});


