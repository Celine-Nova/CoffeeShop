<?php
namespace myFramework\Controllers;

use myFramework\Utils\DBData;
use myFramework\Models\UserModel;

class AuthController extends CoreController {

    public function formLogin()
    {
      
        $this->show('authentification',[
            'title' => "Login",
            
            
        ]);
        
        
    }
    public function auth()
    {
       
        $users = UserModel::getUsers();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Supprime les espaces
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $isValid = true;   
            // dump('form rempli') ;
            if(
                empty($email) || 
                filter_var($email, FILTER_VALIDATE_EMAIL === false) ||
                empty($password) ||
                strlen($password) < 5
                ){
                    // $_SESSION['flash_message']  = 'Identifiant ou mot de passe incorrect';
                    echo ' saisie incorrect';
                } 
        }
        // Méthode pour tester le login et le mdp 
         
            foreach($users as $user)
                // dump($user);
            if ($email == $user->getEmail()) {
               
                echo 'email correct';
            // }else{
            //     $_SESSION['flash_message']  = 'Identifiant ou mot de passe incorrect';
            //     echo "mail incorrect";
            // }
                if (password_verify($password, $user->getPassword())) {
                    echo 'vous etes connecté';
                $_SESSION['email'] = $email;
                header('Location: ' . $_SERVER['BASE_URI'] . '/admin');
                }else{
                    // $_SESSION['flash_message']  = 'Identifiant ou mot de passe incorrect';
                    echo 'mails et/ou mot de passe incorrect';
                }
            }
            
         if (!$isValid) {
    //     if ($isValid === false) {
            $_SESSION['flash_message'] = 'Le couple Identifiant/Mot de passe entré n\'est pas bon';
            // header('Location: ' . $_SERVER['BASE_URI'] . '/login');
        } else {
            // header('Location: ' . $_SERVER['BASE_URI'] . '/login');
        }
    }
}