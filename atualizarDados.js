//ATUALIZANDO DADOS DA TABELA ALUNOS
var attNomeAluno = document.getElementsByClassName("attNomeAluno");
var attSobrenomeAluno = document.getElementsByClassName("attSobAluno");
var attRgAluno = document.getElementsByClassName("attRgAluno");
var attCpfAluno = document.getElementsByClassName("attCpfAluno");

//ATUALIZA NOME ALUNO
for (var i = 0; i < attNomeAluno.length; i++) {
  // Adiciona um evento de clique a cada elemento
  attNomeAluno[i].addEventListener("click", function (event) {
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

//ATUALIZA SOBRENOME ALUNO
for (var i = 0; i < attSobrenomeAluno.length; i++) {
  attSobrenomeAluno[i].addEventListener("click", function (event) {
    var elementoClicado = this;

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
            coluna: "sobrenome_aluno",
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
  });
}

//ATUALIZA RG ALUNO
for (var i = 0; i < attRgAluno.length; i++) {
    attRgAluno[i].addEventListener("click", function (event) {
    var elementoClicado = this;

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
            coluna: "rg_aluno",
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
  });
}

//ATUALIZA CPF ALUNO
for (var i = 0; i < attCpfAluno.length; i++) {
    attCpfAluno[i].addEventListener("click", function (event) {
    var elementoClicado = this;

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
            coluna: "cpf_aluno",
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
  });
}
