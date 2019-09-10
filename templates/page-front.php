<?php

$jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Coveta fuma,ES&units=metric&appid=db19c130032993519d95945d4c8f6fbf");
$jsondata = json_decode($jsonfile);
$temp = $jsondata->main->temp;
$pressure = $jsondata->main->pressure;
$mintemp = $jsondata->main->temp_min;
$maxtemp = $jsondata->main->temp_max;
$wind = $jsondata->wind->speed;
$humidity = $jsondata->main->humidity;
$desc = $jsondata->weather[0]->description;
$maind = $jsondata->weather[0]->main;


$cover = get_field('cover-img');

?>

<div class="fullpage-cover" style="background-image:url(<?php echo $cover['url']; ?>);">
  <div class="fullpage-text-wrapper">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-md-8">

          <?php $title_one = get_field('fp-title-one'); ?>
          <?php $title_two = get_field('fp-title-two'); ?>

          <div class="fullpage-text-content" data-aos="fade-up">
            <h1>
              <?php echo $title_one; ?>
            </h1>
            <p class="ingress" data-aos="fade-up"><?php the_field('fp-ingress'); ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="report-container">
            <?php echo (ceil($temp)); ?>
            <?php echo $maind; ?>
            <?php echo $desc; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
