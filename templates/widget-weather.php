<div class="media current-weather">
  <img class="align-self-center" src="http://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png">
  <div class="media-body">
    <ul class="current-weather-data">
      <li class="current-temp"><span class="text">current temp</span><span class="font-head"><?php echo number_format($temp, 1); ?>&deg;</span></li>
      <li class="weather-desc"><span class="font-main"><?php echo $desc; ?></span></li>
      <li class="minmax"><span class="text">min</span><span class="font-head"><?php echo number_format($mintemp, 1); ?>&deg;</span></li>
      <li class="minmax"><span class="text">max</span><span class="font-head"><?php echo number_format($maxtemp, 1); ?>&deg;</span></li>
    </ul>
  </div>
</div>
