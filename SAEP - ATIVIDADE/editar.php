<?php
 // Edição nos dados 11:10 01/10
include 'db.php'; // Conexão com o banco de dados

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Busca os dados do aluno pelo ID
    $sql = "SELECT * FROM alunos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $idade = $row['idade'];
        $email = $row['email'];
        $curso = $row['curso'];
    } else {
        echo "O Aluno não encontrado!";
        exit;
    }
}

// Verifica se o formulário foi enviado para atualizar os dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE alunos SET nome = '$nome', idade = $idade, email = '$email', curso = '$curso' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Os dados foram atualizados";
        header("Location: index.php"); // Redireciona de volta para a lista de alunos
        exit;
    } else {
        echo "Erro" . $conn->error;
    }
}
?>

<!DOCTYPE html> 
<html lang="en"> <!-- Começa a página para editar -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição dos dados da tabela</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Pagina para a ediçao -- Feito em 01/10 11:17-->
        <h1>Edição dos dados da tabela</h1>
        
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" required><br>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" value="<?php echo $idade; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" required><br>

            <label for="curso">Curso:</label>
            <input type="text" name="curso" id="curso" value="<?php echo $curso; ?>" required><br>

            <button type="submit">Atualizar a tabela</button>
        </form>
    </div>
</body>
</html>
