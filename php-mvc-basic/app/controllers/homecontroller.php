<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/itemservice.php';
class HomeController extends Controller
{
    private $itemService;

    public function __construct(){
        $this->itemService = new ItemService();

    }

    public function index()
    {
        $items = $this->itemService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }

    public function item()
    {
        if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $item = $this->itemService->getByid($id);
        require __DIR__ . '/../views/home/item.php';
        } else{
            echo "issue loading item page";
        }
    }

}