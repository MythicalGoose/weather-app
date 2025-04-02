<?php
$data = '{"location":{"city":"Cesis","woeid":851991,"country":"Latvia","lat":57.31802,"long":25.281811,"timezone_id":"Europe/Riga"},
"current_observation":{"pubDate":1741941340,"wind":{"chill":16,"direction":"NW","speed":12},"atmosphere":{"humidity":83,"visibility":14.98,"pressure":994.6},"astronomy":{"sunrise":"6:36 AM","sunset":"6:21 PM"},"condition":{"temperature":28,"text":"Cloudy","code":26}},
"forecasts":[{"day":"Fri","date":1741968000,"high":36,"low":21,"text":"Partly Cloudy","code":30},{"day":"Sat","date":1742054400,"high":41,"low":27,"text":"Sunny","code":32},{"day":"Sun","date":1742140800,"high":40,"low":22,"text":"Snow","code":16},{"day":"Mon","date":1742227200,"high":41,"low":26,"text":"Partly Cloudy","code":30},{"day":"Tue","date":1742313600,"high":44,"low":29,"text":"Mostly Cloudy","code":28},{"day":"Wed","date":1742400000,"high":48,"low":31,"text":"Mostly Sunny","code":34},{"day":"Thu","date":1742486400,"high":51,"low":32,"text":"Sunny","code":32},{"day":"Fri","date":1742572800,"high":55,"low":35,"text":"Partly Cloudy","code":30},{"day":"Sat","date":1742659200,"high":54,"low":36,"text":"Partly Cloudy","code":30},{"day":"Sun","date":1742745600,"high":54,"low":35,"text":"Mostly Sunny","code":34},{"day":"Mon","date":1742832000,"high":53,"low":38,"text":"Sunny","code":32}]}';
$weatherData = json_decode($data, true);
$forecasts = $weatherData['forecasts'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://static.wixstatic.com/media/58d09a_8fc52a6e282e4739a488750712ad1e74~mv2.jpeg/v1/fill/w_750,h_1000,al_c,q_85,usm_0.66_1.00_0.01/58d09a_8fc52a6e282e4739a488750712ad1e74~mv2.jpeg">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="right.css">
    <link rel="stylesheet" href="left.css">
    <link rel="stylesheet" href="dark_light.css">
    <title>Weather Web</title>
</head>

<body class="light">
    <header class="display-flex box-shadow justify-space-between">
        <!-- Left Header side -->
        <div class="display-flex header-left">
            <svg class="menu-icon icon-small cursor-pointer" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6h16M4 12h16M4 18h16"  stroke-width="2" stroke-linecap="round"></path>
            </svg>

            <h1 class="app-title">VTDT Sky</h1>

            <img class="location-icon icon-small" src="./img/google-maps.gif" alt="">
            <span class="location-city"><?php echo $weatherData['location']['city'] . ", " . $weatherData['location']['country']; ?></span>
        </div>

        <!-- Middle of Header -->
        <div class="header-center position-relative display-flex">
            <form>
                <svg class="icon-tiny position-absolute" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 2a9 9 0 1 0 6.293 15.293l4.707 4.707a1 1 0 0 0 1.414-1.414l-4.707-4.707A9 9 0 0 0 11 2zM11 4a7 7 0 1 1 0 14 7 7 0 0 1 0-14z"></path>
                </svg>
                <input type="text" placeholder="Search Location" value="Cesis">

                <div class="worldwide position-absolute">
                    <img src="./img/worldwide.gif" alt="" class="icon-small">
                </div>
            </form>
            <button onclick="idkFunction()" class="mode-button cursor-pointer display-flex">
                <svg class="icon-extra-small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"></path>
                </svg>
                <p>Light</p>
            </button>
        </div>

        <!-- Right Header side -->
        <div class="header-right display-flex">
            <img src="./img/notification.gif" alt="" class="cursor-pointer icon-medium">
            <img src="./img/settings.gif" alt="" class="cursor-pointer icon-medium">
        </div>
    </header>
    <main>
        <!-- left side -->
        <div class="main-left">
            <!-- top section -->
            <div class="idksome background-white box-shadow border-rounded top-left-section">
                <div class="display-flex justify-space-between">
                    <div>

                        <p class="weather-description">Current Weather</p>
                        <p class="current-time">Local time: <?php echo date("h:i A", intval($weatherData['current_observation']['pubDate'])); ?></p>

                        <div class="display-flex align-center">
                            <img class="icon-large" src="//cdn.weatherapi.com/weather/64x64/day/113.png" alt="Weather Icon">
                            <div class="display-flex align-center temperature">
                                <p><span id="degreesvalue"><?php echo $weatherData['current_observation']['condition']['temperature']; ?></span></p>
                                <p><span id="degrees">°C</span></p>
                            </div>



                            <div class="feels-like">
                                <p><?php echo $weatherData['current_observation']['condition']['text']; ?></p>
                                <p>Feels like <span id="degreesvalue"><?php echo $weatherData['current_observation']['condition']['code']; ?></span><span id="degrees">°C</span></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <select id="unitToggle" class="C-F background-white border-rounded">
                            <option value="celsius">Celsius and Kilometers</option>
                            <option value="fahrenheit">Fahrenheit and Miles</option>
                        </select>
                    </div>
                </div>
                <div>
                    <p class="wind-info">Current wind direction: <?php echo $weatherData['current_observation']['wind']['direction']; ?></p>
                </div>
            </div>
            <!-- middle section -->
            <section class="weather-details">
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/clouds.gif" alt="" class="icon-small">
                        <p class="detail-title">Air Quality</p>
                    </div>
                    <p class="detail-value">N/A</p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/wind.gif" alt="" class="icon-small">
                        <p class="detail-title">Wind</p>
                    </div>
                    <p class="detail-value"><span id="spedvalue"><?php echo $weatherData['current_observation']['wind']['speed']; ?></span><span id="speed">km/h</span> </p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/humidity.gif" alt="" class="icon-small">
                        <p class="detail-title">Humidity</p>
                    </div>
                    <p class="detail-value"><?php echo $weatherData['current_observation']['atmosphere']['humidity']; ?>%</p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/vision.gif" alt="" class="icon-small">
                        <p class="detail-title">Visibility</p>
                    </div>
                    <p class="detail-value"><span id="distvalue"><?php echo $weatherData['current_observation']['atmosphere']['visibility']; ?></span><span id="distance"> km</span></p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/air-pump.gif" alt="" class="icon-small">
                        <p class="detail-title">Pressure</p>
                    </div>

                    <p class="detail-value"><?php echo round($weatherData['current_observation']['atmosphere']['pressure'] / 33.87, 2) ?> in</p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/air-pump.gif" alt="" class="icon-small">
                        <p class="detail-title">Pressure</p>
                    </div>
                    <p class="detail-value"><?php echo $weatherData['current_observation']['atmosphere']['pressure']; ?> °</p>
                </div>
            </section>
            <!-- bottom section -->
            <section class="section-sun-moon background-white box-shadow border-rounded box-sizing ">
                <p class="sms-title">Sun & Moon Summary</p>
                <div class="display-flex flex-row justify-space-between">
                    <div class="display-flex flex-row">
                        <img class="icon-large" src="./img/sun.gif" alt="">
                        <div class="flex-column air-quality">
                            <p>Air Quality</p>
                            <p>N/A</p>
                        </div>
                    </div>
                    <div class="rise display-flex flex-row">
                        <div class="display-flex flex-column align-center">
                            <img src="./img/field.gif" alt="" class="icon-small">
                            <p class="name">Sunrise</p>
                            <p class="time"><?php echo $weatherData['current_observation']['astronomy']['sunrise']; ?></p>
                        </div>

                        <div class="graph">
                            <svg class="hundo" viewBox="0 0 100 50">
                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#e5e5e5" stroke-width="10"></path>
                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#f59e0b" stroke-width="10" stroke-dasharray="126" stroke-dashoffset="83.825"></path>
                            </svg>
                        </div>

                        <div class="display-flex flex-column align-center">
                            <img src="./img/sunset.gif" alt="" class="icon-small">
                            <p class="name">Sunset</p>
                            <p class="time"><?php echo $weatherData['current_observation']['astronomy']['sunset']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="display-flex flex-row idk justify-space-between">
                    <div class="display-flex flex-row">
                        <img class="icon-large" src="./img/moon.gif" alt="">
                        <div class="display-flex-column air-quality">
                            <p>Air Quality</p>
                            <p>N/A</p>
                        </div>
                    </div>
                    <div class="rise display-flex flex-row">
                        <div class="display-flex flex-column align-center">
                            <img src="./img/moon-rise.gif" alt="" class="icon-small">
                            <p class="name">Moonrise</p>
                            <p class="time">N/A</p>
                        </div>

                        <div class="graph">
                            <svg class="hundo" viewBox="0 0 100 50">
                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#e5e5e5" stroke-width="10"></path>
                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#0D92F4" stroke-width="10" stroke-dasharray="126" stroke-dashoffset="72.625"></path>
                            </svg>
                        </div>

                        <div class="display-flex flex-column align-center">
                            <img src="./img/moon-set.gif" alt="" class="icon-small">
                            <p class="name">Moonset</p>
                            <p class="time">N/A</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- right side -->
        <div class="main-right">
            <div class="right-side schedule-section position-relative background-white box-shadow display-block border-rounded box-sizing">
                <div class="schedule-buttons">
                    <button class="sb">Today</button>
                    <button class="sb">Tomorrow</button>
                    <button class="selected sb">10 Days (aka 11)</button>
                </div>



                <div class="position-relative schedule">
                    <?php foreach ($forecasts as $forecast) : ?>
                        <div class="display-flex thing align-center">
                            <!-- left side of the thing -->
                            <div class="display-flex align-center">
                                <?php
                                $weatherImage = "";
                                if ($forecast['text'] == "Sunny") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/113.png";
                                } else if ($forecast['text'] == "Partly Cloudy") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/116.png";
                                } else if ($forecast['text'] == "Mostly Sunny") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/113.png";
                                } else if ($forecast['text'] == "Snow") {
                                    $weatherImage = "https://cdn1.iconfinder.com/data/icons/weather-forecast-meteorology-color-1/128/weather-snow-light-512.png";
                                } else if ($forecast['text'] == "Mostly Cloudy") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/119.png";
                                }
                                ?>
                                <img class="icon-large" src="<?php echo $weatherImage; ?>" alt="Weather Icon">
                                <div class="display-flex flex-column left">
                                    <p class="time"><?php echo date("D, M j", $forecast['date']); ?></p>
                                    <p class="weather"><?php echo $forecast['text']; ?></p>
                                </div>
                            </div>
                            <!-- middle of the forecast day box thing -->
                            <div class="split-line"></div>

                            <!-- middle/right the forecast day box thing -->
                            <div class="display-flex align-center">
                                <div class="display-flex flex-row leftt">
                                    <p><span id="degreesvalue"><?php echo ($forecast['high'] + $forecast['low']) / 2 ; ?></span></p>
                                    <p><span id="degrees">°C</span></p>
                                </div>
                                <!-- right side of the forecast day box thing  -->
                                <div class="display-flex flex-column right">
                                    <p>High: <span id="degreesvalue"><?php echo $forecast['high']; ?></span><span id="degrees">°C</span></p>
                                    <p>Low: <span id="degreesvalue"><?php echo $forecast['low']; ?></span><span id="degrees">°C</span></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

    
    


                <!-- idk some arrow on the bottom of the right side -->
                <div class="position-relative schedule-bottom icon-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-7 h-7 text-gray-500">
                        <path d="M12 16l-6-6h12l-6 6z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </main>

    <!-- °C and °F js-->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const degreeValues = document.querySelectorAll("[id='degreesvalue']");
        const speedValues = document.querySelectorAll("[id='spedvalue']");
        const distanceValues = document.querySelectorAll("[id='distvalue']");
        const unitToggle = document.getElementById("unitToggle");

        const initialValues = {
            degrees: Array.from(degreeValues, el => parseFloat(el.innerText)),
            speed: Array.from(speedValues, el => parseFloat(el.innerText)),
            distance: Array.from(distanceValues, el => parseFloat(el.innerText))
        };

        function formatValue(value) {
            return value % 1 === 0 ? value.toFixed(0) : value.toFixed(1);
        }

        function updateUnits() {
            const selectedSystem = unitToggle.value;

            document.querySelectorAll("[id='degrees']").forEach(el => el.innerText = selectedSystem === "fahrenheit" ? "°F" : "°C");
            document.querySelectorAll("[id='speed']").forEach(el => el.innerText = selectedSystem === "fahrenheit" ? "mi/h" : "km/h");
            document.querySelectorAll("[id='distance']").forEach(el => el.innerText = selectedSystem === "fahrenheit" ? "mi" : "km");

            degreeValues.forEach((el, i) => {
                el.innerText = selectedSystem === "fahrenheit"
                    ? formatValue((initialValues.degrees[i] * 9/5) + 32)
                    : formatValue(initialValues.degrees[i]);
            });

            speedValues.forEach((el, i) => {
                el.innerText = selectedSystem === "fahrenheit"
                    ? formatValue(initialValues.speed[i] * 0.621371)
                    : formatValue(initialValues.speed[i]);
            });

            distanceValues.forEach((el, i) => {
                el.innerText = selectedSystem === "fahrenheit"
                    ? formatValue(initialValues.distance[i] * 0.621371)
                    : formatValue(initialValues.distance[i]);
            });
        }

        unitToggle.addEventListener("change", updateUnits);
        updateUnits();
    });
</script>

<!-- Dark/Light mode js-->
<script>
    function idkFunction() {
        const body = document.body;
        const button = document.querySelector(".mode-button");
        const buttonText = button.querySelector("p");
        const buttonIcon = button.querySelector("svg");

        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            buttonText.textContent = "Dark";
            buttonIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"></path>
            `;
        } else {
            buttonText.textContent = "Light";
            buttonIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"></path>
            `;
        }
    }
</script>

</body>

</html>