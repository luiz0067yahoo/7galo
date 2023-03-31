<?php
	include('./adm/conecta.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php include("topo.php");?>
		<div class="clear" style="height:22px;"></div>
            <div id="principal" style="overflow:hidden;">
                <div class="conteudo">
				<div class='conteudoInterno'>
					<p>História do grupo 7 Galo:</p>
				</div>
					<?php include("parceiros.php");?> 
                    <div class='conteudoInterno'>
					 
					<?php		
						$sql = "SELECT codigo,nome,conteudo,data_inicio,data_fim FROM paginas order by codigo desc"; //altere (clientes) para o nome de sua tabela.
						$result = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta!!!");
						while ($row = mysql_fetch_assoc($result)){	
					?>
						<div id="conteudo_grupo" style="margin-top:42px; text-align:left; color:#FFFFFF; font-size:14px;">
							<?php echo $row['conteudo']?>
						</div>
					<?php
					}
					?>
			<div id="fotos_grupo" >
			<ul id="listafotos" >
				<li class="bgHover" style="margin-top:10px;">
					<div class="transparente">
					<a href="./fotos/7galo/25.jpg" rel="lightbox[roadtrip]">
						<img src="./fotos/7galo/25.jpg" width="123" height="112">
					</a>
					</div>
					
				
				</li>
				<li class="bgHover" style="margin-top:10px;">
					<div class="transparente">
					<a href="./fotos/almoco/20.jpg" rel="lightbox[roadtrip]">
						<img src="./fotos/almoco/20.jpg" width="123" height="112">
					</a>
					</div>
					
				
				</li>
				<li class="bgHover">
					<div class="transparente">
					<a href="./fotos/almoco_menino_deus/46.jpg" rel="lightbox[roadtrip]">
						<img src="./fotos/almoco_menino_deus/46.jpg" width="123" height="112">
					</a>
					</div>
					
				
				</li>
				<li class="bgHover" >
					<div class="transparente">
					<a href="./fotos/lancamento_camiseta/6.jpg" rel="lightbox[roadtrip]">
						<img src="./fotos/lancamento_camiseta/6.jpg" width="123" height="112">
					</a>
					</div>
				</li>
			</ul>
		</div>								
	</div>
<!--barra direita-->				
</div>
			<?php
include("rodape.php");
?>
<?php
	include('./adm/rodape.php');
?>