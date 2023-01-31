<?php
namespace App\Classes;

class Users{
  private $email;
  private $nom;
  private $prenom;
  private $mdp;
  private $height;
  private $CIN;
  private $poids;
  private $salaire;
  private $id;
  private $role;

  public  function __construct($email=null, $nom=null, $prenom=null, $mdp=null,$salaire=null, $height=null, $poids=null, $CIN=null, $role=null) {
      $this->email = $email;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->mdp = $mdp;
      $this->CIN = $CIN;
      $this->salaire = $salaire;
      $this->height = $height;
      $this->poids = $poids;
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
    public function edit_patient($pdo = null, $id,$email,$nom,$prenom,$poids,$taille,$cin,$salaire=0){
      $sql = "update  users set nom ='$nom' , prenom ='$prenom' ,email ='$email',poids=$poids,height=$taille,CIN='$cin',salaire=$salaire where id = $id";
		  $result = $pdo->prepare($sql); 
		  $result->execute(); 
		  return $result; 
    }
    public function edit_user($pdo = null, $id,$email,$nom,$prenom,$poids,$taille,$cin,$salaire=0,$role='patient'){
      $sql = "update  users set nom ='$nom' , prenom ='$prenom' ,email ='$email',poids=$poids,height=$taille,CIN='$cin',salaire=$salaire,role='$role' where id = $id";
		  $result = $pdo->prepare($sql);       
		  $result->execute(); 
		  return $result; 
    }
    public function delete($pdo = null, $id){
      $sql = "DELETE from users where id = $id";
		  $result = $pdo->prepare($sql); 
		  $result->execute(); 
		  return $result; 
    }
    public function getAllofRole($pdo = null,$role){
      $sql = "SELECT * from users where role ='$role'";
      $result = $pdo->prepare($sql); 
      $result->execute();  
      return $result; 
      }
}
?>
