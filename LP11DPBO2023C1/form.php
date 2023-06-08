<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilForm.php");


$tf = new TampilForm();
if (isset($_POST['submit'])) {
    $tf->addData($_POST);
} else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $tf->getData($id);
} else if (isset($_POST['update'])) {
    $tf->updateData($_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $tf->deleteData($id);
} else {
    $data = $tf->tampil();
}
