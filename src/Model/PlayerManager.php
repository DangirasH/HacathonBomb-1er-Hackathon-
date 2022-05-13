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

    public function updateLevel($playerId, $level)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `level`=:level WHERE id=:id");
        $statement->bindValue('level', $level, \PDO::PARAM_INT);
        $statement->bindValue('id', $playerId, \PDO::PARAM_INT);

        return $statement->execute();
    }
}
