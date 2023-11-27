<?php
$apiKey = "a6f58a4102d81181b414c750621ca770";
$city = "Calicut";

$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,
 
true);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
if ($data['cod'] == 200) {
    $temperature = $data['main']['temp'] - 273.15;
    $feelsLike = $data['main']['feels_like'] - 273.15;;
    $humidity = $data['main']['humidity'];
    $windSpeed = $data['wind']['speed'];
    $description = $data['weather'][0]['description'];
    $cityName = $data['name'];
    $sunriseTimestamp = $data['sys']['sunrise'];
    $sunsetTimestamp = $data['sys']['sunset'];

    // Convert timestamps to readable time
    $sunriseTime = date('H:i:s', $sunriseTimestamp);
    $sunsetTime = date('H:i:s', $sunsetTimestamp);
    $timezone = $data['timezone'];
    $sunriseTime = gmdate('H:i', $sunriseTimestamp + $timezone);
    $sunsetTime = gmdate('H:i', $sunsetTimestamp + $timezone);
    


    echo "<h2>Weather Details for $cityName </h2>";
    echo "<p>Current temperature: $temperature °C</p>";
    echo "<p>Feels like: $feelsLike °C</p>";
    echo "<p>Humidity: $humidity%</p>";
    echo "<p>Wind Speed: $windSpeed m/s</p>";
    echo "<p>Weather description: $description</p>";
    echo "<p>Sunrise time: $sunriseTime AM</p>";
    echo "<p>Sunset time: $sunsetTime PM</p>";

} else {
    echo "<p>Error: Unable to fetch weather data.</p>";
}
?>