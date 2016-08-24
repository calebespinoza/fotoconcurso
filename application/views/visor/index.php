<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>VisorDev</title>
        <link href="public/css/estilo.css" rel="stylesheet">
        <link href="public/Magnific-Popup-0.9.9/magnific-popup.css" rel="stylesheet">
    </head>
    <body>
        <div id="head">
            <div id="logo">
                <h1>CONCURSO DE FOTOGRAFÍAS</h1>
            </div>
            <div id="menu">
                <menu>
                    <a href="<?php echo URL ?>">Inicio</a>
                    <a href="">¿Cómo Participar?</a>
                    <a href="">Administración</a>
                    <!--a href="">Cerrar Sesión</a-->
                </menu>
            </div>
        </div>
        <div id="container">
            <h1><?php if(property_exists($this, "title")) echo $this->title; else echo "MENÚ DE FOTOGRAFÍAS"; ?></h1>    
<?php
    $indice = 1;
    for($i=1; $i<=$this->rows; $i++)
    {
        echo "<div id='wrapper'>"; //class='parent-container'>";
        for($j=1; $j<=4; $j++)
        {
            if($indice <= $this->total)
            {
                //echo "<a href='". URL ."visor/popup/{$this->id[$indice]}' class='simple-ajax-popup'>{$this->name[$indice]}";
                /*echo "<div id='banner'><!--p>{$this->name[$indice]}</p-->
                    <a href='public/popup.php?id={$this->id[$indice]}&path={$this->path[$indice]}&votes={$this->votes[$indice]}' class='simple-ajax-popup'><img src='{$this->path[$indice]}' alt='{$this->name[$indice]}'/></a>
                    </div>";*/
                if(isset($_COOKIE['votes'])){
                    $yavotados = $_COOKIE['votes'];
                }else{
                    $yavotados = 0;
                }
                echo "<div id='banner'><!--p>{$this->name[$indice]}</p-->
                    <a href='". URL ."visor/popup/{$this->id[$indice]}/{$yavotados}' class='simple-ajax-popup'><img src='{$this->path[$indice]}' alt='{$this->name[$indice]}'/></a>
                    </div>";
                $indice++;
            }else
                break;
        }
        echo "</div>";
    }
?></div>
        </div>
        <div id="footer">
            <p>Desarrollado por <a href="">Caleb Espinoza</a></p>
        </div>
        <script src="public/js/jquery-1.11.1.min.js"></script>
        <script src="public/Magnific-Popup-0.9.9/jquery.magnific-popup.js"></script>
        <script>
            $(document).ready(function() {
                $('.simple-ajax-popup').magnificPopup({
                    type: 'ajax',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: false
                    }
                });
 		/*$('.parent-container').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    gallery: {
                        enabled: true,
                        navigateByImgClick: false
                    },
                    image: {
                        markup: '<div class="mfp-figure">'+
                                    '<div class="mfp-close"></div>'+
                                    '<div class="mfp-img"></div>'+
                                    '<div class="mfp-bottom-bar">'+
                                        '<div class="mfp-title"></div>'+
                                        '<div class="mfp-counter"></div>'+
                                    '</div>'+
                                '</div>',
                        titleSrc: 'caleb',
                        cursor: null
                    },
                    type: 'image'
                    // other options
                });*/		
	    }); 
        </script>
    </body>
</html>
