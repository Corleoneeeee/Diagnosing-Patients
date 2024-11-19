<?php
if(isset($_POST['message'])) {
    $message = $_POST['message'];

    // Cerere către API-ul GPT-3
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.openai.com/v1/completions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            "model" => "gpt-3.5-turbo-instruct",
            "prompt" => $message,
            "max_tokens" => 1000
        ]),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer  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", 
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // Afișăm răspunsul primit de la API într-un format ușor de citit
  

    
        $data = json_decode($response, true);
        
        // Verificăm dacă există un răspuns valid de la API-ul GPT-3 și dacă conține un array cu cheia "choices"
        if (isset($data['choices']) && is_array($data['choices']) && count($data['choices']) > 0) {
            $gpt3Response = $data['choices'][0]['text'];
            // Trimiteți răspunsul înapoi către client
            echo $gpt3Response;
        } else {
            echo "Răspunsul de la API-ul GPT-3 nu conține opțiuni disponibile sau are o structură incorectă.";
        }
    
}
?>
