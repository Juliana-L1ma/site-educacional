<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de PDF</title>
</head>
<body>

    <h2>Envio de PDF para a Unidade Curricular</h2>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lógica de processamento do formulário (upload do arquivo, etc.)
        // Certifique-se de validar e processar os dados antes de salvar no banco de dados
        // ...

        // Exemplo de caminho onde os arquivos serão salvos (certifique-se de ter permissões de escrita)
        $upload_directory = "uploads/";

        // Gera um nome único para o arquivo
        $pdf_file_name = uniqid() . "_" . $_FILES['pdf_file']['name'];

        // Move o arquivo para o diretório de upload
        move_uploaded_file($_FILES['pdf_file']['tmp_name'], $upload_directory . $pdf_file_name);

        // Salva o caminho do arquivo na coluna pdf_path da tabela de unidades curriculares
        $id_unid_curricular = $_POST['id_unid_curricular'];
        $pdf_path = $upload_directory . $pdf_file_name;

        // Substitua os detalhes da conexão com o banco de dados conforme necessário
        $usuario = 'root';
        $senha = '';
        $database = 'senai117_bd';
        $host = 'localhost';
        
        $conn= new mysqli($host, $usuario, $senha, $database);
        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Atualiza a coluna pdf_path na tabela de unidades curriculares
        $sql = "UPDATE unidades_curriculares SET pdf_path = '$pdf_path' WHERE id_unid_curricular = $id_unid_curricular";

        if ($conn->query($sql) === TRUE) {
            echo "<p>PDF enviado com sucesso para a Unidade Curricular com ID: $id_unid_curricular</p>";
        } else {
            echo "Erro ao atualizar o banco de dados: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>

    <form action="upload_form.php" method="post" enctype="multipart/form-data">
        <label for="id_unid_curricular">ID da Unidade Curricular:</label>
        <input type="text" name="id_unid_curricular" required>
        
        <br>
        
        <label for="pdf_file">Selecione o PDF:</label>
        <input type="file" name="pdf_file" accept=".pdf" required>
        
        <br>

        <input type="submit" value="Enviar PDF">
    </form>

</body>
</html>
