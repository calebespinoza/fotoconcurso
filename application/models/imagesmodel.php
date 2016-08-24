<?php

class ImagesModel {
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function getAllImages()
    {
        $sql = "SELECT id, name, path, votes FROM voting";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getImage($id)
    {
        $sql = "SELECT * FROM voting WHERE id = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    
    public function updateVote($id)
    {
        $sql = "UPDATE voting SET votes = votes + 1 WHERE id = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    public function getVote($id){
        $sql = "SELECT votes FROM voting WHERE id = {$id}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->votes;
    }
}

?>