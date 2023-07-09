<?php
class connection{
  public PDO $pdo;
    public function __construct()
    {
    $this->pdo = new PDO('mysql:host=localhost;dbname=note', 'root', '');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
    }
    public function getNotes(){
        $statement=$this->pdo->prepare("select * from note_info order by date desc");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
   public function addNote($note){
    $statement=$this->pdo->prepare("insert into note_info(title,description,date) values(:title,:description,:date)");
    $statement->bindValue('title',$note['title']);
    $statement->bindValue('description',$note['description']);
    $statement->bindValue('date',date('y-m-d H:i:s'));
    return $statement->execute();
   }
   public function getNotesByID($id){
    $statement=$this->pdo->prepare("select * from note_info where id=:id");
    $statement->bindValue('id',$id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}
public function updateNote($id,$note){
$statement=$this->pdo->prepare("UPDATE note_info SET title=:title, description=:description WHERE id=:id
");
 $statement->bindValue('id',$id);
$statement->bindValue('title',$note['title']);
$statement->bindValue('description',$note['description']);
return $statement->execute();

}
public function deleteNote($id){
  $statement=$this->pdo->prepare("delete from note_info  WHERE id=:id
  ");
   $statement->bindValue('id',$id);
return $statement->execute();
}
}