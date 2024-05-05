<?php
// Membuat array dengan index "nama" dan "umur"
$data = array(
    array("nama" => "Callietea", "umur" => 12),
    array("nama" => "Imorty", "umur" => 11),
    array("nama" => "Renntalitha", "umur" => 5),
    array("nama" => "Grefsian", "umur" => 9),
    array("nama" => "Vivaley", "umur" => 12),
    array("nama" => "Civallenne", "umur" => 12),
    array("nama" => "Hopes", "umur" => 10),
    array("nama" => "Kate", "umur" => 9),
    array("nama" => "Flaurance", "umur" => 14),
    array("nama" => "Dimitry", "umur" => 9),
    array("nama" => "Elouise", "umur" => 16),
    array("nama" => "Bridgeton", "umur" => 15),
    array("nama" => "Dune", "umur" => 5),
    array("nama" => "Zevanya", "umur" => 6),
    array("nama" => "Alluitea", "umur" => 15)
);

// Konversi array menjadi JSON
$json_data = json_encode($data);

// Tampilkan JSON
echo $json_data;
?>