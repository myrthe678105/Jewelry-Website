<?php
require __DIR__ . '/../repositories/orderrepository.php';

class OrderService {
    private $repository;

    function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getOneCart($id) {
        return $this->repository->getOneCart($id);
    }
    public function insertOrder($userid, $itemid)
    {
        $this->repository->insertOrder($userid, $itemid);
    }
    public function updateOrder($id)
    {
        $this->repository->updateOrder($id);
    }
}