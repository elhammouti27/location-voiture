<?php

require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class Reservation implements IMethodeCRUD
{
    public $id_reservation;
    public $id_car;
    public $id_client;
    public $start_date;
    public $end_date;
    public $status;

    private $db;

    public function __construct()
    {
        $cnx = new Connexion();
        $this->db = $cnx->connect();
    }

    // ================= ADD =================
    public function Add()
    {
        try {
            $stmt = $this->db->prepare("
                CALL SP_AddReservation(?,?,?,?)
            ");

            return $stmt->execute([
                $this->id_car,
                $this->id_client,
                $this->start_date,
                $this->end_date
            ]);

        } catch (PDOException $e) {
            return false;
        }
    }

    // ================= UPDATE =================
    public function Update()
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE reservation
                SET id_client=?, end_date=?, status=?
                WHERE id_reservation=?
            ");

            return $stmt->execute([
                $this->id_client,
                $this->end_date,
                $this->status,
                $this->id_reservation
            ]);

        } catch (PDOException $e) {
            return false;
        }
    }

    // ================= DELETE =================
    public function Delete()
    {
        try {
            $stmt = $this->db->prepare("
                DELETE FROM reservation WHERE id_reservation=?
            ");

            return $stmt->execute([$this->id_reservation]);

        } catch (PDOException $e) {
            return false;
        }
    }

    // ================= GET ALL =================
    public function GetAll()
    {
        try {
            $stmt = $this->db->query("
                SELECT r.*, c.firstname, c.lastname, ca.brand, ca.model
                FROM reservation r
                INNER JOIN clients c ON r.id_client = c.id_client
                INNER JOIN cars ca ON r.id_car = ca.id_car
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return [];
        }
    }

    // ================= LAST 5 =================
    public function GetLast_5()
    {
        try {
            $stmt = $this->db->query("
                SELECT * FROM reservation
                ORDER BY start_date DESC
                LIMIT 5
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
                SELECT * FROM reservation
                WHERE id_reservation LIKE ?
                OR status LIKE ?
            ");

            $val = "%$val%";

            $stmt->execute([$val, $val]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return [];
        }
    }

    // ================= UTIL =================
    public function Get_Client()
    {
        try {
            $stmt = $this->db->query("
                SELECT id_client, CONCAT(firstname,' ',lastname) as name
                FROM clients
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return [];
        }
    }
}