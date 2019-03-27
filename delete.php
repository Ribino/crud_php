<?php include "template/header.php"; ?>
<link rel="stylesheet" href="css/style.css" />

<h2>Listar postagens</h2>

<form method="post">
<label for="location">Procure</label>
<input type="text" id="location" name="location">
<input type="submit" name="submit" value="Filtrar">
</form>
<table>
    <tr id = "cabecalho">
        <th scope= "col" class = "text-center">Titulo</th>
        <th scope= "col" class = "text-center">Autor</th>
        <th scope= "col" class = "text-center">Categoria</th>
    </tr>
<style>
    #cabecalho{
    background-color: blue;
    }
    table{
    border:1px solid #ccc; 
    width: 100%;
    }
</style>

<?php 
include "init.php";
include "banco_blog.php";

   
if(isset($_POST['submit']))
    $pesquisa = $_POST['location'];
else
    $pesquisa = null;    
    
$lista = listar($con,$pesquisa);

foreach($lista as $listar){
    ?>
        <tbody>
            <th scope="row"><?php echo $listar['TITULO'] ?> </th>
            <th scope="row"><?php echo $listar['AUTOR'] ?> </th>
            <th scope="row"><?php echo $listar['CATEGORIA'] ?> </th>
            <th>
                <a href = "delete.php?id=<?=$listar['id']?>">Deletar</a>
        </tbody>
<?php
}



?>
</table>
<a href="index.php">Back to home</a>
<?php include "template/footer.php"; ?>