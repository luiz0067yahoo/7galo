<?php
	include('conecta.php');
	?>
<head>
	<script type="text/javascript" src="./js/functions.js"></script>
</head>
<center>
<?php
	include('conecta.php');
	
	function redimensiona($origem,$destino,$maxlargura,$maxaltura,$qualidade){
		list($largura, $altura) = getimagesize($origem);
		if($altura>$largura){
			$diferenca=$altura/$maxaltura;
			$maxlargura=$largura/$diferenca;
		}
		else{
			$diferenca=$largura/$maxlargura;
			$maxaltura=$altura/$diferenca;
		}
		$image_p = ImageCreateTrueColor($maxlargura,$maxaltura)	or die("Cannot Initialize new GD image stream");	
		$origem = imagecreatefromjpeg($origem);
		imagecopyresampled($image_p, $origem, 0, 0, 0, 0,  $maxlargura, $maxaltura, $largura, $altura);
		imagejpeg($image_p, $destino, $qualidade);
		imagedestroy($image_p);
		imagedestroy($origem);
	}
	$row=null;
	$result=null;


	if (($_GET["id"]!=null)){
		$sql	= "SELECT id,imagem,data_cadastro,titulo FROM categoria_fotos where (id=0".$_GET["id"].")";
		$result=mysql_query($sql, $link);
		$row = mysql_fetch_assoc($result);
		if ($result!=null)
		$imagem_antiga=$row["imagem"];
	}
	 

?>

<center>
<div style="height:100px;display:block;">
<?php
	if ($_POST) {
		$folder = "..//albun_de_fotos//";	
		//$folder = "..\\upload\\imagens\\projetos\\fotos_projetos\\";
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
			if (($_FILES["imagem"]["size"] < 5*1024*1024)){
				if ($_FILES["imagem"]["error"] > 0)
				{
					echo "Return Code: " . $_FILES["imagem"]["error"] . "<br />";
				}
				else
				{
					echo "Tipo: " . $_FILES["imagem"]["type"] . "<br />";
					echo "Tamanho: " . ($_FILES["imagem"]["size"] / 5000) . " Kb<br />";
					$imagem=$_FILES["imagem"]["name"];
					$extension=strtolower(end(explode(".", $imagem)));
					if (file_exists($folder . "p_".$imagem))
					{
						$imagem=time().".".$extension;
											
					}
					move_uploaded_file(
						$_FILES["imagem"]["tmp_name"],
						$folder . $imagem
					);				
					redimensiona($folder . $imagem,$folder."h_".$imagem,800,600,75);
					redimensiona($folder . $imagem,$folder."g_".$imagem,224,230,75);
					redimensiona($folder . $imagem,$folder."m_".$imagem,80,80,75);
					redimensiona($folder . $imagem,$folder."p_".$imagem,32,32,75);
					unlink($folder . $imagem);
					//delete_file($folder . $imagem);	
					echo "<a href=\"../albun_de_fotos/p_".$imagem."\" target=\"blank\">".$imagem."</a><br>";
				}
			}
			else
			{
				echo "Tamanho muito grande<br>";
			}
		}
		else
		{
			$imagem=$imagem_antiga;
		}
		if ($_POST ['acao']=='alterar'){
			//delete_file($folder . $imagem_antiga);
			$sql = "update categoria_fotos set imagem='".$imagem."', titulo='".$_POST["titulo"]."' where (id=".$_POST["id"].");";
			echo $sql;
			mysql_query($sql, $link);
		}
		
		else if( $_POST['acao']=='inserir'){
			$_POST["data_cadastro"]=Date("Y-m-d H:i:s");   
			$sql = "insert into categoria_fotos (imagem, titulo, data_cadastro) values ('".$imagem."','".$_POST["titulo"]."','".$_POST["data_cadastro"]."');";
			echo $sql;
			mysql_query($sql, $link);
				

		}
		else if ($_POST['acao']=='excluir'){
			//delete_file($folder . $imagem_antiga);
			$sql = 'delete FROM categoria_fotos where id='.$_POST["id"];
			//echo $sql;
			mysql_query($sql, $link);
		}
		$redirect = "upload.php?success";
	}
?>
</div>
	<form method="post" enctype="multipart/form-data" name="form1" id="form1">
		<table >
			<tr>
				<td>ID:</td>
				<td><input name="id" type="text" value="<?php if ($result!=null) echo $row["id"]?>"></td>
			</tr>
			<tr>
				<td>Imagem:</td>
				<td><input name="imagem" type="file" ></td>
			</tr>
			<tr>
				<td>Título:</td>
				<td><input name="titulo" type="text" value="<?php if ($result!=null) echo $row["titulo"]?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="acao" value="inserir">
					<input type="submit" name="acao" value="alterar">
					<input type="submit" name="acao" value="excluir">
					<input type="button" value="limpar" onclick="self.location.href='?id'">	
				</td>
			</tr>
		</table>
	</form>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>Imagem</td>
				<td>Título</td>
				<td>Data da notícia</td>
			</tr>
		<?php
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT id,imagem,data_cadastro,titulo FROM categoria_fotos;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td><a href="?id=<?php echo $row['id'];?>"><?php echo $row['id'];?><a/></td>
					<td>
						<a href="../albun_de_fotos/<?php echo $row['imagem'];?>"><?php echo $row['imagem'];?><a/><br>
						<img width="160px" height="109px" src="../albun_de_fotos/g_<?php echo $row['imagem'];?>">
					</td>
					<td><?php echo $row['titulo'];?>&nbsp </td>
					
					<td><?php echo $row['data_cadastro'] ;?></td>
				</tr>
			<?php
				}
				mysql_free_result($result);
			?>
			
			</table>
		</center>
<?php
	include('rodape.php');
?>
