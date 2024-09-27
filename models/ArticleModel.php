<?php
class Article {
    // Thuộc tính
    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ma_tloai;
    private $tomtat;
    private $noidung;
    private $ma_tgia;
    private $ngayviet;
    //private $hinh_anh;

    // Constructor
    public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet) {
        $this->ma_bviet = $ma_bviet;
        $this->tieude = $tieude;
        $this->ten_bhat = $ten_bhat;
        $this->ma_tloai = $ma_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ma_tgia = $ma_tgia;
        $this->ngayviet = $ngayviet;
        //$this->hinh_anh = $hinh_anh;
    }

    // Getter và Setter
    public function getMaBaiViet() {
        return $this->ma_bviet;
    }
    public function setMaBaiViet($ma_bviet) {
        $this->ma_bviet = $ma_bviet;
    }

    public function getTieuDe() {
        return $this->tieude;
    }
    public function setTieuDe($tieude) {
        $this->tieude = $tieude;
    }

    public function getTenBaiHat() {
        return $this->ten_bhat;
    }
    public function setTenBaiHat($ten_bhat) {
        $this->ten_bhat = $ten_bhat;
    }

    public function getMaTheLoai() {
        return $this->ma_tloai;
    }
    public function setMaTheLoai($ma_tloai) {
        $this->ma_tloai = $ma_tloai;
    }

    public function getTomTat() {
        return $this->tomtat;
    }
    public function setTomTat($tomtat) {
        $this->tomtat = $tomtat;
    }

    public function getNoiDung() {
        return $this->noidung;
    }
    public function setNoiDung($noidung) {
        $this->noidung = $noidung;
    }

    public function getMaTacGia() {
        return $this->ma_tgia;
    }
    public function setMaTacGia($ma_tgia) {
        $this->ma_tgia = $ma_tgia;
    }

    public function getNgayViet() {
        return $this->ngayviet;
    }
    public function setNgayViet($ngayviet) {
        $this->ngayviet = $ngayviet;
    }

    // public function getHinhAnh() {
    //     return $this->hinh_anh;
    // }
    // public function setHinhAnh($hinh_anh) {
    //     $this->hinh_anh = $hinh_anh;
    // }
}
?>
