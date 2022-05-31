<?php
include('verifica_login.php');
include("conexao2.php");

/************* EXCLUIR ************/
if(isset($_GET['deletar'])) {
    $id = intval($_GET['deletar']);
    $sql_query = $mysqli->query("SELECT * FROM arquivos WHERE id = '$id'") or die($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();

    if(unlink($arquivo['path'])) {
        $deu_certo = $mysqli->query("DELETE FROM arquivos WHERE id = '$id'") or die($mysqli->error);
        if($deu_certo)
        echo"<p>Arquivo excluido com sucesso!!</p>";
        header('Location: enviarArq.php');
    }
}
/************* ENVIAR BANCO DE DADOS E PASTA ************/
function enviarArquivo($error, $size, $name, $tmp_name) {
    include("conexao2.php");
    if($error)
        die("Falha ao enviar arquivo");
    if($size > 2097152)
        die("Arquivo muito grande!! Max: 2MB");
    $usuarioBD = $_SESSION['usuario'];
    $pasta = "arquivos//";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao !="jpg" && $extensao != 'png')
        die("Tipo de arquivo não aceito");
    
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if($deu_certo) {
        $mysqli->query("INSERT INTO arquivos (nome, path, usuario) VALUES('$nomeDoArquivo', '$path', '$usuarioBD')") or die($mysqli->error);
        header('Location: enviarArq.php');
        return true;
    } else
        return false;
}
if(isset($_FILES['arquivos'])){
    $arquivos = $_FILES['arquivos'];
    $tudo_certo = true;
    foreach($arquivos['name'] as $index =>$arq){
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos["tmp_name"][$index]);
        if(!$deu_certo)
            $tudo_certo = false;
    }
    if($tudo_certo)
        echo "<p>Todos os arquivos foram enviados com sucesso!";
    else
        echo"<p>Falha ao enviar um ou mais arquivos!";
}
 $usuarioBD = $_SESSION['usuario'];
 $sql_query = $mysqli->query("SELECT * FROM arquivos WHERE usuario = '$usuarioBD'") or die($conexao->error);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body style="background-color: #dbdbdb">
        <form method="POST" enctype="multipart/form-data" action="">
            <p style="text-align:center">
            <input multiple name="arquivos[]" type="file">
            <button style=" " name="upload" type="submit">Enviar arquivo</button></p>
        </form>

        <h1 style="text-align:center">Lista de Arquivos</h1>
                <div border="1" cellpadding="10">
                    <?php
                    while($arquivo = $sql_query->fetch_assoc()) {
                    ?>
                    <div style="float: left; margin-left:100px; margin-top:20px;">
                    <a target="_blank" href="<?php echo $arquivo['path']; ?>">
                    <img height="150" src="<?php echo $arquivo['path']; ?>"alt=""> </a><br>
                    <a download target="_blank" href="<?php echo $arquivo['path']; ?>">Salvar</a>
                        <a href="enviarArq.php?deletar=<?php echo $arquivo['id'];?>" onclick="return confirm('Deseja excluir a imagem?')">Deletar</a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            


     
 </body>
 </html>