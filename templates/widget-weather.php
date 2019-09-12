 <div class="media current-weather aos-animate aos-animate-custom " data-aos="fade-left" data-aos-delay="200">
   <img class="align-self-center" src="http://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png">
   <div class="media-body">
     <ul class="current-weather-data">
       <li class="weather-desc"><span class="font-main"><?php echo $maind; ?></span><span class="font-head last"><?php echo number_format($temp, 1); ?>&deg;</span></li>
       <li class="minmax"><span>min</span><span class="font-head last"><?php echo number_format($mintemp, 1); ?>&deg;</span></li>
       <li class="minmax"><span>max</span><span class="font-head last"><?php echo number_format($maxtemp, 1); ?>&deg;</span></li>
       <li class="wind"><span>wind</span><span class="font-head"><?php echo $wind; ?> m/s</span><img class="icon-wind" src="<?php echo get_template_directory_uri() ?>/assets/images/wind-white.svg" alt="wind icon"></li>
     </ul>
   </div>
   <span class="label">Vädret i Coveta Fumá</span>
 </div>
