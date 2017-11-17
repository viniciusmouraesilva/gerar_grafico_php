<?php
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "mercado";
	
	$con = mysqli_connect($host,$usuario,$senha,$banco);
	
	if(!mysqli_connect_errno($con)){
		echo "<p>Conectado agora.</p>";
	}else{
		echo "Erro ao conectar com o banco.";
		echo mysqli_connect_errno();
		exit;
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$nome = $_POST['nome'];
		$categoria = $_POST['categoria'];
		
		$query = "INSERT INTO produtos(nome,categoria) VALUES ('$nome','$categoria')";
		
		mysqli_query($con,$query);
		
		echo mysqli_error($con);
		
		header("Location:index.php");
		exit;
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Produtos</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<p>Nome</p>
		<p><input type="text" name="nome"></p>
		<p>Categoria</p> 
		<p><select name="categoria">	
			<option value="frutas">frutas</option>
			<option value="biscoitos">biscoitos</option>
			<option value="congelados">congelados</option>
			<option value="limpeza">limpeza</option>
		</select></p>
		<input type="submit" value="Enviar">
	</form>
	<p>Gerar gráfico dos produtos sobre as categorias</p>
	<a href="gerar_grafico.php"><img src="grafico.gif" alt="grafico"></a>
</body>
</html>