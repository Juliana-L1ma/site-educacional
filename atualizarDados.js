//ATUALIZANDO DADOS DA TABELA ALUNOS
var elementosAtualizarNome = document.getElementsByClassName("attNomeAluno");

for (var i = 0; i < elementosAtualizarNome.length; i++) {
  // Adiciona um evento de clique a cada elemento
  elementosAtualizarNome[i].addEventListener("click", function (event) {
    // Armazena a referência do elemento clicado para acesso posterior
    var elementoClicado = this;

    Swal.fire({
      title: "Atualizar",
      text: "Escreva no campo para alterar",
      input: "text",
      showCancelButton: true,
    }).then((result) => {
      if (result.value) {
        // Faz a solicitação AJAX para o PHP
        $.ajax({
          url: "atualizar.php", // Substitua pelo caminho correto do seu arquivo PHP
          method: "POST",
          data: {
            coluna: "nome_aluno", // Coluna que será atualizada
            valor: result.value, // Novo valor digitado
            matricula: elementoClicado.parentElement.children[0].innerText, // Matrícula do aluno
          },
          success: function (response) {
            // Exibe uma mensagem ou realiza outras ações após a atualização
            console.log(response);
            Swal.fire({
              title: "Dado atualizado com sucesso",
              type: "success",
            });
            setTimeout(function () {
              location.reload();
            }, 2000);
          },
          error: function (error) {
            console.error(error);
          },
        });
      }
    });
  });
}
