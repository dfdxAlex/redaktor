<?php

// sk_a0c451bdcbb8b32e659dca5f6fd1b3d5ff33e432e4d57b34

$apiKey = "sk_a0c451bdcbb8b32e659dca5f6fd1b3d5ff33e432e4d57b34";  // Замените на ваш реальный API-ключ
$voiceId = "pMsXgVXv3BLzUgSXRplE";  // Укажите нужный идентификатор голоса

$curl = curl_init();

$data = [
  "text" => "This is a sample text to be converted into speech.",
  "voice_settings" => [
    "stability" => 0.1,
    "similarity_boost" => 0.3
  ]
];

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.elevenlabs.io/v1/text-to-speech/{$voiceId}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "xi-api-key: $apiKey"  // Добавляем ваш API-ключ в заголовок
  ],
  CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;  // Это будет аудиофайл в формате base64 или ссылка на файл
}

?>

