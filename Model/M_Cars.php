<?php
require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class Cars extends Connexion implements IMethodeCRUD
{
    public $id_car;
    public $registration_number;
    public $brand;
    public $model;
    public $price;
    public $notes;
    public $id_categorie;

    function __construct() {}

    /* =========================
       ADD CAR
    ========================= */
    public function Add()
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("CALL SP_AddCar(?,?,?,?,?,?)");

            $stmt->execute([
                $this->registration_number,
                $this->brand,
                $this->model,
                $this->price,
                $this->notes,
                $this->id_categorie
            ]);

            $this->Deconnexion();
            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    /* =========================
       GET ALL
    ========================= */
    public function GetAll()
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("CALL SP_GetAllCars()");
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->Deconnexion();
            return $rows;

        } catch (Exception $e) {
            return [];
        }
    }

    /* =========================
       DELETE
    ========================= */
    public function Delete()
    {
        try {
            $this->connexion();

            $stmt = Connexion::$cnx->prepare("CALL SP_DeleteCar(?)");
            $stmt->execute([$this->id_car]);

            $this->Deconnexion();
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function Update() {}
    public function Find($val) { return []; }
}
?>