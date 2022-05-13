<?php

namespace App\Model;

class PlayerManager extends AbstractManager
{
    public const TABLE = 'user';

    public function updateXp($playerId, $points)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `xp`=:xp WHERE id=:id");
        $statement->bindValue('xp', $points, \PDO::PARAM_INT);
        $statement->bindValue('id', $playerId, \PDO::PARAM_INT);

        return $statement->execute();
    }
}
