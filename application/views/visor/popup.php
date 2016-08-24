<div class="ajax-text-and-image white-popup-block">
	<style>
	@font-face {
	font-family: 'Open Sans Condensed'; font-style: normal; font-weight: 300;
	src: local('Open Sans Cond Light'), local('OpenSans-CondensedLight'), url(public/fonts/OpenSansCondensed.woff) format('woff');
	}
	.ajax-text-and-image {
		max-width:1060px;
		margin: 20px auto;
		background: #FFF;
		padding: 0;
		border-radius: 15px 15px;
		line-height: 0;
	}
	.image { width: 80%; float:left; }
	
	.image img { width: 100%; height: auto; }
	
	@media all and (max-width:30em) {
		.image { width: 100%; float:none; }
	}
	
	.voting{
		float: left;
		/*padding: 2px;*/
		width: 18%;
		margin-left: 8px;
		margin-top: 3px;
		/*border: 1px solid;*/
		line-height: 1.231;
		text-align: center;
		font-family: 'Open Sans Condensed', sans-serif;
	}
	.voting h2{
		font-size: 1.8em;
		margin: 0;
		padding-top: 15px;
		padding-bottom: 12px;
		border-bottom: 1px groove;
		margin-bottom: 20px;
	}
	.voting .label{ font-size: 1.3em; }
	.voting #votos{
		margin: auto;
		width: 70px;
		height: 70px;
		/*border: 1px solid;*/
		border-radius: 15px 15px;
		/*background: url(public/img/bg_menu.png);*/
                background: #1E3755;
		color: white;
		line-height: 70px;
		font-weight:bold;
		font-size: 2.5em;
		margin-top: 8px;
		margin-bottom: 20px;
	}
	.voting input[type=button]{
		background:#0D98FB;	
		background-image: -webkit-linear-gradient(top,#0D98FB,#1A5DB3);
		background-image: -moz-linear-gradient(top,#0D98FB,#1A5DB3);
		background-image: -o-linear-gradient(top,#0D98FB,#1A5DB3);	
		background-image: linear-gradient(to bottom,#0D98FB,#1A5DB3);	
		border: 1px solid #125CB5;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		-o-border-radius: 10px;	
		border-radius: 10px;
		-moz-box-shadow: 0 1px 1px #71C0FD inset;
		-webkit-box-shadow: 0 1px 1px #71C0FD inset;
		-o-box-shadow: 0 1px 1px #71C0FD inset;	
		box-shadow: 0 1px 1px #71C0FD inset;
		padding: .3em 1em;
		color: white;
		font-family: 'Open Sans Condensed', sans-serif;
		font-weight:bold;
		font-size: 1.5em;
		margin-bottom: 2px;
		/*text-decoration:none;*/ 
	}

	.voting input[type=button]:hover{
		background:#1A5DB3;
		background-image: -webkit-linear-gradient(bottom,#0D98FB,#1A5DB3);
		background-image: -moz-linear-gradient(bottom,#0D98FB,#1A5DB3);
		background-image: -o-linear-gradient(bottom,#0D98FB,#1A5DB3);	
		background-image: linear-gradient(to top,#0D98FB,#1A5DB3);
		cursor: pointer;
	}
	.voting .important{
		font-size: .8em;
		padding: 10px;
	}
	</style>
	<div class="image">
		<img src="<?php echo $this->path; ?>"/>
	</div>
	<div class="voting">
		<h2>Panel de Votación</h2>
		<p class="label">Cantidad de votos:</p>
		<div id="votos"><?php echo $this->votes; ?>
		</div>
		<input type="button" name="btn<?php echo $this->id; ?>" id="btn" value="Votar" <?php if(isset($this->disabled)) echo $this->disabled; ?> onclick="votarImagen('<?php echo URL . 'visor/processVote/' . $this->id . '/' . $this->yavotados;?>', this, '<?php echo URL . 'visor/readCookieVotes/';?>')"/>
		<p class="important">Para emitir su voto, haga un <strong>click</strong> en el <strong>botón "Votar"</strong>.</p>
                <!--h4>Usted ha emitido <?php if(isset($this->count)) echo $this->count; else echo "0"; ?> de 7 votos permitidos.</h4-->
		<div style="padding: .5em; background: #5696D0; color: white;">
		    <p>Usted ha emitido <strong id="total" style="font-size: 1.3em; font-weight: bold;"><?php if(isset($this->count)) echo $this->count; else echo "0"; ?></strong> de <strong style="font-size: 1.3em;">7</strong> votos permitidos.</p>
		</div>
	</div>
	<div style="clear:both; line-height: 0;"></div>
</div>
<script>
    /*$(document).ready(function() {
        
        var name = document.getElementById('btn').getAttribute('name');
        var value = $.cookie(name);
        if (value == "1") {
            document.getElementById("btn").disabled = "disabled";
        }
        //alert(""+value);
        
    })*/
    
    function votarImagen(path,boton,cook) {
        //var id = document.getElementById('hidden').value;
        document.getElementById("votos").innerHTML = "...";
        document.getElementById("total").innerHTML = "...";
        //alert(""+path);
        $("#votos").load(path+"");
        boton.disabled="disabled";
        $("#total").load(cook+"");
    }
</script>