<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';

class AdminController extends Controller
{
    private $orderService;

    function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        $orders = $this->orderService->getAll();
        // var_dump($orders);
        require __DIR__ . '/../views/admin/index.php';
    }
}