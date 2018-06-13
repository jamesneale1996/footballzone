<?php
class Signup extends Controller
{
    public function index()
    {
        $this->view('account/signup');
    }

    public function add()
    {
        //Check post from data for signup and santitize
        if (!empty($_POST)) {
            if (isset($_POST['forename'])) {
                $forename = filter_var($_POST['forename'], FILTER_SANITIZE_STRING);
            }
            if (isset($_POST['surname'])) {
                $surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
            }
            if (isset($_POST['email'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            }
            if (isset($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            }
            if (isset($_POST['permission'])) {
                $permission = filter_var($_POST['permission'], FILTER_SANITIZE_STRING);
                $permission = (int)$permission;
            }

            try {
                //Connect to database to insert values
                $dsn = "mysql:host=localhost;dbname=footballzoneadmin";
                $dbuser = "root";
                $dbpass = "";
                $db = new PDO($dsn, $dbuser, $dbpass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql = "INSERT INTO tbl_users (forename, surname, email_address, password, permission) VALUES (:forename, :surname, :email, :password, :permission)";
    
                $preparedStatement = $db->prepare($sql);
                $preparedStatement->bindValue(':forename', $forename);
                $preparedStatement->bindValue(':surname', $surname);
                $preparedStatement->bindValue(':email', $email);
                $preparedStatement->bindValue(':password', $password);
                $preparedStatement->bindValue(':permission', $permission, PDO::PARAM_INT);
                $preparedStatement->execute();

            }   catch (PDOException $e){
                echo $e->getMessage();
            }

            $this->view('account/signupSubmitted');

        } else {
            $url = 'http://' . $_SERVER['HTTP_HOST'] . '/admin/public/signup/';
            header('Location: ' . $url, true, 302);              // Use either 301 or 302
            die;
        }

    }
}
