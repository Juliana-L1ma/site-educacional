
var numeroCritérios;
var critériosEnviados = 0;

function mostrarBotoes_criterios() {
    document.getElementById('botoes').style.display = 'block';
}

function mostrarCaixaObjetivo(tipo, naoEscolhido) {
    var escolhido = document.getElementById(`${tipo}`);
    var naoEscolhido = document.getElementById(`${naoEscolhido}`);

    escolhido.style.backgroundColor = "var(--verde)";
    escolhido.style.color = "var(--background-color-branco)";

    naoEscolhido.style.backgroundColor = "#ffff";
    naoEscolhido.style.color = "var(--preto)";


    document.getElementById('quantidade').style.display = 'flex';
    // Adicione o tipo como um parâmetro oculto para uso posterior
    document.getElementById('qtdCrit').setAttribute('data-tipo', tipo);
}

function mostrarQtdCaixaObjetivo_criterios() {
    numeroCritérios = parseInt(document.getElementById('qtdCrit').value);
    if (numeroCritérios > 0) {
        document.getElementById('quantidade').style.display = 'none';
        document.getElementById('objetivo').style.display = 'block';
    } else {
        alert('Por favor, insira uma quantidade válida de critérios.');
    }
}

function enviarParaBanco_criterios() {
    var curso = document.getElementById('curso').value;
    var uc = document.getElementById('uc').value;
    var semestre = document.getElementById('semestre') ? document.getElementById('semestre').value : null;
    var tipo = document.getElementById('qtdCrit').getAttribute('data-tipo');
    var objetivo = document.getElementById('textoObjetivo').value;

    console.log("curso: " + curso + "\nunidade curricular: " + uc + "\nsemestre: " + semestre + "\ntipo: " + tipo +
        "\nobjetivo: " + objetivo)

    if (semestre === null) {
        var data = {
            origem: 'envio de critérios',
            curso: curso,
            unidade_curricular: uc,
            tipo: tipo,
            objetivo: objetivo
        };
    } else if (semestre !== null) {
        var data = {
            origem: 'envio de critérios',
            curso: curso,
            unidade_curricular: uc,
            semestre: semestre,
            tipo: tipo,
            objetivo: objetivo
        };
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "processamentoCadastro.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.chegou) {
                    if (response.inseriu_criterio) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: `${response.mensagem}`,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        alert(`${response.mensagem}`)
                    }
                } else {
                    alert(`${response.mensagem}`)
                }
            } else {
                alert("Ocorreu um erro ao processar a solicitação.");
            }
        }
    };

    xhr.send(JSON.stringify(data));


    // Limpar o texto da caixa de texto
    document.getElementById('textoObjetivo').value = '';

    critériosEnviados++;

    if (critériosEnviados < numeroCritérios) {
        // Se ainda houver critérios a serem adicionados, reinicia a caixa de texto de objetivo
        document.getElementById('objetivo').style.display = 'block';
    } else {
        // Se todos os critérios foram adicionados, reiniciar o processo
        critériosEnviados = 0;
        document.getElementById('objetivo').style.display = 'none';
        document.getElementById('botoes').style.display = 'block';
        document.getElementById('ucForm').reset(); // Limpar o formulário
    }
}