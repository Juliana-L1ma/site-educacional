//ATUALIZANDO DADOS DA TABELA ALUNOS
function atualizarDadoAluno(coluna, elementoClicado) {
  Swal.fire({
    title: "Atualizar",
    text: "Escreva no campo para alterar",
    input: "text",
    showCancelButton: true,
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "atualizar.php",
        method: "POST",
        data: {
          coluna: coluna,
          valor: result.value,
          matricula: elementoClicado.parentElement.children[0].innerText,
        },
        success: function (response) {
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
}

function atualizarDados(elementos, coluna) {
  for (var i = 0; i < elementos.length; i++) {
    elementos[i].addEventListener("click", function (event) {
      var elementoClicado = this;
      atualizarDadoAluno(coluna, elementoClicado);
    });
  }
}

var elementosParaAtualizar = [
  { elementos: document.getElementsByClassName("attNomeAluno"), coluna: "nome_aluno" },
  { elementos: document.getElementsByClassName("attSobAluno"), coluna: "sobrenome_aluno" },
  { elementos: document.getElementsByClassName("attRgAluno"), coluna: "rg_aluno" },
  { elementos: document.getElementsByClassName("attCpfAluno"), coluna: "cpf_aluno" },
  { elementos: document.getElementsByClassName("attNascAluno"), coluna: "data_nascimento_aluno" },
  { elementos: document.getElementsByClassName("attTelAluno"), coluna: "telefone_aluno" },
  { elementos: document.getElementsByClassName("attEndAluno"), coluna: "endereco_aluno" },
  { elementos: document.getElementsByClassName("attNumAluno"), coluna: "endereco_numero_aluno" },
  { elementos: document.getElementsByClassName("attCompAluno"), coluna: "complemento_end_aluno" },
  { elementos: document.getElementsByClassName("attEmailAluno"), coluna: "email_pessoal_aluno" },
  { elementos: document.getElementsByClassName("attEmailEdAluno"), coluna: "email_educacional_aluno" },
  { elementos: document.getElementsByClassName("attSenhaEdAluno"), coluna: "senha_educacional_aluno" },
  { elementos: document.getElementsByClassName("attNomeProfessor"), coluna: "nome_professor"}
];

elementosParaAtualizar.forEach(item => {
  atualizarDados(item.elementos, item.coluna);
});
