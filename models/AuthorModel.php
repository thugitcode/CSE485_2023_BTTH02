<?php
class Author{
    public $ma_tgia;
    public $ten_tgia;

    public function __construct($ma_tgia, $ten_tgia) {
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
    }

    public function get_matgia(){
        return $this->ma_tgia;
    }

    public function get_ten_tgia(){
        return $this->ten_tgia;
    }

    public function set_matgia( $ma_tgia ) {
        $this->ma_tgia = $ma_tgia;
    }

    public function set_ten_tgia( $ten_tgia ) {
        $this->ten_tgia = $ten_tgia;
    }
}

?>
