<?php
class AuthorModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllAuthors() {
        $sql = "SELECT * FROM tacgia";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}