<?php
$html = file_get_contents('site adresi');
$dom = new DOMDocument();
$dom->loadHTML($html);

// Örneğin, tüm başlık etiketlerini bulmak için:
$h1_elements = $dom->getElementsByTagName('h1');

foreach ($h1_elements as $h1) {
  // $h1->nodeValue öğesinde başlık metnini bulabilirsiniz.
  echo $h1->nodeValue;
}
// İçeriği Çektik

//Şimdi Çevirelim

// API anahtarınızı ve dil kodlarını (örneğin, 'en' ve 'tr') ayarlayın.
$api_key = 'YOUR_API_KEY';
$source_language = 'en';
$target_language = 'tr';

// Google Translate API'ye bağlanmak için bir TranslateClient nesnesi oluşturun.
$translate = new Google\Cloud\Translate\TranslateClient([
  'key' => $api_key
]);

// Çevirmek istediğiniz metni belirtin.
$text = 'Hello world!';

// Metni belirtilen hedef dile çevirin.
$translation = $translate->translate($text, [
  'source' => $source_language,
  'target' => $target_language
]);

// Çeviri metnini ekrana yazdırın.
echo $translation['text'];  // Örneğin: Merhaba dünya!

// Şimdi Sql Post edelim
$mysqli = new mysqli('localhost', 'kullanıcı_adı', 'parola', 'veritabanı_adı');
$sql = "INSERT INTO posts (title, body) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $title, $body);
$stmt->execute();
?>
