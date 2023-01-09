<?php

class Mankement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMankementen()
    {
        $this->db->query("SELECT Instructeur.Naam
                                ,Instructeur.Email
                                ,Instructeur.Id
                                ,Auto.Kenteken
                                ,Mankementen.Mankement
                                ,Mankementen.Datum
                                ,Auto.Type
                          FROM Instructeur
                          INNER JOIN Auto
                          ON Instructeur.Id = Auto.InstructeurId
                          INNER JOIN Mankementen
                          ON Auto.Id = Mankementen.AutoId
                          WHERE Instructeur.Id = :Id
                          Order By Mankementen.Datum Desc");

        $this->db->bind(':Id', 2);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getOverviewMankementen($MankementId)
    {
        $this->db->query("SELECT *
                          FROM Mankement
                          WHERE MankementId = :MankementId");
        $this->db->bind(':MankementId', $MankementId);

        $result = $this->db->resultSet();

        return $result;
    }

    public function addMankement($post)
    {
        $sql = "INSERT INTO Mankement (MankementId
                                      ,Mankement)
                VALUES                (:MankementId
                                      ,:mankement)";

        $this->db->query($sql);
        $this->db->bind(':MankementId', $post['MankementId'], PDO::PARAM_INT);
        $this->db->bind(':mankement', $post['mankement'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
