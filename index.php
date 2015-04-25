<?php
ini_set('max_execution_time', 0);
error_reporting(0);

require_once 'pdo.php';

function curl($url)
{
    $ch = curl_init();
    $hc = "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; Yahoo! Search - Web Search)";
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $hc);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $site = curl_exec($ch);
    curl_close($ch);
    return $site;
}

$sure_ayet = "";
$url = "http://kuran.diyanet.gov.tr/Kuran.aspx" . $sure_ayet;
preg_match_all('/<div class="Form-Row">
                                <label class="Form-Label">Sure:<\/label>
                                <select id="SelectSure" class="Form-Select">(.*?)<\/select>
                            <\/div>
                        <\/td>
                        <td>
                            <div class="Form-Row">/is', curl($url), $veri_derece_1);

preg_match_all('/<option value="(.*?)">(.*?)<\/option>/is', $veri_derece_1[1][0], $veri_derece_2);

$suresayisi = count($veri_derece_2[0]);

$data = array();
for ($i = 0; $i < $suresayisi + 1; $i ++) {
    
    $buSureninAyetleriVar = true;
    for ($x = 1; $buSureninAyetleriVar == true; $x ++) {
        $ses = "http://webdosya.diyanet.gov.tr/kuran/Sound/ar_davutkaya/" . $i . "_" . $x . ".ogg";
        if (file_get_contents($ses)) {
            
            $DB->exec("INSERT INTO ayetler VALUES (null, '$i', '$ses')");
        } else {
            $buSureninAyetleriVar = false;
        }
    }
    
    $DB->exec("INSERT INTO sureler VALUES (null, '" . substr($veri_derece_2[2][$i], 3) . "')");
}

?>