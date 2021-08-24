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
            // dump('form rempli') ;
            if(
                empty($email) || 
                filter_var($email, FILTER_VALIDATE_EMAIL === false) ||
                empty($password) ||
                strlen($password) < 5
                ){
                    $_SESSION['flash_message']  = 'Identifiant ou mot de passe incorrect';
                    header('Location: ' . $_SERVER['BASE_URI'] . '/login');
                    // echo ' saisie incorrect';
                } 
        }
        // Méthode pour tester le login et le mdp 
         
            foreach($users as $user)
                // dump($user);
            if ($email == $user->getEmail()) {
               
                if (password_verify($password, $user->getPassword())) {
                    echo 'vous etes connecté';
                $_SESSION['email'] = $email;
                header('Location: ' . $_SERVER['BASE_URI'] . '/admin');
                }else{
                    $_SESSION['flash_message']  = 'Identifiant ou mot de passe incorrect';
                    header('Location: ' . $_SERVER['BASE_URI'] . '/login');
                    // echo 'mails et/ou mot de passe incorrect';
                }
            }
  
    }
    public function logout(){
        // On initialise, pour savoir de quelle session on parle
        session_start();
        // Ensuite, et seulement ensuite, on peut se permettre de supprimer la session,
        // puisqu'on sait de laquelle il s'agit
        session_destroy();

        session_start();
        $_SESSION['flash_message'] = 'Vous avez été correctement déconnecté';
        header('Location: ' . $_SERVER['BASE_URI'] . '/login');
    }
}