<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = "user";

    public function selectOneByName(string $name): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE name=:name");
        $statement->bindValue('name', $name, \PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch();
    }
}
