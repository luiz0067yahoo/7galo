﻿<head>
<meta http-equiv="Content-Type" />
<title>CRM Midiamix</title>
<link rel="stylesheet" type="text/css" href="estilocrm.css" />
<style type="text/css">
body {
	width:100%;
	height:100%;
	margin-left:0px;
	margin-right:0px;
	margin-top:0px;
	margin-bottom:0px;
	position:absolute;
	background-color:#FFF;

}
</style>
<script type="text/javascript">
	function MM_swapImgRestore() { //v3.0
	  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	function MM_preloadImages() { //v3.0
	  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
		var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
		if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}
	
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_swapImage() { //v3.0
	  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body>
<body onLoad="MM_preloadImages('imagenscrm/senha1.gif','imagenscrm/suporte1.gif')">
<div id="tudo">
<div class="linhastotal" style="background-color:#000;">
  <div id="barrasair">
    <div id="sair">
      <div id="botaooff"><img src="imagenscrm/off.gif" width="26" height="30" border="0" /></div>
      <div id="divtextosair"><a class="textosair" href="./index.php">SAIR</a></div>
    </div>
    <div class="branco" style="width:750px; height:30px;"></div>
    <div id="encerramento">SESSÃO ENCERRA EM:
    &nbsp;<a id="cronometro"></a></div>
  </div>
</div>
<div class="linhastotal" style="background-color:#E8E8E8;">
  <div class="linhascentro">
    <div id="barrabanner">
      <div id="containercrm">
        <div id="crmmidiamix"><img src="imagenscrm/crmmidiamix.jpg" width="210" height="84" /></div>
      </div>
      <div id="containercliente">
        <div id="fotocliente"><img src="imagenscrm/logo.jpg" width="80" height="120" border="0"></div>
      </div>
      <div class="branco" style="height:140px; width:300px;"></div>
      <div id="riscobarra"></div>
      <div id="containerjava">
        <div class="branco" style="width:197px; height:76px; margin-top:14px; display:inline;">
          <div class="branco" style="height:71px; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-top:5px; color:#666666;">Tecnologia</div>
		  <div class="branco" style="margin-top:25px;"> <img src="imagenscrm/php.png" width="80" height="50" border="0"></div>
          <div id="logojava"></div>
        </div>
        <div class="branco" style="width:197px; height:50px;">
          <div id="logomix"></div>
          <div class="branco" style="width:153px; height:50px; display:block; overflow:hidden; font-family:Verdana, Geneva, sans-serif; font-size:08px; color:#666666;">Developed by<br>
            <a style="font-size:10px;">Studio Midiamix</a><br>
            Todos os direitos reservados&copy;</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="linhastotal" style="background-image:url(imagenscrm/risco1.gif); background-repeat:repeat-x;">
  <div class="linhascentro">
    <div id="risco1"></div>
  </div>
</div>
<div class="linhastotal">
  <div class="linhascentro">
    <div id="barrausuario">
      <div id="bemvindo">Bem - Vindo,

      </div>
      <div class="branco" style="width:511px; height:45px; float:left;"></div>
      <div id="ferramentas">
        <div id="trocarsenha"><a href="./cadastro_usuario.php" target="conteudomeio" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','imagenscrm/senha1.gif',1)"><img src="imagenscrm/senha2.gif" alt="Trocar Senha" name="Image2" width="124" height="45" border="0" id="Image2" /></a></div>
        <div id="suporte"><a href="suporte.php" target="conteudomeio" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','imagenscrm/suporte1.gif',1)"><img src="imagenscrm/suporte2.gif" alt="Suporte" name="Image3" width="114" height="45" border="0" id="Image3" /></a></div>
      </div>
    </div>
  </div>
</div>
<div class="linhastotal" style="background-image:url(imagenscrm/risco1.gif); background-repeat:repeat-x;">
  <div class="linhascentro">
    <div id="risco1"></div>
  </div>
</div>

<div class="linhastotal" style="background-image:url(imagenscrm/risco1.gif); background-repeat:repeat-x;">
  <div class="linhascentro">
    <div id="risco1"></div>
  </div>
</div>
<body>
</body>
</html>
<div class="linhastotal">
<div id="conteudocentro">
<div class="menuprincipal">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crn Midiamix</title>
<link rel="stylesheet" type="text/css" href="estilocrm.css" />
</head>

<body>
<div id="menuscontainer">

	<div id="menudecomando">CADASTRO - Home</div>
    <div class="branco" style="width:257px; height:28px;"></div>
        <ul id="menulateral">
            <li>
            <a href="./cadastro_slide.php" target="conteudomeio"
            >Slideshow</a>
            </li>
          
			<div id="menudecomando">
			O GRUPO
			</div>
		</ul>
			<ul id="menulateral">
            <li>
            <a href="./cadastro_grupo.php" target="conteudomeio" 
			>O grupo</a>
            </li> 
			
			<div id="menudecomando">
			  	GALERIA DE FOTOS
			</div>
			</ul>
				<ul id="menulateral">
			
			 <li>
            <a href="./cadastro_categoria_fotos.php" target="conteudomeio"  
            >Galeria de Fotos</a>
            </li>
       		<li>
    		<a href="./cadastro_fotos.php" target="conteudomeio"
    		>Fotos</a>
    		</li>
        </ul>
		
		
</div>
</body>
</html>

</div>
<div id="divisorconteudovertical"></div>
<div id="conteudoprincipal">
  <iframe name="conteudomeio" width="730" height="700" vspace="0" hspace="0" scrolling="auto" frameborder="0" src="inicial.php"></iframe>
</div>
</div>
</div>

</body>
</html>
