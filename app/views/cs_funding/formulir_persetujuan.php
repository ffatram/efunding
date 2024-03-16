<?php
// Mendapatkan data dari Presenter
$cs_funding = new cs_funding();
$document = $cs_funding->formulir_persetujuan($id);
// Kemudian tampilkan dokumen
echo $document;
?>