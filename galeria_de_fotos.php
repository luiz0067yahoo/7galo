<?php
	include('./adm/conecta.php');
?>
<?php include("topo.php");?>
			
			<div class="clear" style="height:22px;"></div>
			
            <div id="principal" style="overflow:hidden;">
                <div class="conteudo">
					<div class="conteudo" style="color:#FFFFFF; ">
					<div class='conteudoInterno'>
					<p>Galeria de Fotos:</p>
					</div>
					
					</div>
					<?php include ("parceiros.php");?>
				
				
						
						<div class='conteudoInterno'> 
							
							
							<ul id="listaGaleria" >
								<?php
									//conexao com seu bd
									error_reporting(0);
									ini_set(�display_errors�, 0 );
									$pg = $_GET['pg'];
									if (!isset($pg))
									{
									$pg = 1;
									}
									$sql = "SELECT id,imagem,data_cadastro,titulo FROM categoria_fotos"; //altere (clientes) para o nome de sua tabela.
									$resultado = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta!!!");
									$lpp = 10; // defina o n�mero de resultados por p�gina.
									$total = mysql_num_rows($resultado);
									if ($total <= $lpp)
									{    
									$total_paginas = 1;
									} else {
									$total_paginas = ceil($total/$lpp);
									}
									$inicio = ($pg - 1) * $lpp;
									$final = $inicio + $lpp - 1;
									$ponteiro = 0;
									$i = "1";
									$colunas="5"; // defina o n�mero de colunas desejado.
									$total="1";
									$sql = "SELECT id,imagem,data_cadastro,titulo FROM categoria_fotos order by id desc"; //altere (clientes) para o nome de sua tabela.
									$result = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta!!!");
									while ($row = mysql_fetch_assoc($result)){	
								?>
								<li class="bgHover" style="margin-top:20px;">
									<div class="transparente">
										<a href="fotos_7galo.php?codigo=<?php echo $row['id']; ?>">
											<img src="./albun_de_fotos/g_<?php echo $row['imagem']?>" width="123" height="112">
										</a>
									</div>
									<div style="background-color:#999999; padding:10px;">
										<div class="data cor" style="margin-top:0px;"><?php echo $row['titulo']?></div>
										<div class="data cor" style="text-align:left; margin-top:3px;"><?php echo $row['data_cadastro']?></div>
										<div class="data cor" style="text-align:left; margin-top:3px;"><?php echo $quantreg; ?> fotos<a href="fotos_7galo.php?codigo=<?php echo $row['id']; ?>">
										  <div class="data cor" style="text-align:right; margin-top:3px;">Ver galeria</div>
										</div>
									</div>
									</a>
								</li>
								   <?php 
							}
							?>
							<div class="clear" style="height:20px;"></div>
							<div id="paginacao" style="margin-left:300px;">
							<?php
						if(!$total==$colunas){
						print"<table>";
						} else {
						print"</table>";
						}
						if ($pg == 1) {    
						echo "<a class='menurodape'>";    
						echo "Anterior |";    
						echo "</a>";
						}
						else
						{    
						echo "<a class='menurodape'>";    
						echo "<a class='menurodape' href=\"galeria_de_fotos.php?pg=".($pg - 1)."\" targe=\"_self\">Anterior</a> |"; // troque (pagina) pela link de sua p�gina.    
						echo "</a>";
						}
						$i = 1;
						while ($i <= $total_paginas) {    
						if ($i == $pg)
						{        
						echo "<strong class='menurodape'><a class='menurodape'>";        
						echo " <b>|<u>$i</u>|</b> ";        
						echo "</a></strong>";    
						}
						else
						{
						echo "<strong class='menurodape'><a class='menurodape'>";        
						echo " <a class='menurodape' href=\"galeria_de_fotos.php?pg=".$i."\" target=\"_self\">".$i."</a> "; // troque (pagina) pela link de sua p�gina.        
						echo "</a></strong>";    
						}
						$i = $i + 1;
						}
						if ($pg == $total_paginas)
						{    
						echo "<a class='menurodape'>";   
						echo "| Próxima\n";    
						echo "</a>";
						}
						else
						{    
						echo "<a class='menurodape'>";    
						echo "| <a class='menurodape' href=\"galeria_de_fotos.php?pg=".($pg + 1)."\" targe=\"_self\">Próxima</a>\n"; // troque (pagina) pela link de sua p�gina.    
						echo "</a>"; }      
						?>
						</div>
								
						</ul>
					</div>
				</div>	
			</div>
	
	    
	
       
        
		
		<div class="clear"></div>
		<?php
	include('./adm/rodape.php');
?>
	<?php
include("rodape.php");
?>
