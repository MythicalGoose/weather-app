<?php
$data = file_get_contents("http://emo.lv/weather-api/forecast/?city=cesis,latvia");
$weatherData = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/maybe-Krievins.jpeg">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="right.css">
    <link rel="stylesheet" href="left.css">
    <link rel="stylesheet" href="dark_light.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="es_nez.css">
    <title>Weather Web</title>
</head>

<body class="light">
    <header class="display-flex box-shadow justify-space-between">
        <!-- Left Header side -->
        <div class="display-flex header-left">
            <svg class="menu-icon icon-small cursor-pointer" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round"></path>
            </svg>

            <h1 class="app-title">VTDT Sky</h1>

            <img class="location-icon icon-small" src="./img/google-maps.gif" alt="">
            <span class="location-city"><?php echo $weatherData['city']['name'] . ", " . $weatherData['city']['country']; ?></span>
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
            <img src="./img/notification.gif" alt="" class="cursor-pointer icon-medium notif">
            <img src="./img/maybe-Krievins.jpeg" alt="" class="cursor-pointer icon-medium kriev">
            <img src="./img/settings.gif" alt="" class="cursor-pointer icon-medium settings">
        </div>
    </header>
    <main>
        <!-- left side -->
        <div class="main-left">
            <!-- top section -->
            <section class="idksome background-white box-shadow border-rounded top-left-section">
                <div class="display-flex justify-space-between">
                    <div>
                        <p class="weather-description">Current Weather</p>
                        <p class="current-time">Local time: <?php date_default_timezone_set("Europe/Riga");
                $date = date('H:i', time());
                echo $date;?></p>

                        <div class="display-flex align-center">
                            <img class="icon-large" src="//cdn.weatherapi.com/weather/64x64/day/113.png" alt="Weather Icon">
                            <div class="display-flex align-center temperature">
                                <p><span id="degreesvalue"><?php echo $weatherData['list'][0]['temp']['day']; ?></span></p>
                                <p><span id="degrees">°C</span></p>
                            </div>



                            <div class="feels-like">
                                <p><?php echo $weatherData['list'][0]['weather'][0]['main']; ?></p>
                                <p>Feels like <span id="degreesvalue"><?php echo $weatherData['list'][0]['feels_like']['day']; ?></span><span id="degrees">°C</span></p>
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
                    <p class="wind-info">Current wind gust: <span id="spedvalue"><?php echo $weatherData['list'][0]['gust']; ?></span><span id="speed">km/h</span></p>
                </div>
            </section>
            <!-- middle section (the 6 cards)-->
            <section class="weather-details">
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/clouds.gif" alt="" class="icon-small">
                        <p class="detail-title">Clouds</p>
                    </div>
                    <p class="detail-value"><?php echo $weatherData['list'][0]['clouds'] ?></p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/wind.gif" alt="" class="icon-small">
                        <p class="detail-title">Wind</p>
                    </div>
                    <p class="detail-value"><span id="spedvalue"><?php echo  $weatherData['list'][0]['speed']; ?></span><span id="speed">km/h</span> </p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/humidity.gif" alt="" class="icon-small">
                        <p class="detail-title">Humidity</p>
                    </div>
                    <p class="detail-value"><?php echo $weatherData['list'][0]['humidity']; ?>%</p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/vision.gif" alt="" class="icon-small">
                        <p class="detail-title">Population</p>
                    </div>
                    <p class="detail-value"><?php echo $weatherData['city']['population']; ?></p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/air-pump.gif" alt="" class="icon-small">
                        <p class="detail-title">Pressure</p>
                    </div>

                    <p class="detail-value"><?php echo round($weatherData['list'][0]['pressure'] / 33.87, 2) ?> in</p>
                </div>
                <div class="detail-card background-white box-shadow border-rounded">
                    <div class="display-flex">
                        <img src="./img/air-pump.gif" alt="" class="icon-small">
                        <p class="detail-title">Pressure</p>
                    </div>
                    <p class="detail-value"><?php echo $weatherData['list'][0]['pressure']; ?> °</p>
                </div>
            </section>
            <!-- the weather thing when screen is small -->
            <div class="idkanymore display-block">
                <div class=" other-schedule-section position-relative display-block box-sizing">

                    <!-- Buttons for selecting different forecast days [do not work rn cuz i havent added that] -->
                    <div class="schedule-buttons">
                        <button class="sb">Today</button>
                        <button class="sb">Tomorrow</button>
                        <button class="selected sb">10 Days (aka 11)</button>
                    </div>

                    <!-- Weather forecast container-->
                    <div class="position-relative other-schedule flex-row display-flex cursor-grab box-sizing border-rounded">
                        <?php foreach ($weatherData['list'] as $day) : ?>
                            <div class="other-thing border-rounded box-shadow">
                                <!-- Left section (Weather Icon, Date, and Description) -->
                                <div class="lefts">
                                    <?php
                                    $weatherImage = "";
                                    if ($day['weather'][0]['description'] == "sky is clear") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/night/113.png";
                                    } else if ($day['weather'][0]['description'] == "snow") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/326.png";
                                    } else if ($day['weather'][0]['description'] == "mostly Sunny") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/113.png";
                                    } else if ($day['weather'][0]['description'] == "rain and snow") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/night/317.png";
                                    } else if ($day['weather'][0]['description'] == "mostly Cloudy") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/119.png";
                                    }else if ($day['weather'][0]['description'] == "light rain") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/302.png";
                                    }else if ($day['weather'][0]['description'] == "overcast clouds") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/122.png";
                                    }else if ($day['weather'][0]['description'] == "broken clouds") {
                                        $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/116.png";
                                    }
                                    ?>
                                    <img class="icon-large" src="<?php echo $weatherImage; ?>" alt="Weather Icon">
                                    <div class="left-details">
                                        <p class="time"><?php echo date('Y-m-d', $day['dt']); ?></p>
                                        <p class="weather"><?php echo $day['weather'][0]['description']; ?></p>
                                    </div>
                                </div>

                                <!-- Temperatures -->
                                <div class="right">
                                    <div class="other-temperature">
                                        <p><span id="degreesvalue"><?php echo $day['temp']['day']; ?></span></p>
                                        <p><span id="degrees">°C</span></p>
                                    </div>
                                    <div class="temp-details">
                                        <p>High: <span id="degreesvalue"><?php echo $day['temp']['max']; ?></span><span id="degrees">°C</span></p>
                                        <p>Low: <span id="degreesvalue"><?php echo $day['temp']['min']; ?></span><span id="degrees">°C</span></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- bottom section -->
            <section class="section-sun-moon background-white box-shadow border-rounded box-sizing ">
                <p class="sms-title">Sun & Moon Summary</p>
                <div class="display-flex flex-row justify-space-between">
                    <div class="display-flex flex-row">
                        <img class="icon-large" src="./img/sun.gif" alt="">
                        <div class="flex-column air-quality">
                            <p>Day <span id="degrees">°C</span></p>
                            <p><span id="degreesvalue"><?php echo $weatherData['list'][0]['temp']['day'];?></span></p>
                        </div>
                    </div>
                    <div class="rise display-flex flex-row">
                        <div class="display-flex flex-column align-center">
                            <img src="./img/field.gif" alt="" class="icon-small">
                            <p class="name">Sunrise</p>
                            <p class="time"><?php echo date("H:i", $day['sunrise']); ?></p>
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
                            <p class="time"><?php echo date("H:i", $day['sunset']); ?></p>
                        </div>
                    </div>
                </div>

                <div class="display-flex flex-row idk justify-space-between">
                    <div class="display-flex flex-row">
                        <img class="icon-large" src="./img/moon.gif" alt="">
                        <div class="display-flex-column air-quality">
                            <p>Night <span id="degrees">°C</span></p>
                            <p><span id="degreesvalue"><?php echo $weatherData['list'][0]['temp']['night']; ?></span></p>
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
                    <button class="selected sb">10 Days [14*]</button>
                </div>

                <div class="position-relative schedule">
                    <?php foreach ($weatherData['list'] as $day) : ?>
                        <div class="display-flex thing align-center">
                            <!-- left side of the thing -->
                            <div class="display-flex align-center">
                                <?php
                                $weatherImage = "";
                                if ($day['weather'][0]['description'] == "sky is clear") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/night/113.png";
                                } else if ($day['weather'][0]['description'] == "snow") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/326.png";
                                } else if ($day['weather'][0]['description'] == "mostly Sunny") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/113.png";
                                } else if ($day['weather'][0]['description'] == "rain and snow") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/night/317.png";
                                } else if ($day['weather'][0]['description'] == "mostly Cloudy") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/119.png";
                                }else if ($day['weather'][0]['description'] == "light rain") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/302.png";
                                }else if ($day['weather'][0]['description'] == "overcast clouds") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/122.png";
                                }else if ($day['weather'][0]['description'] == "broken clouds") {
                                    $weatherImage = "https://cdn.weatherapi.com/weather/64x64/day/116.png";
                                }
                                ?>
                                <img class="icon-large" src="<?php echo $weatherImage; ?>" alt="Weather Icon">
                                <div class="display-flex flex-column left">
                                    <p class="time"><?php echo date('Y-m-d', $day['dt']); ?></p>
                                    <p class="weather"><?php echo $day['weather'][0]['description']; ?></p>
                                </div>
                            </div>
                            <!-- middle of the forecast day box thing -->
                            <div class="split-line"></div>

                            <!-- middle/right the forecast day box thing -->
                            <div class="display-flex align-center">
                                <div class="display-flex flex-row leftt">
                                    <p><span id="degreesvalue"><?php echo $day['temp']['day']; ?></span></p>
                                    <p><span id="degrees">°C</span></p>
                                </div>
                                <!-- right side of the forecast day box thing  -->
                                <div class="display-flex flex-column right">
                                    <p>High: <span id="degreesvalue"><?php echo $day['temp']['max']; ?></span><span id="degrees">°C</span></p>
                                    <p>Low: <span id="degreesvalue"><?php echo $day['temp']['min']; ?></span><span id="degrees">°C</span></p>
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
                    el.innerText = selectedSystem === "fahrenheit" ?
                        formatValue((initialValues.degrees[i] * 9 / 5) + 32) :
                        formatValue(initialValues.degrees[i]);
                });

                speedValues.forEach((el, i) => {
                    el.innerText = selectedSystem === "fahrenheit" ?
                        formatValue(initialValues.speed[i] * 0.621371) :
                        formatValue(initialValues.speed[i]);
                });

                distanceValues.forEach((el, i) => {
                    el.innerText = selectedSystem === "fahrenheit" ?
                        formatValue(initialValues.distance[i] * 0.621371) :
                        formatValue(initialValues.distance[i]);
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


    <!--Priekš tā tur weather section kuru tu redzi ka samazini screen-->
    <script>

        const slider  = document.querySelector('.other-schedule');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX;
            scrollLeft = slider.scrollLeft;
        });


        slider.addEventListener('mouseleave', () => {
            isDown = false;
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
        });

        slider.addEventListener('mousemove', (e) => {
            if(!isDown) return;
        e.preventDefault();
        const x = e.pageX;
        const walk = x - startX;
            slider.scrollLeft = scrollLeft - walk;
        });
    </script>

</body>

</html>