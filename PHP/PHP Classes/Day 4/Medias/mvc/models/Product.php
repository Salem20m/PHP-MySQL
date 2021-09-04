<?php

class Product extends Model
{
    private $id;
    private $name;
    private $description;
    private $table = 'product';
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function insert(){
        $stmt = $this->prepare('INSERT INTO ' . $this->table . '(name,description) VALUES(?,?)');
        return $stmt->execute([$this->name, $this->description]);
    }
    
    public function update(){
        $stmt = $this->prepare('UPDATE ' . $this->table . ' SET name = ?,description = ? WHERE id = ?');
        return $stmt->execute([$this->name, $this->description, $this->id]);
    }    

    public function find($id) {
        $stmt = $this->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetchObject(get_called_class());
    }
    
    public function findAll() {
        $stmt = $this->query('SELECT * FROM ' . $this->table);
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    public function delete() {
        $stmt = $this->prepare('DELETE FROM ' . $this->table . ' WHERE id = ?');
        return $stmt->execute([$this->id]);
    }
}
?>