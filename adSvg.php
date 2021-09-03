<div class="promo-wrap">
  <div class="promo-svg-cont">
    <!-- DEFAULT DFP FARMER NEWSLETTER -->
    <!-- <a href="http://bit.ly/3c1v8ds" target="_blank">
      <img class="promo-desktop" src="/images/farmer_desktop_purple.svg" alt="DFP Farmer Newsletter">
      <img class="promo-mobile" src="/images/farmer_mobile_purple.svg" alt="DFP Farmer Newsletter">
    </a> -->
    <?php

      class ad {
        public $desktopLink;
        public $mobileLink;
        public $desktopImg;
        public $mobileImg;
        public $alt;
      }

      $defiPulse = new ad();
      $defiPulse->desktopLink = 'https://bit.ly/2WO3hKh';
      $defiPulse->mobileLink = 'https://bit.ly/2WO3hKh';
      $defiPulse->desktopImg = '/images/dhedge-desktop.svg';
      $defiPulse->mobileImg = '/images/dhedge-mobile.svg';
      $defiPulse->alt = 'dHEDGE Banner';

      $ads = array($defiPulse);

      $arrLength = count($ads) - 1;
      $index = mt_rand(0, $arrLength);
    ?>

    <a class="promo-desktop" href="<?php echo ($ads[$index]->desktopLink); ?>" target="_blank">
      <img class="promo-desktop" src="<?php echo ($ads[$index]->desktopImg); ?>" alt="<?php echo ($ads[$index]->alt); ?>">
    </a>
    <a class="promo-mobile" href="<?php echo ($ads[$index]->mobileLink); ?>" target="_blank">
    <img class="promo-mobile" src="<?php echo ($ads[$index]->mobileImg); ?>" alt="<?php echo ($ads[$index]->alt); ?>">
    </a>
  </div>
</div>
