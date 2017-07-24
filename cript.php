<?php
$opcao = $_POST['opcao'];
$chave = $_POST['chave'];
$cript = $_POST['cript'];
$textoOriginal = $_POST['texto'];
session_start();

if($cript == "code"){
	$textoCript = "";
	for($i = 0;$i < strlen($textoOriginal);$i++){
		$charOriginal = substr($textoOriginal, $i, 1);
		
		$asciiOriginal = ord($charOriginal);
		if($opcao){
			$asciiCript = $asciiOriginal + $chave;
		}else{
			$asciiCript = $asciiOriginal - $chave;
		}
		
		if($asciiCript < 32){
			$asciiCript2 = 127 - (32 - $asciiCript);
			$asciiCript = $asciiCript2;
		}else if($asciiCript > 127){
			$asciiCript2 = 32 + ($asciiCript - 127);
			$asciiCript = $asciiCript2;
		}		
		
		$charCript = chr($asciiCript);
		$textoCript .= $charCript;
	}

	$_SESSION['mensagem'] = "<h1>Mensagem Criptografada:</h1><p>" . $textoCript . "</p>";

}else if($cript == "decode"){
	$textoDecript = "";
	for($i = 0;$i < strlen($textoOriginal);$i++){
		$charOriginal = substr($textoOriginal, $i, 1);
		$asciiOriginal = ord($charOriginal);
		if($opcao){
			$asciiDecript = $asciiOriginal - $chave;
		}else{
			$asciiDecript = $asciiOriginal + $chave;
		}
		
		if($asciiDecript < 32){
			$asciiDecript2 = 127 - (32 - $asciiDecript);
			$asciiDecript = $asciiDecript2;
		}else if($asciiDecript >= 127){
			$asciiDecript2 = 32 + ($asciiDecript - 127);
			$asciiDecript = $asciiDecript2;
		}	
		
		$charDecript = chr($asciiDecript);
		$textoDecript .= $charDecript;
		
	}

	$_SESSION['mensagem'] = "<h1>Mensagem Decriptografada:</h1><p>" . $textoDecript . "</p>";

}

header("location: index.php");
	
?>