<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function selectOneByName(string $name): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE name=:name");
        $statement->bindValue('name', $name, \PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch();
    }
  
    public function insert(array $user): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE .
            " (`name`, `password`, `xp`, `level`) 
            VALUES (:name, :password, 0, 1)"
        );
        $statement->bindValue('name', $user['name'], \PDO::PARAM_STR);
        $statement->bindValue('password', $user['password'], \PDO::PARAM_STR);

        $statement->execute();
    }
}
