<?php
namespace App\Classes;

class Users{
  private $email;
  private $nom;
  private $prenom;
  private $mdp;
  private $id;

  public  function __construct($email=null, $nom=null, $prenom=null, $mdp=null) {
      $this->email = $email;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->mdp = $mdp;
  }
  public function setEmail($email) {
    $this->email = $email;
 }

  public function getEmail() {
    return $this->email;
  }
  public function setId($id) {
    $this->id = $id;
 }

  public function getId() {
    return $this->id;
  }

  public function setNom($nom) {
      $this->nom = $nom;
  }

  public function getNom() {
      return $this->nom;
  }

  public function setPrenom($prenom) {
      $this->prenom = $prenom;
  }

  public function getPrenom() {
      return $this->prenom;
  }

  public function setMdp($mdp) {
      $this->mdp = $mdp;
  }

  public function getMdp() {
      return $this->mdp;
  }


    public function insert($pdo = null)
    {
      var_dump($this);
      
      $sql = "insert into users (email,nom,prenom,mdp) values ('$this->email','$this->nom','$this->prenom','$this->mdp') ";
      $result = $pdo->prepare($sql); 
      
      try {
        $result->execute(); 
        $this->setId($pdo->lastInsertId());
        return true;
      } 
      catch (\exception $e)
      {
        return false;
      }
        
    }
    public function getAll($pdo = null){
		$sql = "SELECT * from users";
		$result = $pdo->prepare($sql); 
		$result->execute();  
		return $result; 
    }
    public function getOne($pdo = null,$id){
		$sql = "select * from users where id = '$id' limit 1";
		$result = $pdo->prepare($sql); 
		$result->execute(); 
		if($result->rowCount() > 0){
      $row = $result->fetch($pdo::FETCH_OBJ);
      
      return $row;
    } 
    else{
      return null;
    }
    }
    public function login($pdo = null,$email,$mdp){
      $sql = "select * from users where email = '$email' and mdp ='$mdp' limit 1";
      $result = $pdo->prepare($sql); 
      $result->execute(); 
      
      
      if($result->rowCount() > 0){
        $row = $result->fetch($pdo::FETCH_OBJ);
        return $row->id;
      } 
      else{
        return null;
      }
     
    }
    public function edit($pdo = null, $data){
        
    }
    public function delete($pdo = null, $id){
        $sql = "DELETE from users where id = $id";
		$result = $pdo->prepare($sql); 
		$result->execute(); 
		return $result; 
    }
}
?>
