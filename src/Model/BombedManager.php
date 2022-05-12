<?php

namespace App\Model;

class BombedManager extends AbstractManager
{
    public const TABLE = 'bombed';

    /**
     * Insert new item in database
     */
    public function insert(array $bombed): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE .
            " (`lat`, `long`, `date`, `user_id`) 
            VALUES (:lat, :lon, now(), :user_id)"
        );
        $statement->bindValue('lat', $bombed['lat']);
        $statement->bindValue('lon', $bombed['lon']);
        $statement->bindValue('user_id', $bombed['user_id'], \PDO::PARAM_INT);

        $statement->execute();
    }
}
