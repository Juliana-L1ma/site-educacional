<?php
    $conect = mysqli_connect("localhost", "root", "", "senai117_bd");

    
$json = file_get_contents('php://input');
$data = json_decode($json);

if($data && isset($data->origem)){
     if ($data->origem === "formulário padrão") {
        if($data->nomeFormulario === "disciplina"){
            $nomeUc = $conect->real_escape_string($data->nomeUc);
        $cargaHorariaUc = $conect->real_escape_string($data->cargaHoraria);

            $sqlVerificacao = "SELECT * FROM unidades_curriculares WHERE nome_uc = '$nomeUc' AND carga_horariaUc = '$cargaHorariaUc'";
            $resultadoPesquisa = $conect->query($sqlVerificacao);

            if ($resultadoPesquisa && $resultadoPesquisa->num_rows === 0) {
                $resposta = array("sucesso_operacao" => true);
            }else{
                $resposta = array("sucesso_operacao" => false);  
            }
            echo trim(json_encode($resposta));

        }

        if($data->nomeFormulario === "aluno"){
            $num_matriculaAluno = $conect->real_escape_string($data->numero_matricula);
            $cpf_aluno = $conect->real_escape_string($data->cpf);
            $rg_aluno = $conect->real_escape_string($data->rg);

            $sqlVerificacao1 = "SELECT * FROM alunos WHERE num_matricula_aluno  = '$num_matriculaAluno'";

            if(mysqli_query($conect, $sqlVerificacao1)->num_rows === 0){
                $sqlVerificacao2 = "SELECT * FROM alunos WHERE cpf_aluno = '$cpf_aluno' OR rg_aluno = '$rg_aluno'";

                if(mysqli_query($conect, $sqlVerificacao2)->num_rows === 0){
                    $resposta = array("sucesso_operacao" => true);
                }else{
                    $resposta = array("sucesso_operacao" => false);
                }
            }else{
                $resposta = array("sucesso_operacao" => false);
            }
            echo trim(json_encode($resposta));
        }

        if($data->nomeFormulario === "professor"){
            $nif = $conect->real_escape_string($data->nif_professor);
            $email_pessoal = $conect->real_escape_string($data->email_pessoal_professor);
            $email_educacional = $conect->real_escape_string($data->email_educacional_professor);

            $sqlVerificacao1 = "SELECT * FROM professores WHERE nif_professor = '$nif'";
            $resultadoPesquisa1 = $conect->query($sqlVerificacao1);

            if($resultadoPesquisa1 && $resultadoPesquisa1->num_rows === 0){
                $sqlVerificacao2 = "SELECT * FROM professores WHERE email_pessoal_professor = '$email_pessoal' OR email_educacional_professor = '$email_educacional'";
               
                if(mysqli_query($conect, $sqlVerificacao2)->num_rows === 0){
            $resposta = array("sucesso_operacao" => true);
                }else{
                    $resposta = array("sucesso_operacao" => false);
                }
            }else{
                $resposta = array("sucesso_operacao" => false);
            }
            echo trim(json_encode($resposta));
        }

        if($data->nomeFormulario === "curso"){
            $nome_curso = $conect->real_escape_string($data->nome_curso);
            $categoria = $conect->real_escape_string($data->categoria);

            $sqlVerificacao1 = "SELECT * FROM cursos WHERE nome_curso = '$nome_curso' AND categoria = '$categoria'";

            if(mysqli_query($conect, $sqlVerificacao1)->num_rows === 0){
            $resposta = array("sucesso_operacao" => true);
            }else{
                $resposta = array("sucesso_operacao" => false); 
            }

            echo trim(json_encode($resposta));
        }

        if($data->nomeFormulario === "turma"){
            $nome_turma = $conect->real_escape_string($data->nomeTurma);
            $inicioDaTurma = $conect->real_escape_string($data->inicio_turma);

            $sqlVerificacao1 = "SELECT * FROM turmas WHERE nome_turma = '$nome_turma' AND data_inicio_turma = '$inicioDaTurma'";

            if(mysqli_query($conect, $sqlVerificacao1)->num_rows === 0){
                $resposta = array("sucesso_operacao" => true);
            }else{
                $resposta = array("sucesso_operacao" => false);
            }
            echo trim(json_encode($resposta));
        }


        if($data->nomeFormulario === "disc_curso"){
            $disciplina = $conect->real_escape_string($data->unidade_curricular);
            $curso = $conect->real_escape_string($data->curso);

            $sqlVerificacao = "SELECT * FROM lista_curso_uc WHERE id_curso = '$curso' AND id_unidade_curricular = '$disciplina'";

            if(mysqli_query($conect, $sqlVerificacao)->num_rows === 0){
                $sqlAdicao = "INSERT INTO lista_curso_uc (id_curso, id_unidade_curricular) VALUES ('$curso', '$disciplina')";

                if($conect->query($sqlAdicao) === TRUE){
                $resposta = array("sucesso_operacao" => true);
            }else{
                $resposta = array("sucesso_operacao" => false);
            }
            echo trim(json_encode($resposta));
        }
    } 
}









if ($data->origem === "disc") {
    $nif = $conect->real_escape_string($data->nif_professor);
    $id_unid = $conect->real_escape_string($data->id_unid_cur_selected);

    $sqlVerificacao = "SELECT * FROM lista_disc_prof WHERE id_unidade_curricular = '$id_unid'";
    $resultadoQuery = $conect->query($sqlVerificacao);

    if ($resultadoQuery && $resultadoQuery->num_rows === 0) {
        $sql = "INSERT INTO lista_disc_prof (nif_professor, id_unidade_curricular) VALUES ('$nif', '$id_unid')";
        if ($conect->query($sql) === TRUE) {
            $resposta = array("success" => true);
        } else {
            $resposta = array("success" => false);
        }
    } else {
        $resposta = array("success" => false);
    }
    echo json_encode($resposta);
}

}



?>


<?php

// pegando o valor do select 'professores' da turma
$select_prof_turma = filter_input(INPUT_POST, 'selectprofessores_turma', FILTER_SANITIZE_STRING);
$select_periodo_turma = filter_input(INPUT_POST, 'select_periodo_turma', FILTER_SANITIZE_STRING);
$select_uc_turma = filter_input(INPUT_POST, 'selectDisciplinas_turma', FILTER_SANITIZE_STRING);
$select_curso_turma = filter_input(INPUT_POST, 'selectCurso_turma', FILTER_SANITIZE_STRING);

$conect = mysqli_connect("localhost", "root", "", "senai117_bd");

//Declaramos a variável que vai receber o conteúdo da lista
$professorChecado_check = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['identificadorForm'])) {
        $identificadorDoFormulario = $_POST['identificadorForm'];

        if ($identificadorDoFormulario === 'aluno') {
            $num_matricula = $_POST['numMatricula_aluno'];
            $nome_aluno = $_POST['nome_aluno'];
            $sobrenome_aluno = $_POST['sobrenome_aluno'];
            $cpf_aluno = $_POST['cpf_aluno'];
            $rg_aluno = $_POST['rg_aluno'];
            $data_nascimento_aluno = $_POST['dataNasc_aluno'];
            $endereco_aluno = $_POST['endereco_aluno'];
            $numEndereco_aluno = $_POST['numEndereco_aluno'];
            $telefone_aluno = $_POST['telefone_aluno'];
            $complemento_aluno = $_POST['complemento_aluno'];
            $email_aluno = $_POST['email_aluno'];
            $email_educacional = $_POST['emailEdu_aluno'];
            $senha_educacional = $_POST['senhaEdu_aluno'];


            $sql_aluno = "INSERT INTO alunos (num_matricula_aluno, cpf_aluno, nome_aluno, sobrenome_aluno, rg_aluno, data_nascimento_aluno, endereco_aluno, endereco_numero_aluno, complemento_end_aluno, telefone_aluno, email_pessoal_aluno, email_educacional_aluno, senha_educacional_aluno) VALUES ('$num_matricula','$cpf_aluno', '$nome_aluno', '$sobrenome_aluno', '$rg_aluno', '$data_nascimento_aluno', '$endereco_aluno', '$numEndereco_aluno' , '$complemento_aluno', '$telefone_aluno', '$email_aluno', '$email_educacional', '$senha_educacional')";

            //////////////////////// inserir na tabela PROFESSORES
            if (mysqli_query($conect, $sql_aluno)) {
                $turmaDoAluno = $_POST['turmaSelecionada_aluno'];
                $divisaoNaTurma = $_POST['divisao_aluno'];

                $sql_lista_alunos = "INSERT INTO lista_alunos (divisao, id_turma, id_aluno) VALUES ('$divisaoNaTurma','$turmaDoAluno', '$num_matricula')";
                mysqli_query($conect, $sql_lista_alunos);
            }
        }

        if ($identificadorDoFormulario === 'curso') {
            $nome_curso = $_POST['nomeCurso_input'];
            $carga_horaria = $_POST['cargaHorariaCurso_input'];
            $capacidade = $_POST['capacidadeCurso_input'];
            $categoria = $_POST['selectCategoria_curso'];
            $custo = $_POST['custo_curso'];
    
            $sql_curso = "INSERT INTO cursos ( nome_curso, carga_horaria_curso, valor_curso, capacidade, categoria) VALUES ( '$nome_curso', '$carga_horaria', '$custo', '$capacidade', '$categoria');";
            mysqli_query($conect, $sql_curso);

        }

        if ($identificadorDoFormulario === 'disciplina') {
            // inserindo dentro de disciplinas
            $nomeUc_disciplina = $_POST['nomeUC_input'];
            $cargaUc_disciplina = $_POST['cargaHorariaUC_INPUT'];
            $areaVinculadaUc_disciplina = $_POST['areaVinculadaUC_input'];
            $cursoSelecionado_disc = $_POST['cursoSelecionado_disciplina'];

            $sql_disciplina = "INSERT INTO unidades_curriculares (nome_uc, carga_horariaUc, area_vinculadaUc) VALUES ( '$nomeUc_disciplina', '$cargaUc_disciplina', '$areaVinculadaUc_disciplina');";

            //////////////////////// inserir na tabela PROFESSORES
            if (mysqli_query($conect, $sql_disciplina)) {
                // pego o ID recém inserido
                $resultado_Id = mysqli_query($conect, "SELECT * FROM unidades_curriculares ORDER BY id_unid_curricular DESC LIMIT 1");
                $row = mysqli_fetch_assoc($resultado_Id);

                $id_uc_recente = $row["id_unid_curricular"];

                $sql_curso_uc = "INSERT INTO lista_curso_uc (id_curso, id_unidade_curricular) VALUES ( '$cursoSelecionado_disc', '$id_uc_recente');";
                mysqli_query($conect, $sql_curso_uc);
            }
        }

        if ($identificadorDoFormulario === 'professor') {
            // inserindo dentro de professores
            $nome_professor = $_POST['nome_professor'];
            $sobrenome_professor = $_POST['sobrenome_professor'];
            $nif_professor = $_POST['nif_professor'];
            $data_nascimento_prof = $_POST['dataNasc_prof'];
            $endereco_prof = $_POST['endereco_prof'];
            $num_prof = $_POST['num_prof'];
            $complemento_prof = $_POST['complemento_prof'];
            $formacao_prof = $_POST['formacao_prof'];
            $email_prof = $_POST['email_prof'];
            $telefone_prof = $_POST['telefone_prof'];
            $email_educacional = $_POST['emailEd_prof'];
            $senha_educacional = $_POST['senhaEd_prof'];


            $sql_professor = "INSERT INTO professores (nif_professor, nome_professor, sobrenome_professor, data_nascimento_professor, endereco_professor, numero_end_professor, complemento_end_professor, telefone_professor, email_pessoal_professor, email_educacional_professor, senha_educacional_professor) VALUES ( '$nif_professor', '$nome_professor', '$sobrenome_professor', '$data_nascimento_prof', '$endereco_prof', '$num_prof', '$complemento_prof', '$telefone_prof', '$email_prof', '$email_educacional', '$senha_educacional');";

            //////////////////////// inserir na tabela PROFESSORES
            mysqli_query($conect, $sql_professor);
        }

        if ($identificadorDoFormulario === 'turma') {
            $id_curso = $_POST['cursoSelecionado_turma'];
            $periodo = $_POST['periodoSelecionado_turma'];

            // inserindo dentro de turmas
            $nome = $_POST['nome_turma'];
            $inicio = $_POST['inicio_turma'];
            $conclusao = $_POST['conclusao_turma'];
            $totalAlunos = $_POST['totalAlunos_turma'];

            $sql = "INSERT INTO turmas (id_curso, nome_turma, data_inicio_turma, periodo_turma, data_conclusao_turma, total_alunos) VALUES ('$id_curso', '$nome', '$inicio', '$periodo', '$conclusao', '$totalAlunos');";

            //////////////////////// inserir na tabela associativa TURMAS
            if (mysqli_query($conect, $sql)) {
                // pego o ID recém inserido
                $result = mysqli_query($conect, "SELECT * FROM turmas ORDER BY id_turma DESC LIMIT 1");
                $linha = mysqli_fetch_assoc($result);



                ///////////////////////////// PARA A LISTA ASSOCIATIVA lista_prof_turma //////////////////////////
                if(isset($_POST['professores_selecionados'])){
                //Atribuimos a variável todo conteúdo do índice
                $professorChecado_check = $_POST['professores_selecionados'];

                if ($professorChecado_check !== null)

                    for ($i = 0; $i < count($professorChecado_check); $i++)
                        $professorChecado_check[$i];

                $professorEscolhido = $professorChecado_check[$i - 1];

                // Exibe o ID da linha
                $id_turma_recente = $linha["id_turma"];

                $sql2 = "INSERT INTO lista_prof_turma (id_turma, nif_professor) VALUES ('$id_turma_recente', '$professorEscolhido');";

                if (mysqli_query($conect, $sql2)) {
                    $disciplina = $_POST['selectDisciplinas_turma'];

                    $sql3 = "INSERT INTO lista_disc_prof (nif_professor, id_unidade_curricular) VALUES ('$professorEscolhido', '$disciplina');";

                    if(mysqli_query($conect, $sql3)){
                        echo 'foi';
                    }else{
                        echo 'não foi';
                    }
                } else {
                    echo "Registro não realizado, a unidade curricular já tem um professor encarregado";
                }
            }else{
            }
            }
        }
    }
}

?>

