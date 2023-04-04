<?php
namespace app\models;

use app\core\Model;

class UserModel extends Model
{
    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($name, $email)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);

        return $this->db->lastInsertId();
    }
}
