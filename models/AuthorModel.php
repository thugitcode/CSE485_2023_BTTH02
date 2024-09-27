<?php
class Author {
    public $ma_tgia; // Mã tác giả
    public $ten_tgia; // Tên tác giả

    public function __construct($ma_tgia, $ten_tgia) {
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
    }

    // Getter cho mã tác giả
    public function get_matgia() {
        return $this->ma_tgia;
    }

    // Getter cho tên tác giả
    public function get_ten_tgia() {
        return $this->ten_tgia;
    }

    // Setter cho mã tác giả
    public function set_matgia($ma_tgia) {
        $this->ma_tgia = $ma_tgia;
    }

    // Setter cho tên tác giả
    public function set_ten_tgia($ten_tgia) {
        $this->ten_tgia = $ten_tgia;
    }
}

