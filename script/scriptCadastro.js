function mostraSegundoSelect_cadastro() {
    var primeiroSelect_cadastro = document.getElementById("primeiroSelect_cadastro");
    var segundaOpcaoAluno = document.getElementById("segundaOpcao_aluno");
    var segundaOpcaoTurma1 = document.getElementById("segundaOpcao_turma1");
    var segundaOpcaoTurma2 = document.getElementById("segundaOpcao_turma2");
    var segundaOpcaoDisciplina = document.getElementById("segundaOpcao_disciplina");

    //para os formulários
    var formularioAluno = document.getElementById("div_cadastroInfo_aluno");
    var formularioCurso = document.getElementById("div_cadastroInfo_curso");
    var formularioDisciplina = document.getElementById("div_cadastroInfo_unidade_curricular");
    var formularioProfessor = document.getElementById("div_cadastroInfo_professor");
    var formularioTurma = document.getElementById("div_cadastroInfo_turma");
    var formularioDiscPorCurso = document.getElementById("div_cadastroInfo_disc_curso");

    //sempre que chamo a função ela some com TUDO 
    segundaOpcaoAluno.classList.add("invisivel_cadastro");
    segundaOpcaoTurma1.classList.add("invisivel_cadastro");
    segundaOpcaoTurma2.classList.add("invisivel_cadastro");
    segundaOpcaoDisciplina.classList.add("invisivel_cadastro");
    formularioAluno.classList.add("invisivel_cadastro");
    formularioCurso.classList.add("invisivel_cadastro");
    formularioDisciplina.classList.add("invisivel_cadastro");
    formularioProfessor.classList.add("invisivel_cadastro");
    formularioTurma.classList.add("invisivel_cadastro");
    formularioDiscPorCurso.classList.add("invisivel_cadastro");

    if (primeiroSelect_cadastro.value === "") {
        //só para verificar que some caso a pessoa não selecione nada
        segundaOpcaoAluno.classList.add("invisivel_cadastro");
        segundaOpcaoTurma1.classList.add("invisivel_cadastro");
        segundaOpcaoTurma2.classList.add("invisivel_cadastro");
        segundaOpcaoDisciplina.classList.add("invisivel_cadastro");

        formularioAluno.classList.add("invisivel_cadastro");
        formularioCurso.classList.add("invisivel_cadastro");
        formularioDisciplina.classList.add("invisivel_cadastro");
        formularioProfessor.classList.add("invisivel_cadastro");
        formularioTurma.classList.add("invisivel_cadastro");
        formularioDiscPorCurso.classList.add("invisivel_cadastro");

    } else if (primeiroSelect_cadastro.value === "aluno") {
        segundaOpcaoAluno.classList.remove("invisivel_cadastro");
        segundaOpcaoAluno.addEventListener("change", function() {
        if(document.getElementById("selecionarOpcao_aluno").value !== ""){
                formularioAluno.classList.remove("invisivel_cadastro");
            }else{
                formularioAluno.classList.add("invisivel_cadastro");
            }
        });

    } else if (primeiroSelect_cadastro.value === "turma") {
        segundaOpcaoTurma1.classList.remove("invisivel_cadastro");
        segundaOpcaoTurma1.addEventListener("change", function() {
            if(document.getElementById("opcaoTurma1").value !== ""){
                segundaOpcaoTurma2.classList.remove("invisivel_cadastro");
            }else{
                segundaOpcaoTurma2.classList.add("invisivel_cadastro");
                formularioTurma.classList.add("invisivel_cadastro");
            }

            segundaOpcaoTurma2.addEventListener("change", function() {
                if(document.getElementById("opcaoTurma2").value !== ""){
                    formularioTurma.classList.remove("invisivel_cadastro");
                }else{
                    formularioTurma.classList.add("invisivel_cadastro");
                }
                        });
        });

    } else if (primeiroSelect_cadastro.value === "disciplina") {
        segundaOpcaoDisciplina.classList.remove("invisivel_cadastro");
        segundaOpcaoDisciplina.addEventListener("change", function() {
            if(document.getElementById("selecionarOpcao_disciplina").value !== ""){
                formularioDisciplina.classList.remove("invisivel_cadastro");
            }else{
                formularioDisciplina.classList.add("invisivel_cadastro");
            }        });

    } else if (primeiroSelect_cadastro.value === "curso") {
        formularioCurso.classList.remove("invisivel_cadastro");

    } else if (primeiroSelect_cadastro.value === "professor") {
        formularioProfessor.classList.remove("invisivel_cadastro");

    } else if (primeiroSelect_cadastro.value === "disc_curso") {
        formularioDiscPorCurso.classList.remove("invisivel_cadastro");
    }
}
///////////////// fim de parte dedicada ao header /////////////////////////






//////////////////////////associando uma uc a um professor
var checkboxSelecionado_nif;

function addProfessor() {
    var select = document.getElementById("professor");
    var cpf = select.value;
    var nome = select.options[select.selectedIndex].text;

    if (document.getElementById(cpf)) {
        Swal.fire({
            text: 'Você já adicionou esse professor!',
            icon: 'error',
            confirmButtonText: 'Entendi'
        });
        return;
    }

    var divCheckboxes = document.getElementById("escolha_prof_uc");
    var div = document.createElement('div')
    var label = document.createElement('label')
    var checkbox = document.createElement('input')
    checkbox.name = "professores_selecionados[]";
    checkbox.value = cpf;
    checkbox.type = 'checkbox';
    checkbox.id = cpf;
    label.htmlFor = cpf;
    label.appendChild(document.createTextNode(nome));

    div.classList.add('div');
    checkbox.classList.add('checkProfessores_turma');
    label.classList.add("label_prof_uc")



    divCheckboxes.appendChild(div)
    div.appendChild(checkbox)
    div.appendChild(label)




    // Desabilitar todos os checkboxes, exceto o que foi clicado
    var checkboxes = divCheckboxes.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(function(chk) {
        chk.addEventListener('change', function() {
            if (chk.checked) {
                checkboxes.forEach(function(chkInner) {
                    if (chkInner !== chk) {
                        chkInner.checked =
                            false; // Desmarca todos os outros checkboxes se o atual estiver marcado
                    }
                });
                checkboxSelecionado_nif = chk.id;
            }
            checkboxes.forEach(function(chkInner) {
                if (chkInner !== chk) {
                    chkInner.disabled = chk
                        .checked; // Desabilita todos os outros checkboxes se o atual estiver marcado
                }
            });
        });
    });


    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        icon: 'success',
        title: 'Professor adicionado à turma com sucesso.'
    });
}




// PARA O AJAX - mantendo a página sem resetar ao associar uma unidade curricular a um professor
document.getElementById("btn_add_profUc").addEventListener("click", function() {
    var id_unid_curricular = document.getElementById("unidade_curricular_select");
    var id_unid_curricular_selecionada = id_unid_curricular.options[id_unid_curricular
            .selectedIndex]
        .value;

    if (id_unid_curricular_selecionada && checkboxSelecionado_nif) {
        //envio em formato JSON para processar:
        var data = {
            origem: 'disc',
            id_unid_cur_selected: id_unid_curricular_selecionada,
            nif_professor: checkboxSelecionado_nif
        };

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "processamentoCadastro.php", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        Swal.fire(
                            'Sucesso!',
                            'A matéria foi associada a um professor',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Erro!',
                            'A unidade curricular já está associada a um professor',
                            'error'
                        );
                    }
                } else {
                    alert("Ocorreu um erro ao processar a solicitação.");
                }
            }
        };

        xhr.send(JSON.stringify(
            data)); //isso é o que define o formato que estarei enviando para processar
    } else {
        alert("Por favor, selecione um professor e uma unidade curricular.");
    }
});



/////////////// PARA DESATIVAR OS CHECKBOXES DA PARTE DE CURSO /////////////////////////////
var checkboxesCategoria = document.querySelectorAll('.checkbox_categoria_curso');
var divCategoriasCurso = document.getElementById("alinharOpCurso");

checkboxesCategoria.forEach(function(chk) {
    chk.addEventListener('change', function() {
        if (chk.checked) {
            checkboxesCategoria.forEach(function(chkInner) {
                if (chkInner !== chk) {
                    chkInner.checked = false;
                }
            });
            divCategoriasCurso.value = chk.name;
        }
        checkboxesCategoria.forEach(function(chkInner) {
            if (chkInner !== chk) {
                chkInner.disabled = chk.checked;
            }
        });
    });
});




function envioAJAX(formId) {
    if (formId === 'div_cadastroInfo_unidade_curricular') {
        var data = {
            origem: 'formulário padrão',
            nomeFormulario: "disciplina",
            nomeUc: document.getElementById("nomeUC_input").value,
            cargaHoraria: document.getElementById("cargaHorariaUC_INPUT").value
        };
    }

    if (formId === 'div_cadastroInfo_aluno') {
        var data = {
            origem: 'formulário padrão',
            nomeFormulario: "aluno",
            numero_matricula: document.getElementById("numMatricula_aluno").value,
            cpf: document.getElementById("cpf_aluno").value,
            rg: document.getElementById("rg_aluno").value
        };
    }

    if (formId === 'div_cadastroInfo_professor') {
        var data = {
            origem: 'formulário padrão',
            nomeFormulario: "professor",
            nif_professor: document.getElementById("nif_professor").value,
            email_pessoal_professor: document.getElementById("email_prof").value,
            email_educacional_professor: document.getElementById("emailEd_prof").value
        };
    }

    if (formId === 'div_cadastroInfo_curso') {
        document.getElementById("selectCategoria_curso").value = divCategoriasCurso.value;

        var data = {
            origem: 'formulário padrão',
            nomeFormulario: "curso",
            nome_curso: document.getElementById("nomeCurso_input").value,
            categoria: document.getElementById("selectCategoria_curso").value
        };
    }

    if (formId === 'div_cadastroInfo_turma') {
        //crio a condição que muda o value para que eu possa pegar o id do curso e do período selecionados no php depois
        document.getElementById("cursoSelecionado_turma").value = primeiroSelectTurma.value;
        document.getElementById("periodoSelecionado_turma").value = segundoSelectTurma
            .value;

        var data = {
            origem: 'formulário padrão',
            nomeFormulario: "turma",
            nomeTurma: document.getElementById("nome_turma").value,
            inicio_turma: document.getElementById("inicio_turma").value,
        };
    }

    if (formId === 'div_cadastroInfo_disc_curso') {
        var data = {
            origem: 'formulário padrão',
            nomeFormulario: "disc_curso",
            unidade_curricular: document.getElementById("unidCurr_selectDiscCurso").value,
            curso: document.getElementById("curso_selectDiscCurso").value,
        };
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "processamentoCadastro.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.sucesso_operacao) {
                    Swal.fire({
                        title: 'Deseja enviar o formulário?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Enviar',
                        denyButtonText: `Não enviar`,
                        cancelButtonText: 'Cancelar',
                        // closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Formulário enviado!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var form = document.getElementById(
                                        formId);
                                    form.submit();
                                    var formData = new FormData(form);
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("POST",
                                        "processamentoCadastro.php", true);
                                    xhr.onreadystatechange =
                                        function() {
                                            if (xhr.readyState === 4 &&
                                                xhr.status ===
                                                200) {

                                            }
                                        };
                                    xhr.send(formData);
                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire('Mudanças não foram salvas', '', 'info')
                        }
                    })
                } else {
                    alert("Valor já existente na tabela")
                }
            } else {
                alert("Ocorreu um erro ao processar a solicitação.");
            }
        }
    };

    xhr.send(JSON.stringify(
        data)); //isso é o que define o formato que estarei enviando para processar
}