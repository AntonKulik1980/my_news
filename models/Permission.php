<?php

class Permission extends Model
{
    public static function index()
    {
        $sql = "SELECT id, name FROM permissions
                ORDER BY id ASC";
        
        $res = (new self)->pdo->prepare($sql);
        $res->execute();

        $permissions = $res->fetchAll(PDO::FETCH_ASSOC);
        return $permissions;
    }

    
    public static function destroy($id)
    {
        $sql = "DELETE FROM permissions WHERE id = :id";

        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }


    public static function store($options)
    {
        $sql = "INSERT INTO permissions(name)
                VALUES (:name)
                ";
        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);

        return $res->execute();
    }

    public static function get($id)
    {

        $sql = "SELECT name FROM permissions
                WHERE id = :id";

        $res = (new self)->pdo->prepare($sql);

        $res->bindParam(':id', $id);
        $res->execute();
        $permission = $res->fetch(PDO::FETCH_ASSOC);

        return $permission;
    }

    public static function update($id, $options)
    {
        $sql = "UPDATE permissions
                SET name = :name
                WHERE id = :id
                ";

        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }
}
