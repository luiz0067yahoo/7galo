<?php
/*error_reporting(0);
ini_set(�display_errors�, 0 );*/
include('conecta.php');


$row=null;
$result=null;
if (($_GET["codigo"]!=null)){
	$sql	= "SELECT codigo, imagem, link FROM slide where (codigo=0".$_GET["codigo"].")";
	$result=mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	if (isset($row))
	$imagem_antiga=$row["imagem"];
}
?>
<div style="height:100px;display:block;">
<?php
if ($_POST) {
	//$folder = "C://xampp//htdocs//7galo//slide";
	$folder = "..//slide//";
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
		if (($_FILES["imagem"]["size"] < 2000*2000)){
			if ($_FILES["imagem"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["imagem"]["error"] . "<br />";
			}
			else
			{
				echo "Upload: " . $_FILES["imagem"]["name"] . "<br />";
				echo "Type: " . $_FILES["imagem"]["type"] . "<br />";
				echo "Size: " . ($_FILES["imagem"]["size"] / 5000) . " Kb<br />";
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
				echo "<a href=\"../slide/".$imagem."\">".$imagem."</a><br>";
					if ($_POST ['acao']=='alterar'){
						//delete_file($folder . $imagem_antiga);
						$sql = "update slide set imagem='".$imagem."', where (codigo=".$_POST["codigo"].");";
						echo $sql;
						mysql_query($sql, $link);
					}
					else if( $_POST['acao']=='inserir'){
						$sql = "insert into slide (imagem) values ('".$imagem."');";
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
	if ($_POST['acao']=='excluir'){
		//delete_file($folder . $imagem_antiga);
		$sql = 'delete FROM slide where codigo='.$_POST["codigo"];
		//echo $sql;
		mysql_query($sql, $link);
	}
	$redirect = "upload.php?success";
}
?>
</div>
		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
			codigo:<input name="codigo" type="text" value="<?php if ($result!=null) echo $row["codigo"]?>"><br>
			Link:<input name="comentario" type="text" value="<?php if ($result!=null) echo $row["link"]?>"><br>
			imagem:<input name="imagem" type="file" ><br>
		
			<input type="submit" name="acao" value="inserir">
			<input type="submit" name="acao" value="alterar">
			<input type="submit" name="acao" value="excluir">
			<input type="button" value="limpar" onclick="self.location.href='?codigo'">		
		</form>
			<table border="1">
			<tr>
				<td>codigo</td>
				<td>imagem</td>
				<td>Link</td>
			</tr>
		<?php
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT codigo, imagem, link FROM slide;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, n�o foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td><a href="?codigo=<?php echo $row['codigo'];?>"><?php echo $row['codigo'];?><a/></td>
					<td>
						<a href="../slide/<?php echo $row['imagem'];?>"><?php echo $row['imagem'];?><a/><br>
						<img width="250px" height="150px" src="../slide/<?php echo $row['imagem'];?>">
						<td><a href="<?php echo $row['link'];?>"><?php echo $row['link'];?><a/></td>
					</td>
				</tr>
			<?php
				}
				mysql_free_result($result);
			?>
			
			</table>
<?php
	include('rodape.php');
?>
