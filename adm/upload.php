<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Upload</title>
		<script type="text/javascript">
		</script>
	</head>
	<body >
<?php
include('conecta.php');
$row=null;
$result=null;
if (($_GET["codigo"]!=null)){
	$sql	= "SELECT codigo,imagem,nome,link FROM patrocinio where (codigo=0".$_GET["codigo"].")";
	$result=mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	$imagem _antiga=$row["imagem"];
}
?>
<div style="height:100px;display:block;">
<?php
if ($_POST) {
	$folder = "..//albun_de_fotos//";
	if (
		(
			($_FILES["imagem"]["type"] == "image/gif")
			|| 
			($_FILES["imagem"]["type"] == "image/jpeg")
			|| 
			($_FILES["imagem"]["type"] == "image/pjpeg")
			|| 
			($_FILES["imagem"]["type"] == "image/png")
			|| 
			($_FILES["imagem"]["type"] == "image/bmp")
		)
	)
	{
		if (($_FILES["imagem"]["size"] < 1024*1024)){
			if ($_FILES["imagem"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["imagem"]["error"] . "<br />";
			}
			else
			{
				echo "Upload: " . $_FILES["imagem"]["name"] . "<br />";
				echo "Type: " . $_FILES["imagem"]["type"] . "<br />";
				echo "Size: " . ($_FILES["imagem"]["size"] / 1024) . " Kb<br />";
				echo "Temp file: " . $_FILES["imagem"]["tmp_name"] . "<br />";
				$imagem=$_FILES["imagem"]["name"];
				$extension=strtolower(end(explode(".", $imagem)));
				if (file_exists($folder . $imagem))
				{
					$imagem=time().".".$extension;
					move_uploaded_file(
						$_FILES["imagem"]["tmp_name"],
						$folder . $imagem
					);
				}
				else
				{
					move_uploaded_file(
						$_FILES["imagem"]["tmp_name"],
						$folder . $imagem
					);
					
				}
				echo "<a href=\"..\\albun_de_fotos\\".$imagem."\">".$imagem."</a><br>";
					if ($_POST['acao']=='excluir'){
						delete_file($folder . $imagem _antiga);
						$sql = 'delete FROM patrocinio where codigo='.$_POST["codigo"];
						//echo $sql;
						mysql_query($sql, $link);
					}
					else if ($_POST ['acao']=='alterar'){
						delete_file($folder . $imagem _antiga);
						$sql = "update patrocinio set imagem='".$_POST["imagem"]."', nome='".$_POST["nome"]."',link='".$_POST["link"]."' where (codigo=".$_POST["codigo"].");";
						//echo $sql;
						mysql_query($sql, $link);
					}
					else if( $_POST['acao']=='inserir'){
						$sql = "insert into patrocinio (imagem, nome, link) values ('".$_POST["imagem"]."','".$_POST["nome"]."','".$_POST["link"]."');";
						//echo $sql;
						mysql_query($sql, $link);
					}
			}
		}
		else
	{
		echo "Tamanho muito grande<br>";
	}
	}
	else
	{
		echo "N�o � uma imagem<br>";
	}
	$redirect = "upload.php?success";
}
?>
</div>
		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<input name="imagem" type="file" ><br>
			<input name="link" type="text" ><br>
			<input name="nome" type="text" ><br>
			<input type="submit" value="ok">
		</form>
		<img src="..\albun_de_fotos\<?php echo $imagem;?>">
	</body>

</html>