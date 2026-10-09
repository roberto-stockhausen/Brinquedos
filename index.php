<?php
require_once 'conn.php';
$sqlcadastrados = "SELECT * FROM brinquedos";
$brinqudosCadastrados = $conn->query($sqlcadastrados);

if (isset($_POST['cadastro'])){

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$faixa = $_POST['faixa'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$sql = "INSERT INTO brinquedos(nome, categoria, faixa, preco, estoque) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdi", $nome, $categoria, $faixa, $preco, $estoque);
        $stmt->execute();
        $stmt->close();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        
<h1> Sistema de gerenciamento de brinquedos </h1>
<div class="formulario">
<h2> Cadastrar brinquedo </h2>
<form method="POST" id="cadastro">
<label for="nome"> Nome: </label>
<input type="text" name="nome" required> <br>
<hr>
<label for="categoria"> Categoria: </label>
<div>
    <input type="radio" name="categoria" value="veiculos" required> Veículos <br>
    <input type="radio" name="categoria" value="armas"> Armas <br>
    <input type="radio" name="categoria" value="esportes"> Esportes <br>
    <input type="radio" name="categoria" value="bonecos"> Bonecos <br>
    <input type="radio" name="categoria" value="pelucias"> Pelucias <br>
    <input type="radio" name="categoria" value="meninas"> Meninas <br> <!-- Um pouco misoginista, mas imagino que todas as lojas de brinqudos tenham essa categoria -->
    <input type="radio" name="categoria" value="outros"> Outros <br>
</div>
<hr>
<label for="faixa"> Faixa etária: </label>
<div>
    <input type="radio" name="faixa" value="Maiores3" required> Permitido para todos <br>
    <input type="radio" name="faixa" value="Menores3"> Não recomendado para menores de 3 anos <br>
</div>
<hr>
<label for="preco"> Preço: </label>
<input type="number" name="preco" step="0.01" min="1" max="1000" required> <br>
<hr>
<label for="estoque"> Quantidade: </label>
<input type="number" name="estoque" min="0", max="4294967295" required>
<hr>
<input type="submit" name="cadastro" value="Cadastrar">
</form>
</div>
<h2> Brinqudos cadastrados </h2>
<div class="tabela">
<table border="1">
<tr>
        <th>ID</th>
        <th>nome</th>
        <th>categoria</th>
        <th>faixa etária</th>
        <th>preco</th>
        <th>quantidade</th>
        <th>Ações</th>
</tr>
<?php while($linha = $brinqudosCadastrados->fetch_assoc()){ ?>
<tr>
<td> <?php echo $linha['id'] ?> </td>
<td> <?php echo $linha['nome'] ?> </td>
<td> <?php echo $linha['categoria'] ?> </td>
<td> <?php echo $linha['faixa'] ?> </td>
<td> <?php echo $linha['preco'] ?> </td>
<td> <?php echo $linha['estoque'] ?> </td>
<td> <a href='editar.php?id=<?php echo $linha['id'] ?>"'> Editar </a> </td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>
