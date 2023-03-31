<?php
	include('./adm/conecta.php');
?>
<script> 
          		
                $(function(){
                        $('#slides').cycle({
                                fx: 'zoom', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                                pager:  '#paginador',
                                speed: 300,
                                timeout: 5000,
                                cleartype: false,
                                pause: true
                        });
                });
        </script>

<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


</script>
<div class="clear" style="height:22px;"></div>
<div id="principal" style="overflow:hidden;">
  <div class="conteudo">
    <div class='conteudoInterno'>
      <p>Destaque:</p>
      <div id="paginador"></div>
    </div>
    <?php include("parceiros.php");?>
    <div class='conteudoInterno'>
      <div id="slider">
        <div id="slides">
		<?php		
			$sql = "SELECT codigo,imagem,link FROM slide order by codigo desc"; //altere (clientes) para o nome de sua tabela.
			$result = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta!!!");
			while ($row = mysql_fetch_assoc($result)){	
		?>
  
			<a href="<?php echo $row['link']?>" target="_self"> 
				<img src="./slide/<?php echo $row['imagem']?>" width="767" height="266" alt="1" /> 
			</a>
		<?php
			}
		?>
      </div>
    </div>
	
    <!--barra direita-->
    
    <div class="conteudoInterno" style="margin-top:14px;">
      <p>Ultimas Fotos:</p>
      <ul id="listaGaleria" style="margin-top:10px;">
	   <?php
		
						//conexao com seu bd
						
						$sql_conta = mysql_query("SELECT * FROM fotos");
						$quantreg = mysql_num_rows($sql_conta);
						$sql = "SELECT id,imagem,data_cadastro,titulo FROM categoria_fotos order by id desc limit 0,5"; //altere (clientes) para o nome de sua tabela.
						$result = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta!!!");
						while ($row = mysql_fetch_assoc($result)){	
						?>
        <li class="bgHover" >
        <div class="transparente"> <a href="fotos_7galo.php?codigo=<?php echo $row['id']; ?>"> <img src="./albun_de_fotos/g_<?php echo $row['imagem']?>" width="123" height="112"> </a> </div>
			<div style="background-color:#999999; padding:10px;">
				<div class="data cor" style="margin-top:0px;"><?php echo $row['titulo']?></div>
				<div class="data cor" style="text-align:left; margin-top:3px;"><?php echo $row['data_cadastro']?></div>
				<div class="data cor" style="text-align:left; margin-top:3px;">fotos<a href="fotos_7galo.php?codigo=<?php echo $row['id']; ?>">
					<div class="data cor" style="text-align:right; margin-top:3px;">Ver galeria</div>
				</div>
			</div>
        </a> 
		</li>
        <?php
		}
		?>
        
      </ul>
      <div class="conteudoInterno" style="margin-top:40px;">
        <p>Ultimas Notícias:</p>
        <div class="ultimas_noticias" style="margin-top:10px;"> <a href="./noticias.php">Notícias</a><br>
          <a href="fest.php" class="sublinhado1" style="font-size:18px;">
          <div class="data cor" style=" margin-top:3px;">7 Galo Moto Fest - Clique e saiba mais</a></div>
          <br>
          <br>
          <br>
          <div class="fb-like" data-href="http://www.7galo.com.br" data-send="true" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="lucida grande"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	include('./adm/rodape.php');
?>