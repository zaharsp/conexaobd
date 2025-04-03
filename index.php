<?php
//Esse comando busca as informações que estão no arquivo config.php
require './SQL/config.php';
//Vamos criar uma variavel com um array vazio para receber os dados dos usuários
$lista = [];
//Vamos buscar os usuários no banco de dados
$sql = $pdo->query("SELECT * FROM usuarios");
//Vamos iniciar com uma validação, se existe usuarios cadastrados
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="./ADICIONAR/adicionar.php">Adicionar Usuário</a>
<a href="./ADICIONAR/adicionar_prod.php">Adicionar produtos</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <!--Agora vamos montar o restante da tabela com informações do BD-->
    <?php foreach($lista as $usuario): ?>
            <tr>
                <td><?=$usuario['id'];?></td>
                <td><?=$usuario['nome'];?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td>
                    <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                    <a href="./EXCLUIR/excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Você tem certeza que deseja excluir esse usuário?')">[ Excluir ]</a>
                </td>
            </tr>
    <?php endforeach; ?>
    
   <?php $lista1 = [];
//-- Vamos buscar os PRODUTOS no banco de dados -->
$sql = $pdo->query("SELECT * FROM produtos");
//Vamos iniciar com uma validação, se existe produtos cadastrados -->
if($sql->rowCount() > 0){
    $lista1 = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">Adicionar produtos</a>

<table border="1" width="100%">
    <tr>
        <th>ID produto</th>
        <th>tipo</th>
        <th>descricao</th>
        <th>preco</th>
        <th>tamanho</th>
        <th>foto</th>
    </tr>
    <!--Agora vamos montar o restante da tabela com informações do BD-->
    <?php foreach($lista1 as $produtos):?>
            <tr>
                <td><?=$produtos['id_prod'];?></td>
                <td><?=$produtos['tipo'];?></td>
                <td><?=$produtos['descricao'];?></td>
                <td><?=$produtos['preco'];?></td>
                <td><?=$produtos['tamanho'];?></td>
                <td><?php echo $produtos['descricao'];?></td>
                <td>
                    <a href="editar.php?id=<?=$produtos['id_prod'];?>">[ Editar ]</a>
                    <a href="../02-conexaobd/EXCLUIR/excluir_prod.php?id_prod=<?=$produtos['id_prod'];?>" onclick="return confirm('Você tem certeza que deseja excluir esse ?')">[ Excluir ]</a>
                </td>
            </tr>

    <?php endforeach; ?>
</table>
