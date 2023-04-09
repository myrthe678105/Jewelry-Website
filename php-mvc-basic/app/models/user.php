<?php
class User implements \JsonSerializable
{

    private int $id;
    private string $role;
    private string $username;
    private string $password;
    private string $address;

    #[ReturnTypeWillChange]

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    

    public function getAddress(): ?string
    {
        return $this->address ?? null;
    }
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

}
?>