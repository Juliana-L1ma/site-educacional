
function categoria2_cadastroinfo() {
    var valorSelect1_cadastroInfo = document.getElementById("select1_cadastroinfo").value;

    //para deixar as divs de cadastro de informações invisíveis
    var informacoesCategoria2_cadastroInfo = document.querySelectorAll(".divCategoria2_naoVisivel"
    );
    informacoesCategoria2_cadastroInfo.forEach(function (div) {
      div.style.display = "none";
      div.style.width = "60%";
    });

    console.log(valorSelect1_cadastroInfo)
    //para deixar a segunda categoria de escolha invisível
    var categorias2 = document.querySelectorAll(".categoriaSelecionada_cadastroInfo"
    );
    categorias2.forEach(function (elementosSelect) {
      elementosSelect.style.display = "none";
      elementosSelect.style.background = "none";
    });


    if (valorSelect1_cadastroInfo !== document.querySelector("#opcaovazia_cadastroInfo") && valorSelect1_cadastroInfo !== "professor") {
      document.getElementById("opcaovazia_cadastroInfo").style.display = 'none';
      document.querySelector("#escolha_" + valorSelect1_cadastroInfo + "_cadastroInfo").style.display = "flex";
      document.querySelector("#div_cadastroInfo_" + valorSelect1_cadastroInfo).style.display = "block";

      console.log("#div_cadastroInfo_" + valorSelect1_cadastroInfo)
    }
    else if (valorSelect1_cadastroInfo === "professor") {
      document.querySelector("#div_cadastroInfo_" + valorSelect1_cadastroInfo).style.display = "block";
    }
  }

//Função para selecinar apenas um checkbox para categoria
$(function(){
  $('input.checkgroup').click(function(){
     if($(this).is(":checked")){
        $('input.checkgroup').attr('disabled',true);
        $(this).removeAttr('disabled');
     }else{
        $('input.checkgroup').removeAttr('disabled');
     }
  })
})

//Função para adicionar disciplinas na área de CURSO
function addDisciplina(){
  //Array futuro para cadastramento de matérias
  const materias = ["Matéria I", "Matéria II", "Matéria III"];

  //Criação de elementos para adicionar ao corpo da página
  const deletar = document.createElement('button');
  const imgDel = document.createElement('img');
  const div = document.createElement('div');
  const resultado = document.createElement('p');
  const texto = document.createTextNode(materias[0]);
  imgDel.src = "img/sinal-de-menos.png";

  const resposta1 = document.querySelector("#resposta");

  //Identificando uma div para estilizar
  div.classList.add("alinhamento");
  deletar.classList.add("btnDel");

  //Contrapondo elementos
  resultado.appendChild(texto)
  deletar.appendChild(imgDel);
  div.appendChild(deletar);
  div.appendChild(resultado);
  resposta1.appendChild(div);

  //Evento para remover disciplina adicionada anteriormente
  deletar.addEventListener("click", () => {
    resultado.remove();
    deletar.remove();
  });
}

//Função para adicionar professores na área de TURMA
function addProfessor(){
  //Array futuro para cadastramento de matérias
  const professores = ["Professor I", "Professor II", "Professor III"];

  //Criação de elementos para adicionar ao corpo da página
  const deletar = document.createElement('button');
  const imgDel = document.createElement('img');
  const div = document.createElement('div');
  const resultado = document.createElement('p');
  const texto = document.createTextNode(professores[0]);
  imgDel.src = "img/sinal-de-menos.png";

  const resposta1 = document.querySelector("#respostaDois");

  //Identificando uma div para estilizar
  div.classList.add("alinhamento");
  deletar.classList.add("btnDel");
  imgDel.style.cursor = "pointer";

  //Contrapondo elementos
  resultado.appendChild(texto)
  deletar.appendChild(imgDel);
  div.appendChild(deletar);
  div.appendChild(resultado);
  resposta1.appendChild(div);

  //Evento para remover disciplina adicionada anteriormente
  deletar.addEventListener("click", () => {
    resultado.remove();
    deletar.remove();
  });
}

function addUnidCurr(){
  alert("Unidade Curricular confirmada!");
}
