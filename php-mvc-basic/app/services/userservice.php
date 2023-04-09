<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    private $repository;

    function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getByUsername($username)
    {
        return $this->repository->getByUsername($username);
    }

    public function getUserById($id)
    {
        return $this->repository->getUserById($id);
    }
    public function verifyUser($username, $password)
    {
        $user = $this->repository->getByUsername($username);
        if ($user->getPassword() !== null && password_verify($password, $user->getPassword())) {
            return $user;
        } else {
            $message = "incorrect username or password";
        }
    }
}
?>