<?php
class Category{
    // private $db;
    public $ma_tloai;
    public $ten_tloai;

    public function __construct($ma_tloai, $ten_tloai) {
        // $this->db = $db;
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }

    public function get_matloai(){
        return $this->ma_tloai;
    }

    public function get_ten_tloai(){
        return $this->ten_tloai;
    }

    public function set_matloai( $ma_tloai ) {
        $this->ma_tloai = $ma_tloai;
    }

    public function set_ten_tloai( $ten_tloai ) {
        $this->ten_tloai = $ten_tloai;
    }

    

}