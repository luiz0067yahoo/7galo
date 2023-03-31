<?php
include('conecta.php');
error_reporting(0);
ini_set(“display_errors”, 0 );
$row=null;
$result=null;
if (($_GET["codigo"]!=null)){
	$sql	= "SELECT codigo,imagem,comentario FROM projetos where (codigo=0".$_GET["codigo"].")";
	$result=mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	if (isset($row))
	$imagem_antiga=$row["imagem"];
}
?>
<div style="height:100px;display:block;">
<?php
if ($_POST) {
	$folder = "..//imagem//";
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
		if (($_FILES["imagem"]["size"] < 1500*1500)){
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
				echo "<a href=\"../imagem/".$imagem."\">".$imagem."</a><br>";
					if ($_POST ['acao']=='alterar'){
						//delete_file($folder . $imagem_antiga);
						$sql = "update projetos set imagem='".$imagem."', comentario='".$_POST["comentario"]."' where (codigo=".$_POST["codigo"].");";
						echo $sql;
						mysql_query($sql, $link);
					}
					else if( $_POST['acao']=='inserir'){
						$sql = "insert into projetos (imagem, comentario) values ('".$imagem."','".$_POST["comentario"]."');";
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
		echo "Não é uma imagem<br>";
	}
	if ($_POST['acao']=='excluir'){
		//delete_file($folder . $imagem_antiga);
		$sql = 'delete FROM projetos where codigo='.$_POST["codigo"];
		//echo $sql;
		mysql_query($sql, $link);
	}
	$redirect = "upload.php?success";
}
?>
</div>
		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
			codigo:<input name="codigo" type="text" value="<?php if ($result!=null) echo $row["codigo"]?>"><br>
			imagem:<input name="imagem" type="file" ><br>
			comentario:<input name="comentario" type="text" value="<?php if ($result!=null) echo $row["comentario"]?>"><br>
			<input type="submit" name="acao" value="inserir">
			<input type="submit" name="acao" value="alterar">
			<input type="submit" name="acao" value="excluir">
			<input type="button" value="limpar" onclick="self.location.href='?codigo'">		
		</form>
			<table border="1">
			<tr>
				<td>codigo</td>
				<td>imagem</td>
				<td>comentario</td>
			</tr>
		<?php
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT codigo,imagem,comentario FROM projetos;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td><a href="?codigo=<?php echo $row['codigo'];?>"><?php echo $row['codigo'];?><a/></td>
					<td>
						<a href="../imagem/<?php echo $row['imagem'];?>"><?php echo $row['imagem'];?><a/><br>
						<img width="160px" height="109px" src="../imagem/<?php echo $row['imagem'];?>">
					</td>
					<td><?php echo $row['comentario'];?>&nbsp </td>
					
				</tr>
			<?php
				}
				mysql_free_result($result);
			?>
			
			</table>
<?php
	include('rodape.php');
?>
