<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/userservice.php';

class CartController extends Controller
{
    private $orderService;
    private $userService;

    function __construct()
    {
        $this->orderService = new OrderService();
        $this->userService = new UserService();
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            // Retrieve the serialized object from the session variable
            $userSerialized = $_SESSION['user'];
            // Deserialize the object
            $user = unserialize($userSerialized);
            $sessionid = $user->getId();
            $user = $this->userService->getUserById($sessionid);
            $cart = $this->orderService->getOneCart($sessionid); 
            require_once __DIR__ . '/../views/cart/index.php';
        } else {
            $message = "Error: User is not logged in."; 
            require __DIR__ . '/../views/signIn/index.php';
        }
    }
}