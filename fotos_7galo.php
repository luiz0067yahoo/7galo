<?php	include('./adm/conecta.php');?>

<?php include("topo.php");?>
<?php
	

	
	$fotos_id="";
	$fotos_id_categoria="";
	$fotos_foto="";
	$fotos_imagem="";
	$fotos_categoria="";
	$fotos_data_cadastro="";

	$codigo="";
	if(isset($_GET["codigo"])){
		$codigo=$_GET["codigo"];
	}
	else if(isset($_POST["codigo"])){
		$codigo=$_POST["codigo"];
	}
	
	$sql="";//consulta select
	$linha=null;//registro da consulta
	$row="";//mesma coisa depende do meu estado de humor
	$result=null;//todos os resultados
		if($codigo!=""){//verrifica se o parametro esta vazio se nao preenche com ""
			$sql = "select id,titulo,data_cadastro from categoria_fotos where(id=".$codigo.");";
			$result=mysql_query($sql, $link);//realiza a consulta
			$row = mysql_fetch_assoc($result);//resgata a linha da consulta
			$fotos_id_categoria=$row['id'];
			$fotos_categoria=$row['titulo'];
			$fotos_data_cadastro=$row['data_cadastro'];
		}
		else{//verrifica se o parametro esta vazio se nao preenche com ""
			$sql = "select id,titulo,data_cadastro from categoria_fotos ;";
			$result = mysql_query($sql, $link);
			$row = mysql_fetch_assoc($result);
			$fotos_id_categoria=$row['id'];
			$fotos_categoria=$row['titulo'];
			$fotos_data_cadastro=$row['data_cadastro'];
		}

		
?>			
<div class="clear" style="height:22px;"></div>
<div id="principal" style="overflow:hidden;">
	<div class="conteudo">
		<div class="conteudo" style="color:#FFFFFF; ">
	<div class='conteudoInterno'>
		<p>	Galeria de imagem:</p>
	</div>
		</div>
			<?php include ("parceiros.php");?>
			<div class='conteudoInterno'>
				<div class="conteudoInterno"> 
					<ul id="listafotos" >
						<?php
					
							
							$sql = "select fotos.id,fotos.id_categoria_fotos, fotos.foto,categoria_fotos.imagem,categoria_fotos.titulo as categoria,categoria_fotos.data_cadastro from fotos left join categoria_fotos  on(fotos.id_categoria_fotos=categoria_fotos.id)where (categoria_fotos.id=0".$fotos_id_categoria.")order by categoria_fotos.titulo asc;";
							$result = mysql_query($sql,$link);
							if (($result!=null)&&(true)){
								while ($row = mysql_fetch_assoc($result)){
									$fotos_id=$row ['id'];
									$fotos_id_categoria=$row ['id_categoria_fotos'];
									$fotos_foto=$row ['foto'];
									$fotos_imagem=$row ['imagem'];
									$fotos_categoria=$row ['categoria'];
									$fotos_data_cadastro=$row ['data_cadastro'];
						?>	
							
								<li class="bgHover" style="margin-top:10px;">
									<div class="transparente">
										<a href="./albun_de_fotos/h_<?php echo $fotos_foto;?>" rel="lightbox[roadtrip]">
											<img src="./albun_de_fotos/g_<?php echo $fotos_foto;?>" width="123" height="112">
										</a>
									</div>
								</li>	
							
						<?php 
								}
							}
						?>
						</div>
					</ul>
				</div>
			</div>		
		</div>
	</div>
</div>
	    
	
<?php
	include("rodape.php");
?>     
<?php
	include("./adm/rodape.php");
?>