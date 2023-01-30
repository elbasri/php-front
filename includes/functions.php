<?php 
require 'config/db.php';


function logincheck()
{
    
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
    
        $user = (new App\Classes\Users())->login($GLOBALS['pdo'],$email,$mdp);
    
        if ($user != null ) {
            session_start();
            $_SESSION['user_id'] = $user;
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






?>