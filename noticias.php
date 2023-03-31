<?php include("topo.php");?>
	
			
			<div class="clear" style="height:22px;"></div>
			
            <div id="principal" style="overflow:hidden;">
                <div class="conteudo">
					<div class="conteudo" style="color:#FFFFFF; ">
					<div class='conteudoInterno'>
	<p>					Notícias
					
						
	</p>
	
	</div>

					</div>
						<?php include ("parceiros.php");?>
				<div class='conteudoInterno'>
						
						<div class="conteudoInterno" style="margin-top:20px;"> 
							
						<p>					Notícias:</p>
						<div class="conteudoInterno" style="margin-top:10px;"> 
							
							<div class="ultimas_noticias" >
						<?php
class myxmlreader{
	protected $title;
	protected $link;
	protected $itens;
	protected $info;
	protected $description;

	function __construct($file){
		$this->info = simplexml_load_file($file);
		$this->title = $this->info->channel->title; //titulo do RSS
		$this->link = $this->info->channel->link; //link para a pagina do RSS
		$this->itens = $this->info->channel->item;
		$this->description = $this->info->channel->description;
}

	function reader(){
	
		for ($i = 0; $i < sizeof($this->itens); $i++){
			echo "<br><a href=\"" . $this->itens[$i]->link . "\">". "". $this->itens[$i]->title . " - " . $this->itens[$i]->pubDate . "</a>";
		
		}
	}
}

//usando ...
$xml = new myxmlreader("http://rss.terra.com.br/0,,EI5083,00.xml");
$xml->reader();
?>
	
								
							</div>
							</div>
						</div>
						
				</div>
					
						
			</div>
					
			</div>

	    
	
       
        
		<?php
include("rodape.php");
?>