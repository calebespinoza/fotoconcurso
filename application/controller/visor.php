<?php
class Visor extends Controller {

    public function index()
    {
        $imagesModel = $this->loadModel('ImagesModel');
        $images = $imagesModel->getAllImages(); //array de objetos
        
        $indice= 1;
        $id = array();
        $name = array();
        $path = array();
        $votes = array();
        
        foreach ($images as $image) {
            /*if(!isset($_COOKIE['btn}' . $image->id])){
                setcookie("btn{$image->id}", "0", time() + 3600, "/");
            }*/
            $id[$indice] = $image->id;
            $name[$indice] = $image->name;
            $path[$indice] = $image->path;
            $votes[$indice] = $image->votes;
            $indice++;
        }
    
        $resul = count($images)/4;
        if((count($images)%4) == 0){
            $rows = floor($resul);
        }else{
            $rows = floor($resul)+1;
        }
        $this->view->title = "MENÚ DE FOTOGRAFÍAS";
        $this->view->rows = $rows;
        $this->view->total = count($images);//$indice - 1;
        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->path = $path;
        $this->view->votes = $votes;
        
        /*if(!isset($_COOKIE['votes']))
            setcookie("votes", "0", time() + 3600, "/");
        else
            echo "La cookie ya existe y su valor es: " . $_COOKIE['votes'];*/
        
        $this->view->render('visor/index', true);
        //$this->loadView('Fotos'); //Cargando la vista Fotos ubicada en /views/fotos.php
        //require 'application/views/visor/index.php';
    }
    
    public function popup($id, $yavotados)
    {
        $imagesModel = $this->loadModel('ImagesModel');
        $image = $imagesModel->getImage($id);
        $this->view->id = $image->id;
        $this->view->name = $image->name;
        $this->view->path = $image->path;
        $this->view->votes = $image->votes;
        
        if(isset($_COOKIE['votes'])){
            $this->view->count = $_COOKIE['votes'];
            if(($_COOKIE['votes'] + 1) <= 7){
                if(isset($_COOKIE['btn' . $id])){
                    if($_COOKIE['btn' . $id] == 1){
                        $this->view->disabled = "disabled";
                    }
                }
            }else{
                $this->view->disabled = "disabled";
            }
        }else{
            //header('Location: ' . URL);
            setcookie("votes", $yavotados + "", time() + 3600, "/");
        }
        $this->view->yavotados = $yavotados;
        $this->view->render('visor/popup', true);
    }
    
    public function processVote($id, $yavotados){
        $imagesModel = $this->loadModel('ImagesModel');
        if(isset($_COOKIE['votes']))
        {
            $imagesModel->updateVote($id);
            $nrovotes = $_COOKIE['votes'] + 1;
            setcookie("votes", $nrovotes . "", time() + 3600, "/");
            setcookie("btn" . $id, "1", time() + 3600, "/");
        }else{
            setcookie("votes", $yavotados + "", time() + 3600, "/");
        }
        sleep(1);
        $vote = $imagesModel->getVote($id);
        echo $vote;
    }
    
    public function readCookieVotes(){
        sleep(1);
        if(isset($_COOKIE['votes']))
        {
            echo $_COOKIE['votes'] + 1;
        }else{
            echo 0;
        }
    }
    
}

?>