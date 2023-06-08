<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilForm implements KontrakPasienView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil()
    {
        $this->tpl = new Template("templates/form.html");
        $this->tpl->replace("DATA_TITTLE", "Add data pasien");
        $this->tpl->replace("DATA_BUTTON", "submit");
        $this->tpl->write();
    }

    function addData($data)
    {
        $this->prosespasien->addData($data);
    }
    function updateData($data)
    {
        $this->prosespasien->updateData($data);
    }
    function deleteData($i)
    {
        $this->prosespasien->deleteData($i);
    }

    public function getData($id)
    {
        $this->prosespasien->prosesDataPasien();
        $this->tpl = new Template("templates/form.html");
        $form = "<input type='hidden' name='id' value='" . $this->prosespasien->getId($id) . "'>";
        $this->tpl->replace("DATA_TITLE", "Edit Data Pasien");
        $this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($id));
        $this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($id));
        $this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($id));
        $this->tpl->replace("DATA_TL", $this->prosespasien->getTl($id));
        $this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($id));
        $this->tpl->replace("DATA_TELP", $this->prosespasien->getTelp($id));
        $lk = $this->prosespasien->getGender($id) === "Laki-laki" ? "checked" : "";
        $pr = $this->prosespasien->getGender($id) === "Perempuan" ? "checked" : "";
        $this->tpl->replace("DATA_LAKI", $lk);
        $this->tpl->replace("DATA_PEREMPUAN", $pr);
        $this->tpl->replace("DATA_HIDDEN", $form);
        $this->tpl->replace("DATA_BUTTON", "update");
        $this->tpl->write();
    }
}
