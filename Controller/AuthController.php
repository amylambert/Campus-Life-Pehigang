<?php

class AuthController extends AbstractController
{
    public function home() : void
    {
        $this->render('home', []);
    }

    public function login() : void
    {
        if(isset($_POST["email"]) && !empty($_POST["email"])
        && isset($_POST["password"]) && !empty($_POST["password"]))
        {
            $userMan = new UserManager;
            $user = $userMan->findByEmail($_POST["email"]);
            if($user != null)
            {
                if(password_verify($_POST["password"], $user->getPassword()))
                {
                    $_SESSION["firstName"] = $user->getFirstName();
                    $_SESSION["lastName"] = $user->getLastName();
                    $_SESSION["email"] = $user->getEmail();
                    $_SESSION["role"] = $user->getRole();
                    $_SESSION["id"] = $user->getId();
                    $this->redirect('index.php?route=profile');
                }

                $data=["Mot de passe invalide"];
                $this->render('login', ["data"=>$data]);
            }

            $data=["Il n'existe pas d'utilisateur avec cette adresse mail"];
            $this->render('login', ["data"=>$data]);
        }
        elseif(isset($_POST["email"]) && !empty($_POST["email"])
        || isset($_POST["password"]) && !empty($_POST["password"]))
        {
            $data=["Remplissez tous les champs"];
            $this->render('login', ["data"=>$data]);
        }

        $this->render('login', []);
    }

    public function logout() : void
    {
        session_destroy();
        $this->redirect('index.php');
    }

    public function register() : void
    {
        if(isset($_POST["firstName"]) && !empty($_POST["firstName"])
        && isset($_POST["lastName"]) && !empty($_POST["lastName"])
        && isset($_POST["email"]) && !empty($_POST["email"])
        && isset($_POST["password"]) && !empty($_POST["password"])
        && isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"]))
        {
            $isEmailUsed = false;
            $userMan = new UserManager;
            $users = $userMan->findAll();
            foreach($users as $user)
            {
                if($user->getEmail() === $_POST["email"])
                {   
                    $isEmailUsed = true;
                }
            }
            if($isEmailUsed === true)
            {
                $data=["Cet email est déjà utilisé"];
                $this->render('register', ["data"=>$data]);
            }
            if($_POST["password"] === $_POST["confirmPassword"] && $isEmailUsed === false)
            {
                $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $newUser = new User(
                    $_POST["firstName"],
                    $_POST["lastName"],
                    $_POST["email"],
                    $hashedPassword);
                $userMan->create($newUser);
                $this->render('login', []);
            }
            elseif($isEmailUsed === false)
            {
                $data = ["Les mots de passe de correspondent pas..."];
                $this->render('register', ["data"=>$data]);
            }
        }
        elseif(isset($_POST["firstName"]) && !empty($_POST["firstName"])
        || isset($_POST["lastName"]) && !empty($_POST["lastName"])
        || isset($_POST["email"]) && !empty($_POST["email"])
        || isset($_POST["password"]) && !empty($_POST["password"])
        || isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"]))
        {
            $data = ["Veuillez remplir touts les champs"];
            $this->render('register', ["data"=>$data]);
        }

        $this->render('register', []);

    }

    public function notFound() : void
    {
        $this->render('notFound', []);
    }
}