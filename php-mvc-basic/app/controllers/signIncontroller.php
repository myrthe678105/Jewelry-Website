<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/userservice.php';
class SignInController extends Controller
{
    private $userService;

    function __construct()
    {

        $this->userService = new UserService();
    }

    public function index()
    {
        $message = "";
        require __DIR__ . '/../views/signIn/index.php';
    }

    public function validateLogin($user_name, $password)
    {
        $loggedIn = $this->userService->verifyUser($user_name, $password);
        if ($$loggedIn !== null) {
            $user = $this->userService->getByUsername($user_name);
            echo("Log in was successful, welcome " . $user->name);
            require_once "../views/home/index.php";
        } else {
            echo "Invalid username or password";
        }
    }


    public function signIn(){
        if (isset($_POST['login'])) {
            if (!empty($_POST['usernameinput']) && !empty($_POST['passwordinput'])) {
                $username = htmlspecialchars($_POST['usernameinput']);
                $password = htmlspecialchars($_POST['passwordinput']);
                $user = $this->userService->verifyUser($username, $password);
                // Serialize the object
                $userSerialized = serialize($user);

                switch ($user) {
                    case null:
                        $message = "Wrong password or email address!";
                        require __DIR__ . '/../../views/signIn/index.php';
                        break;

                    case $user->getRole() == 1:
                        $_SESSION["user"] = $userSerialized;
                        header('location:/');
                        break;

                    case $user->getRole() == 2:
                        $_SESSION["user"] = $userSerialized;
                        header('location:/admin');
                        break;
                }
            } else{
                $message = "field is left blank!";
                require __DIR__ . '/../views/signIn/index.php';
            }
            
        }
    }
    public function logout()
    {
        $_SESSION["user"] = null;
        header('location:/');
    }

}
?>