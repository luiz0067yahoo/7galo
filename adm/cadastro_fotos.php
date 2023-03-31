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
	$sql	= "SELECT id,foto,id_categoria_fotos FROM fotos where (id=0".$_GET["id"].")";
	$result=mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	if ($result!=null)
	$foto_antiga=$row["foto"];
}
	$categoria_fotos=0;
	if (isset($_GET["categoria_fotos"])){
		$categoria_fotos=$_GET["categoria_fotos"];	
	}
	else if (isset($_POST["categoria_fotos"])){
		$categoria_fotos=$_POST["categoria_fotos"];
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
			($_FILES["foto"]["type"] == "image/gif")
			|| 
			($_FILES["foto"]["type"] == "image/jpeg")
			|| 
			($_FILES["foto"]["type"] == "image/pjpeg")
			|| 
			($_FILES["foto"]["type"] == "image/png")
			|| 
			($_FILES["foto"]["type"] == "image/bmp")
		)
	)
	{
		if (($_FILES["foto"]["size"] < 5*1024*1024)){
			if ($_FILES["foto"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["foto"]["error"] . "<br />";
			}
			else
			{
				echo "Tipo: " . $_FILES["foto"]["type"] . "<br />";
				echo "Tamanho: " . ($_FILES["foto"]["size"] / 5000) . " Kb<br />";
				$foto=$_FILES["foto"]["name"];
				$extension=strtolower(end(explode(".", $foto)));
				if (file_exists($folder . "p_".$foto))
				{
					$foto=time().".".$extension;
										
				}
				move_uploaded_file(
					$_FILES["foto"]["tmp_name"],
					$folder . $foto
				);				
				redimensiona($folder . $foto,$folder."h_".$foto,800,600,75);
				redimensiona($folder . $foto,$folder."g_".$foto,224,230,75);
				redimensiona($folder . $foto,$folder."m_".$foto,80,80,75);
				redimensiona($folder . $foto,$folder."p_".$foto,32,32,75);
				unlink($folder . $foto);
				//delete_file($folder . $foto);	
				echo "<a href=\"../albun_de_fotos/p_".$foto."\" target=\"blank\">".$foto."</a><br>";
			}
		}
		else
		{
			echo "Tamanho muito grande<br>";
		}
	}
	else
	{
		$foto=$foto_antiga;
	}
	if ($_POST ['acao']=='alterar'){
		//delete_file($folder . $foto_antiga);
		$sql = "update fotos set foto='".$foto."' where (id=".$_POST["id"].");";
		echo $sql;
		mysql_query($sql, $link);
	}
	
	else if( $_POST['acao']=='inserir'){
		$sql = "insert into fotos (foto, id_categoria_fotos) values ('".$foto."','".$_POST["id_categoria_fotos"]."');";
		echo $sql;
		mysql_query($sql, $link);
			

	}
	else if ($_POST['acao']=='excluir'){
		//delete_file($folder . $foto_antiga);
		$sql = 'delete FROM fotos where id='.$_POST["id"];
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
			<td> Notícias:<select name="id_categoria_fotos" <?php if ($result!=null) echo $row["id_categoria_fotos"]?>>
						<?php
						$row_categoria_fotos=null;
						$result_categoria_fotos=null;		
						$sql_categoria_noticias    = 'SELECT id,titulo,imagem FROM categoria_fotos order by titulo asc;';
						$result_categoria_fotos = mysql_query($sql_categoria_noticias, $link);
						if (!$result_categoria_fotos) {
							echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
							echo 'Erro MySQL: ' . mysql_error();
							exit;
						}
						while ($row_categoria_fotos = mysql_fetch_assoc($result_categoria_fotos)){
							$selected="";
							if ($result!=null){
								if($row["id_categoria_fotos"]==$row_categoria_fotos['id'])
									$selected="selected";
							}
							
						?>
							<option value="<?php echo $row_categoria_fotos['id'];?>" <?php echo $selected?>>              
								<?php echo $row_categoria_fotos['titulo'];?>
							</option>
						<?php
							}
							mysql_free_result($result_categoria_fotos);
						?>
					</select>
			</td>
		</tr>
			<tr>
				<td>foto:</td>
				<td><input name="foto" type="file" ></td>
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
				<td>id_categoria_noticias</td>
				<td>foto</td>
	
				
			</tr>
		<?php
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT id,id_categoria_fotos,foto FROM fotos;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td><?php echo $row['id_categoria_fotos'];?></td>
					<td><a href="?id=<?php echo $row['id'];?>"><?php echo $row['id'];?><a/></td>   
					<td>
						<a href="../albun_de_fotos/<?php echo $row['foto'];?>"><?php echo $row['foto'];?><a/><br>
						<img width="160px" height="109px" src="../albun_de_fotos/g_<?php echo $row['foto'];?>">
					</td>
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
