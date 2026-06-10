<?php

require "../Model/M_Connexion.php";

class Client
{
    private $db;

    public function __construct()
    {
        $this->db = (new Connexion())->connect();
    }

    public function Add($d)
    {
        $sql = "INSERT INTO clients (cin, firstname, lastname, phone_number, email, password, permis)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        return $this->db->prepare($sql)->execute([
            $d["cin"],
            $d["firstname"],
            $d["lastname"],
            $d["phone_number"],
            $d["email"],
            $d["password"],
            $d["permis"]
        ]);
    }

    public function Update($d)
    {
        $sql = "UPDATE clients 
                SET cin=?, firstname=?, lastname=?, phone_number=?, email=?, permis=?
                WHERE id_client=?";

        return $this->db->prepare($sql)->execute([
            $d["cin"],
            $d["firstname"],
            $d["lastname"],
            $d["phone_number"],
            $d["email"],
            $d["permis"],
            $d["id_client"]
        ]);
    }

    public function Delete($id)
    {
        return $this->db->prepare("DELETE FROM clients WHERE id_client=?")
            ->execute([$id]);
    }

    public function GetAll()
    {
        return $this->db->query("SELECT * FROM clients ORDER BY id_client DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}