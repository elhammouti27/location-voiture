<?php
require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class Client extends Connexion implements IMethodeCRUD
{
    public $id_client;
    public $cin;
    public $firstname;
    public $lastname;
    public $phone_number;
    public $email;
    public $password;
    public $permis;

    function __construct() {}

    /* =========================
       ADD
    ========================= */
    public function Add()
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("
                INSERT INTO clients
                (cin, firstname, lastname, phone_number, email, password, permis)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");

            $stmt->execute([
                $this->cin,
                $this->firstname,
                $this->lastname,
                $this->phone_number,
                $this->email,
                $this->password,
                $this->permis
            ]);

            $this->Deconnexion();
            return true;

        } catch (PDOException $e) {
            if ($e->getCode() == "23000") {
                return false; // duplicate email or cin
            }
            throw $e;
        }
    }

    /* =========================
       UPDATE
    ========================= */
    public function Update()
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("
                UPDATE clients SET
                    cin=?,
                    firstname=?,
                    lastname=?,
                    phone_number=?,
                    email=?,
                    permis=?
                WHERE id_client=?
            ");

            $stmt->execute([
                $this->cin,
                $this->firstname,
                $this->lastname,
                $this->phone_number,
                $this->email,
                $this->permis,
                $this->id_client
            ]);

            $this->Deconnexion();
            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    /* =========================
       DELETE
    ========================= */
    public function Delete()
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("
                DELETE FROM clients WHERE id_client=?
            ");

            $stmt->execute([$this->id_client]);

            $this->Deconnexion();
            return true;

        } catch (PDOException $e) {
            if ($e->getCode() == "23000") {
                return false;
            }
            throw $e;
        }
    }

    /* =========================
       GET ALL
    ========================= */
    public function GetAll()
    {
        try {
            $this->connexion();

            $rows = Connexion::$cnx
                ->query("SELECT * FROM clients")
                ->fetchAll(PDO::FETCH_ASSOC);

            $this->Deconnexion();
            return $rows;

        } catch (Exception $e) {
            return [];
        }
    }

    /* =========================
       FIND
    ========================= */
    public function Find($val)
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("
                SELECT * FROM clients
                WHERE cin LIKE ?
                OR firstname LIKE ?
                OR lastname LIKE ?
                OR email LIKE ?
                OR phone_number LIKE ?
            ");

            $search = "%$val%";

            $stmt->execute([
                $search,
                $search,
                $search,
                $search,
                $search
            ]);

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->Deconnexion();
            return $rows;

        } catch (Exception $e) {
            return [];
        }
    }
}
?>