<?php include("topo.php");?>
		
			<div class="clear" style="height:22px;"></div>
			
            <div id="principal" style="overflow:hidden;">
                <div class="conteudo">
				<div class='conteudoInterno'>
					<p>Entre em contato conosco:</p>
					
				</div>
				<?php include ("parceiros.php");?>
						
            <div class="conteudocontato" style="margin-top:15px;">
		
			<div class="transparente" >
				<form name="form1" id="form1" action="enviar_contato.php" method="post" class="formcontato">
			
			
				 
				 <br>
				 <br>
				 Nome:<br>
				 <input name="nome" type="text" class="inputcontato" id="nome">
				 <br>
				 <br>
				 Telefone:<br>
				<input name="fone" type="text" class="inputcontato" id="fone">
				 <br>
				 <br> 
				  Assunto<br>
				  <input name="assunto" type="text" class="inputcontato" id="assunto">
				  <br>
				  <br>
				  E-mail:<br>
				 <input name="email" type="text" class="inputcontato" id="email">
				 <br>
				 <br>
				  Mensagem:<br>
				  <textarea name="mensagem" type="textarea"    class="inputcontato" id="mensagem"></textarea>
				  <br>
				  <br>
				  <div class="clear"></div>
				  <div style="margin-top:50px;">
				  <input type="submit" name="enviar" value="Enviar" id="enviar" style=" margin-left:10px; margin-top:10px;">
				  <input type="reset" name="reset" value="Limpar" id="reset" style=" margin-left:10px; margin-top:10px; ">
				  </div>
				  
				</form>
				
			
		

					<!-- inicio dos campos ao lado do formulario -->
			
					<div id="contato" >
				
				MOTOCLUBE 7GALO<br>
				motoclube@7galo.com.br<br>
				contato@7galo.com.br<br>
				<br />
				<br>
				ANDERSON (CRESPYM) 45-9961-0127<br>
				EDVALDO 45 - 9966-0051<br>
				VANDERLEI 45 - 9918-9757<br>
				ALEANDRO 44 - 9147-8867<br>
                LEANDRO DE MORAES 45 - 9922-9091<br>
			
			</div>	
			<div class="clear"></div>
			</div>
			
					</div>
						
						
						<!--barra direita-->
						
						</div>
					</div>   
		<?php
include("rodape.php");
?>