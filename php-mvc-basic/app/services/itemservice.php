<?php
require_once __DIR__ . '/../repositories/homerepository.php';

class ItemService {
    private $repository;

    function __construct()
    {
        $this->repository = new HomeRepository();
    }
    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        return $this->repository->getById($id);
    }
}