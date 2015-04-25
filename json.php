<?php
header('Content-Type: application/json');

require_once 'pdo.php';

$sureler = $DB->query("SELECT COUNT(*) FROM sureler");
$sureSayisi = $sureler->fetch(PDO::FETCH_ASSOC);
$sureSayisi = $sureSayisi["COUNT(*)"];
$kuran = array ();
for ($x = 1; $x < $sureSayisi + 1; $x ++) {
    $sure = $DB->query("SELECT * FROM sureler WHERE id = $x");
    $sure_ = $sure->fetch(PDO::FETCH_ASSOC);
    $sureAdi = $sure_["sure"];
    
    $ayetler = $DB->query("SELECT * FROM ayetler WHERE sureid = '$x'");
    $data = array();
    
    while ($ayet = $ayetler->fetch(PDO::FETCH_ASSOC)) {
        $data [] = array ("id" => $ayet["id"],"sureId" => $ayet["sureid"],"ses" => $ayet["link"]);
    }
    $kuran [] = array($sureAdi => $data);
}

echo json_encode(array("Kur'an" => $kuran));

?>