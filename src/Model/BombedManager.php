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
        $query = 'SELECT * FROM bombed
        WHERE lat between ' . round($lat, 4, PHP_ROUND_HALF_DOWN) .
        ' AND ' . (round($lat, 4, PHP_ROUND_HALF_UP) + 0.001) .
        ' AND lon between ' . (round($lon, 5, PHP_ROUND_HALF_DOWN) - 0.00001) .
        ' AND ' . (round($lon, 5, PHP_ROUND_HALF_UP));

        return $this->pdo->query($query)->fetchAll();
    }
}
