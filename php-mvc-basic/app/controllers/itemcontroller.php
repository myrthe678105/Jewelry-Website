<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/order.php';
class ItemController extends Controller
{
    private $orderService;

    public function __construct(){
        $this->orderService = new OrderService();

    }

    public function index()
    {
        $items = $this->itemService->getAll();
        require __DIR__ . '/../views/home/item.php';
    }

    public function addOrder()
{
    if (isset($_POST['addOrder'])) {
        $user = unserialize($_SESSION['user']);
        $userId = $user->getId();
        $itemId = htmlspecialchars($_POST['itemid']);
        $this->orderService->insertOrder($userId, $itemId);
        header('location:/');
    } else{
        echo "Error: could not add order.";

    }
}
public function updateOrders()
{
    if (isset($_POST['order'])) {
        $order = $_POST['orderid']; 
        $this->orderService->updateOrder($order);
        require __DIR__ . '/../views/cart/paymentdone.php';
        // header('location:/');
    } else {
        echo "Error: no orders data received.";
    }
}



}