<?php

class Login extends Controller
{
    protected $loginResults;
    protected $passwordEntered;

    public function index ()
    {
        $this->view('account/login');
    }

    public function loginInfo ()
    {
        if (!empty($_POST)) {
            if (isset($_POST['email'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            }
            if (isset($_POST['password'])) {
                $this->passwordEntered = filter_var($_POST['password'] , FILTER_SANITIZE_STRING);
            }
            try {
                //Connect to database to insert values
                $dsn = "mysql:host=localhost;dbname=footballzoneadmin";
                $dbuser = "root";
                $dbpass = "";
                $db = new PDO($dsn, $dbuser, $dbpass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT id, forename, email_address, password FROM tbl_users WHERE email_address = :email';
                $preparedStatement = $db->prepare($sql);
                $preparedStatement->bindValue(':email', $email);
                $preparedStatement->execute();

                $this->loginResults = $preparedStatement->fetch(PDO::FETCH_ASSOC);

                return $this->verify();

            }   catch (PDOException $e){
                echo $e->getMessage();
            }
        }
    }

    protected function verify ()
    {
        $email = $this->loginResults['email_address'];
        $password = $this->loginResults['password'];
        $passwordEntered = $this->passwordEntered;
        $forename = $this->loginResults['forename'];

        if (password_verify($passwordEntered, $password)) {
            echo 'Password correct!';
            $_SESSION['userid'] = $this->loginResults['id'];
            $_SESSION['name'] = $this->loginResults['forename'];
            $_SESSION['password'] = $this->loginResults['password'];
            $_SESSION['email_address'] = $this->loginResults['email_address'];

        } else {
            echo 'Password Incorrect';
        }

    }
}