<?php

if($_SERVER['SERVER_PORT'] !== 443 and (empty($_SERVER['HTTPS']) or $_SERVER['HTTPS'] === 'off')) {
  header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit;
}

session_start();

if(isset($_SESSION['mensagem'])){
	$mensagem = $_SESSION['mensagem'];
}else{
	$mensagem = "";
}

session_destroy();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Criptografador</title>
	</head>
	<body style="text-align: center">
		<h1>Cifra de César</h1>
		<form action="cript.php" method="POST">
			<textarea name="texto" placeholder="Insira o texto a ser criptado" rows="20" cols="50"></textarea> <br/>
			<input type="radio" name="cript" value="code">Criptar
			<input type="radio" name="cript" value="decode">Decriptar
			<br/>
			<select name="opcao">
				<option value="1">+</option>
				<option value="0">-</option>
			</select>
			<input type="number" width="1" name="chave" placeholder="Insira a chave"> <br/>
			<input type="submit" value="Send">
		</form>
		<?php echo $mensagem; ?>
	</body>
</html>
