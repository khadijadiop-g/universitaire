<?php

abstract class AbstractDatabase                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
{
    private \PDO $db;

    protected function __construct(PDO $db){
        $this->db=$db;
    }
    protected function query(string $sql, bool $single = true): array|false|stdClass
    {
        $stmt = $this->db->query($sql);
        return $single ? $stmt->fetch() : $stmt->fetchAll();
    }

    protected function prepare(string $sql, array $datas): PDOStatement
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($datas);
        return $stmt;
    }


    protected function executeQuery(string $sql, array $datas, bool $single = true): array|false|stdClass
    {
        $stmt = $this->prepare($sql, $datas);
        return $single ? $stmt->fetch() : $stmt->fetchAll();
    }


    protected function executeUpdate(string $sql, array $datas): int
    {
        $stmt = $this->prepare($sql, $datas);

        if (str_starts_with(strtoupper(trim($sql)), 'INSERT')) {
            return (int) $this->db->lastInsertId();
        }

        return $stmt->rowCount();
    }

    protected function beginTransaction(): bool
    {
        return $this->db->beginTransaction();
    }

    protected function commit(): bool
    {
        return $this->db->commit();
    }

    protected function rollBack(): bool
    {
        return $this->db->rollBack();
    }
}
