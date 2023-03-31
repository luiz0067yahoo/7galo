<?php	 
	include('conecta.php');
	error_reporting(0);
ini_set(“display_errors”, 0 );
	$codigo_usuario=$_SESSION["codigo"];
	$row=null;
	$result=null;
	$sql	= "SELECT codigo,nome,conteudo,data_inicio,data_fim FROM paginas where (nome='grupo') and (data_fim is null) order by data_inicio desc";
	$result=mysql_query($sql, $link);
	if($result!=null){
	$row = mysql_fetch_assoc($result);
	$conteudo=$row["conteudo"];
	$codigo=$row["codigo"];
	$data_inicio=$row["data_inicio"];
	if ($_POST['acao']=='atualizar pagina'){
		$conteudo=($_POST["conteudo"]);
		$conteudo=str_replace("\\\"", "\"", $conteudo);
		 $data_hora=Date("Y-m-d H:i:s");   
		$sql = "insert into paginas (nome,conteudo,data_inicio) values ('grupo','".$conteudo."','".$data_hora."');";
		echo $sql;
		mysql_query($sql, $link);
		$sql = "update paginas set data_fim='".$data_hora."' where (codigo=0".$codigo.");";
		mysql_query($sql, $link);			
	}
	}
?>
	<title>Editor Mídia Mix</title>
	<title>Replace Textareas by Class Name &mdash; CKEditor Sample</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type" />
	<script type="text/javascript" src="../ckeditor.js"></script>
	<script src="sample.js" type="text/javascript"></script>
	<link href="sample.css" rel="stylesheet" type="text/css" />
<style type="text/css">
		body{
			margin-top:0px;
			margin-left:0px;
			margin-right:0px;
			margin-button:0px;
		}
	</style>
	<?php echo $data_inicio;?>
	<form action="?pagina=home" method="post">
		<label for="editor1">Editor da pagina O Grupo</label><br>
		<textarea class="ckeditor" style="width:100%;" name="conteudo" id="conteudo" rows="10"><?php echo ($conteudo);?></textarea><br>
		<input type="submit" name="acao" value="atualizar pagina" />		
	</form>	
<?php
	$_SESSION["codigo"]=$codigo_usuario;
	$row=null;
	$result=null;
	$sql    = "SELECT * FROM usuario where (codigo=0".$_SESSION["codigo"].") ;";
	$result=mysql_query($sql, $link);
	if (
		($result!=null)
		&&
		($_SESSION["codigo"]!=null)
	)
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["codigo"]		= $row["codigo"];
		$_SESSION["usuario"]	= $row["usuario"];	
		$_SESSION['meu_tempo']		= time();
		mysql_free_result($result);
	}
	include('rodape.php');
?>	
