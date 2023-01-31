<?php 
require 'config/db.php';


function logincheck()
{
    
    if (isset($_POST['email']) && isset($_POST['mdp']) && $_POST['email']!="" && $_POST['mdp']!="") {

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        //echo $_POST['mdp'];
        if (strpos($email,"@")==false )
        {
            echo 'EMAIL INVALIDE';
            header('Location: login.php?error=email unvalid&email=true');
        }
        $user = (new App\Classes\Users())->login($GLOBALS['pdo'],$email,$mdp);
    
        if ($user != null ) {
            session_start();
            $_SESSION['user_id'] = $user;
            $User = $_SESSION['user_id'];
            $user = (new App\Classes\Users())->getOne($GLOBALS['pdo'],$User);
            $user = (object) $user;
            $_SESSION['user_role'] = $user->role; 
            $_SESSION['token'] = authapi();
            header('Location: index.php');
            exit;
        } 
        else {
            
            echo "<script>alert('Invalid email or password');setTimeout(()=>{window.location.href='login.php';}, 5000);</script>";
        }
    }else{
        echo 'EMAIL AND PASSWORD ARE REQUIRED';
    }
}
function Register()
{
    
    if (isset($_POST['email']) && isset($_POST['mdp'])&& isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['mdptest']))
    {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];        
        $mdptest =$_POST['mdptest'];
        $nom=$_POST['nom'] ;
        $prenom= $_POST['prenom'];
        
        
        
        if($mdp==$mdptest)
        {
            $user = new App\Classes\Users($email, $nom, $prenom, $mdp);
            
            
            //$testreturn = $user->insert($GLOBALS['pdo']);
            if($user->insert($GLOBALS['pdo']))
            {
                session_start();           
                $_SESSION['user_id'] = $user->getId();
                header('Location: index.php');
                exit;

            }
            else
            {
                header('Location: register.php');
                exit;

            }
           
        }else{
            echo 'NOT SIMILAIRE MDP';
        }
    }
    else{
        echo 'ALL DATE IS REQUIRED ARE REQUIRED';
    }
}

function update()
{
    
    
    $email = $_POST['email'];       
    $nom=$_POST['nom'] ;
    $prenom= $_POST['prenom'];
    $poids = $_POST['poids'];       
    $taille=$_POST['taille'] ;
    $cin= $_POST['cin'];         
    $Users_targett = $_SESSION['user_id_target'];
    $Users_target = (new App\Classes\Users())->edit_patient($GLOBALS['pdo'],$Users_targett,$email,$nom,$prenom,$poids,$taille,$cin);          
    //$testreturn = $user->insert($GLOBALS['pdo']);
    if($Users_target)
    {
                
        header('Location: gestionpatients.php');
        exit;

    }
    else
    {
        header('Location: Modifier_user.php');
        exit;

    }
           
        
    
}
function update_docteur()
{
    
    
    $email = $_POST['email'];       
    $nom=$_POST['nom'] ;
    $prenom= $_POST['prenom'];
    $poids = $_POST['poids'];       
    $taille=$_POST['taille'] ;
    $cin= $_POST['cin'];
    $salaire = $_POST['salaire'];      
    $Users_targett = $_SESSION['user_id_target'];
    $Users_target = (new App\Classes\Users())->edit_patient($GLOBALS['pdo'],$Users_targett,$email,$nom,$prenom,$poids,$taille,$cin,$salaire);          
    //$testreturn = $user->insert($GLOBALS['pdo']);
    if($Users_target)
    {
                
        header('Location: gestiondocterurs.php');
        exit;

    }
    else
    {
        header('Location: Modifier_user_docteur.php');
        exit;

    }
           
        
    
}
function update_user()
{
    
    
    $email = $_POST['email'];       
    $nom=$_POST['nom'] ;
    $prenom= $_POST['prenom'];
    $poids = $_POST['poids'];       
    $taille=$_POST['taille'] ;
    $cin= $_POST['cin'];
    $salaire = $_POST['salaire'];
    $role = $_POST['role'];

    $Users_targett = $_SESSION['user_id_target'];
    $Users_target = (new App\Classes\Users())->edit_user($GLOBALS['pdo'],$Users_targett,$email,$nom,$prenom,$poids,$taille,$cin,$salaire,$role);          
    //$testreturn = $user->insert($GLOBALS['pdo']);
    if($Users_target)
    {
                
        header('Location: gestionusers.php');
        exit;

    }
    else
    {
        header('Location: Modifier_user_user.php');
        exit;

    }
           
        
    
}
function authapi($user=null,$mdp=null)
{
    $token= file_get_contents("https://clinic.maktab.ma/api/user/get_token?login=admin&password=secret32110");
    return json_decode($token);

}
function listrdv($url)
{
  if( $_SESSION['user_role']=='admin')
  {
    $opts = [
        "http" => [
        "method" => "GET",
        "header" => "accept: application/json\r\n" .
        "Authorization: Basic YWRtaW46c2VjcmV0MzIxMTA=\r\n"
        ]
    ];
    
    $context = stream_context_create($opts);
    
    $file = file_get_contents($url, false, $context);
    return json_decode($file) ;

  }
  else
  {
    
  }
  return false;
}




?>