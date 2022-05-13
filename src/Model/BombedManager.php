<?php

namespace App\Model;

class BombedManager extends AbstractManager
{
    public const TABLE = 'bombed';

    /**
     * Insert new item in database
     */
    public function insert(array $bomb): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE .
            " (`lat`, `lon`, `date`, `user_id`) 
            VALUES (:lat, :lon, now(), :user_id)"
        );
        $statement->bindValue('lat', $bomb['lat']);
        $statement->bindValue('lon', $bomb['lon']);
        $statement->bindValue('user_id', $bomb['user_id'], \PDO::PARAM_INT);

        $statement->execute();
    }

    public function selectBomb($lat, $lon): array
    {
        $query = 'SELECT * FROM bombed WHERE lat = ' . $lat . ' AND lon = ' . $lon;

        return $this->pdo->query($query)->fetchAll();
    }
}
