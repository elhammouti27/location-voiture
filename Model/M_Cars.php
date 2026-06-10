<?php

require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class Cars implements IMethodeCRUD
{
    public $id_car;
    public $registration_number;
    public $brand;
    public $model;
    public $price;
    public $notes;
    public $id_categorie;

    private $db;

    public function __construct()
    {
        $cnx = new Connexion();
        $this->db = $cnx->connect();
    }

    // ================= ADD CAR =================
    public function Add()
    {
        try {
            $stmt = $this->db->prepare("
                CALL SP_AddCar(?,?,?,?,?,?)
            ");

            return $stmt->execute([
                $this->registration_number,
                $this->brand,
                $this->model,
                $this->price,
                $this->notes,
                $this->id_categorie
            ]);

        } catch (PDOException $e) {
            return false;
        }
    }

    // ================= UPDATE CAR =================
    public function Update()
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE cars
                SET registration_number=?, brand=?, model=?, price=?, notes=?, id_categorie=?
                WHERE id_car=?
            ");

            return $stmt->execute([
                $this->registration_number,
                $this->brand,
                $this->model,
                $this->price,
                $this->notes,
                $this->id_categorie,
                $this->id_car
            ]);

        } catch (PDOException $e) {
            return false;
        }
    }

    // ================= DELETE CAR =================
    public function Delete()
    {
        try {
            $stmt = $this->db->prepare("
                DELETE FROM cars WHERE id_car = ?
            ");

            return $stmt->execute([$this->id_car]);

        } catch (PDOException $e) {
            return false;
        }
    }

    // ================= GET ALL =================
    public function GetAll()
    {
        try {
            $stmt = $this->db->query("
                SELECT c.*, cat.nom_categorie
                FROM cars c
                INNER JOIN categories cat
                ON c.id_categorie = cat.id_categorie
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return [];
        }
    }

    // ================= FIND =================
    public function Find($val)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT c.*, cat.nom_categorie
                FROM cars c
                INNER JOIN categories cat
                ON c.id_categorie = cat.id_categorie
                WHERE c.registration_number LIKE ?
                OR c.brand LIKE ?
                OR c.model LIKE ?
            ");

            $val = "%$val%";

            $stmt->execute([$val, $val, $val]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return [];
        }
    }
}