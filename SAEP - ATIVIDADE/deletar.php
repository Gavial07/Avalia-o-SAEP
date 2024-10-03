<?php
//excluir -- 01/10 --10:34
include 'db.php'; //inclui o banco de dados

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alunos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aluno retirado com sucesso!'); window.location.href='index.php';</script>"; 
    } else {
        echo "Erro ao excluir o aluno: " . $conn->error; //inclui uma frase de erro
    }

    $conn->close(); //se der tudo certo conecta e fecha
}
?>
