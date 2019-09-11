<?php
// id=2521976
$jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=2521976&units=metric&appid=db19c130032993519d95945d4c8f6fbf");
$jsondata = json_decode($jsonfile);
$temp = $jsondata->main->temp;
$pressure = $jsondata->main->pressure;
$mintemp = $jsondata->main->temp_min;
$maxtemp = $jsondata->main->temp_max;
$wind = $jsondata->wind->speed;
$humidity = $jsondata->main->humidity;
$desc = $jsondata->weather[0]->description;
$maind = $jsondata->weather[0]->main;
$icon = $jsondata->weather[0]->icon;

$cover = get_field('cover-img');

?>

<div class="fullpage-cover" style="background-image:url(<?php echo $cover['url']; ?>);">
  <div class="fullpage-text-wrapper">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-md-6 col-lg-7">

          <?php $title_one = get_field('fp-title-one'); ?>
          <?php $title_two = get_field('fp-title-two'); ?>

          <div class="fullpage-text-content" data-aos="fade-up">
            <h1>
              <?php echo $title_one; ?>
            </h1>
            <p class="ingress" data-aos="fade-up"><?php the_field('fp-ingress'); ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="media current-weather" data-aos="fade-left" data-aos-delay="200">
            <img class="align-self-center" src="http://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png">
            <div class="media-body">
              <ul class="current-weather-data">
                <li class="weather-desc"><span class="font-main"><?php echo $maind; ?></span><span class="font-head"><?php echo number_format($temp, 1); ?>&deg;</span></li>
                <li class="minmax"><span class="text">min</span><span class="font-head"><?php echo number_format($mintemp, 1); ?>&deg;</span></li>
                <li class="minmax"><span class="text">max</span><span class="font-head"><?php echo number_format($maxtemp, 1); ?>&deg;</span></li>
                <li class="wind"><span>wind</span><span class="font-head"><?php echo $wind; ?> m/s</span><img class="icon-wind" src="<?php echo get_template_directory_uri() ?>/assets/images/wind-white.svg" alt="wind icon"></li>
              </ul>
            </div>
            <span class="label">Vädret just nu.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
