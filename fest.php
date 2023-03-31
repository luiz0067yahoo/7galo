<style type="text/css">
#fotohotel {
	width:95px;
	height:300px;
	float:left;
	display:block;
	overflow:hidden;
}
#hotel1 {
	width:95px;
	height:50px;
	float:left;
	clear:both;
	margin-top:50px;
}
#hotel2 {
	width:95px;
	height:50px;
	float:left;
	clear:both;
	margin-top:50px;
}
#hotel3 {
	width:95px;
	height:50px;
	float:left;
	clear:both;
	margin-top:50px;
}
.conteudofestt {
	width:670px;
	display:block;
	float:left;
	margin-left:30px;
	float:left;
	text-align:left;
	color:#FFF;
	font-size:14px;
}
#mapa {
	width:300px;
	height:200px;
	float:left;
	display:block;
	overflow:hidden;
	border-width:10px;
	border-style:solid;
	border-color:#666666;
}
#fotoevento {
	width:400px;
	height:200px;
	float:left;
	display:block;
	overflow:hidden;
}
</style>
<?php include("topo.php");?>
  <div class="clear" style="height:22px;"></div>
  <div id="principal" style="overflow:hidden;">
    <div class="conteudo">
      <div class="conteudo" style="color:#FFFFFF; ">
        <div class='conteudoInterno'>
          <p> 7 Galo Moto Fest </p>
        </div>
      </div>
      <?php include ("parceiros.php");?>
      <div class="conteudoInterno">
        <div class="conteudoInterno1" style="color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding-right:50px; line-height:30px;"> O 7 GALO MOTOFEST, será realizo no Centro de Eventos da Vila Pioneiro, e contará com um Gaiolão no meio da galera, para patinação de motos, com total segurança.<br>
          Shows diversos com: Acdc Cover,Maverick Preto, Blues Dogs, Zombie Crew, Dj Ander.<br>
          Espaço Reservado para dinanômetros, para medir a potência de sua moto!<br>
          Area de Camping<br>
          Praça de alimentação<br>
          <br>
          <p>Local:</p>
          Rua dos Pioneiros, 1261 - Vila Pioneiro <br>
        </div>
        <div class="conteudoInterno">
          <div id="fotoevento"><img src="fotos/festa.jpg" width="300" height="200" border="0"></div>
          <div id="mapa">
            <iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+dos+Pioneiros,+1261,+Toledo+-+Paran%C3%A1&amp;aq=0&amp;oq=rua+dos+pioneiros,+1261,+tol&amp;sll=-25.205378,-53.146899&amp;sspn=0.007222,0.016512&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=R.+dos+Pioneiros,+1261+-+Vila+Pioneiro,+Toledo+-+Paran%C3%A1&amp;ll=-24.746753,-53.728123&amp;spn=0.017149,0.02738&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
          </div>
        </div>
        <div class="conteudoInterno" style="margin-top:20px;">
          <p>Hotelaria</p>
          <div id="fotohotel">
            <div id="hotel1"><img src="imagens/hotel1.jpg" width="95" height="50" border="0" alt="hotel"></div>
            <div id="hotel2"><img src="imagens/hotel2.jpg" width="95" height="50" border="0" alt="hotel"></div>
            <div id="hotel3"><img src="imagens/maestro.jpg" width="95" height="50" border="0" alt="hotel"></div>
          </div>
          <div class="conteudofestt"> <br>
            <br>
            Hotel Nayru<br>
            Fone: 45 3055-3307 <br>
            Rua Almirante Barroso, 2435 - Centro<br>
            <a class="sublinhado" href="mailto:nayruhotel@hotmail.com" target="_blank">FAZER RESERVA</a><br>
            <br>
            <br>
            Vila Verde Hotel<br>
            Fone: 45 3277-0001 <br>
            Rua Nossa senhora do Rocio, 1439 - Centro<br>
            <a class="sublinhado" href="mailto:vilaverdehotel@vilaverdehotel.com" target="_blank">FAZER RESERVA</a><br>
            <br>
            <br>
            <div class="ultimas_noticias" > </div>
            Hotel Maestro<br>
            Fone: 45 3378-5425 <br>
            Av. Parigot de Souza, 2959 - Centro<br>
            <div class="ultimas_noticias" > </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
include("rodape.php");
?>
