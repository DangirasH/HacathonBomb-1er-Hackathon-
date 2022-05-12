<?php

namespace App\Model;

class ItemManager extends AbstractManager
{
    public const TABLE = 'user';


    public function insert(array $user): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE .
            " (`name`, `password`, `xp`, `level`) 
            VALUES (:name, :password, :xp, :level)"
        );
        $statement->bindValue('name', $user['name'], \PDO::PARAM_STR);
        $statement->bindValue('password', $user['password'], \PDO::PARAM_STR);
        $statement->bindValue('xp', $user['xp'], \PDO::PARAM_INT);
        $statement->bindValue('level', $user['level'], \PDO::PARAM_INT);

        $statement->execute();
    }
}
