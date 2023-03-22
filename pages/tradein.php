<?php
/*
Template Name: tradein
Template Post Type: page
*/
?>
<?php get_header(); ?>
<section class="content" id="content">
  <div class="section section-tradein section-content">
    <p class="inner-title">
      Trade-in
    </p>
    <div class="content-image-wrapper">
      <img src="<?php bloginfo('template_url'); ?>/assets/img/trade-img.png" alt="">
      <h3>Компоненти простоюють?</h3>
      <p>
        Наша програма Trade-In вирішить цю проблему швидко і вигідно для всіх! Viber | Telegram -
        <a href="tel:<?php the_field('telegram-tradein') ?>"><?php the_field('telegram-tradein') ?></a> Mon-Sun: 12:00-18:00
      </p>
      <a href="#" class="btn btn-orange">
        Call us
      </a>
    </div>
    <div class="tradein-envelope">
      <div class="wrapper">
        <h3>
          How does Trade-In work in Tera Flops?
          <span>
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/tooltip-ico.svg" alt="">
                        </span>
        </h3>
        <p>
          The Tera Flops online store has a Trade-In function that allows you to save a lot. Below you can learn more about our benefits.
        </p>
        <div class="tradein-row">
          <div class="tradein-col">
            <div class="tradein-item">
              <div class="tradein-item__img">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/trade-ico1.svg" alt="">
              </div>
              <p class="tradein-item__title">
                Write to us
              </p>
              <div class="tradein-item__description">
                In Telegram or Viber, we accept a list of components that you would like to sell or exchange, describing their technical condition. You can also add a photo.
              </div>
            </div>
          </div>
          <div class="tradein-col">
            <div class="tradein-item">
              <div class="tradein-item__img">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/trade-ico2.svg" alt="">
              </div>
              <p class="tradein-item__title">
                Get a calculation
              </p>
              <div class="tradein-item__description">
                Our managers promptly give answer to the evaluation of all positions proposed by you. if they suit you, you can place an order or buy.
              </div>
            </div>
          </div>
          <div class="tradein-col">
            <div class="tradein-item">
              <div class="tradein-item__img">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/trade-ico3.svg" alt="">
              </div>
              <p class="tradein-item__title">
                Fast deal
              </p>
              <div class="tradein-item__description">
                You can bring the components for checking to us if you are in kyiv, or send them by nova post. immediately after the operational check, we carry out the transaction. if you buy accessories from us via trade-in, we pay the transportation expenses for sending the goods by mail!
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="default-dropdown">
      <div class="dropdown-inner">
                    <span class="dropdown-text">
                        List of computer components accepted in Trade-In
                    </span>
        <div class="dropdown-content">
          <div class="default-content">
            <p>Video cards<br/>
              Nvidia<br/>
              RTX 2000 series ( 2080ti / 2080 / 2070 / 2060 and super versions)<br/>
              GTX 1600 series ( 1660ti / 1660 / 1650ti / 1650 )<br/>
              GTX 1000 series<br/>
              GTX 900 series ( 980ti / 980 / 970 / 960 / 950 )<br/>
              GTX 700 series<br/>
              GTX 600 series ( 690 / 680 / 670 / 660ti / 660 / 650ti / 650 )</p>

            <p> AMD Radeon<br/>
              RX 5000 series ( 5700xt / 5700 / 5600xt / 5600 / 5500xt / 5500 )<br/>
              RX Vega series (Radeon VII / Vega 64 / Vega 54)<br/>
              RX 500 series ( 590 / 580 / 570 / 560 / 550 )<br/>
              RX 400 series ( 480 / 470 / 460 )<br/>
              97R 300 series ( R9 Fury X / R9 Fury / R9 Nano / 390x / 390 / 380x / 380 / 370 )<br/>
              R 200 series ( 290x / 290 / 285 / 280x / 280 / 270x / 270 / 260x )<br/>
              HD 7000 series (7970/7950/7870/7850/7790/7770/7750)</p>

            <p>Processors</p>

            <p>Intel<br/>
              LGA 1151v2 8th-9th generation (Intel Core i9 / i7 / i5 / i3 - versions K / KF / F and without. )<br/>
              LGA 1151 6th-7th generation (Intel Core / i7 / i5 - versions K and without. )<br/>
              LGA 1150 4th generation (Intel Core / i7 / i5 / Xeon 12xx v3 - version K and without. )<br/>
              LGA 1155 2nd-3rd generation (Intel Core / i7 / i5 / Xeon 12xx v2 v1 - version K and without. )<br/>
              LGA 1156 1st generation (Intel Core / i7 / i5 / Xeon x34xx - K version and without. )</p>

            <p>Intel Workstation<br/>
              LGA 2066 processors from 8 cores ( Intel Core i9 / i7 )<br/>
              LGA 2011 v3 processors from 6 cores ( Intel Core / i7 / Xeon 16xx v3 / Xeon 26xx v3 )<br/>
              LGA 2011 processors from 6 cores ( Intel Core / i7 / Xeon 16xx v1 (v2) / Xeon 26xx v1 (v2) )</p>

            <p>AMD<br/>
              AM4: 1,2,3 generation Ryzen (Ryzen 9/7/5/3 - X/G versions)</p>

            <p>AMD for workstations<br/>
              TR4: Threadripper 1.2 generation processors from 12 cores (19xxX / 29xxWX)</p>

            <p> motherboards</p>

            <p>Intel<br/>
              LGA 1151v2 chipsets ( Z390 / Z370 / B365 / B360 / H310 )<br/>
              LGA 1151 chipsets ( H110, H170, B150, Q150, Q170, Z170 , B250, Q250, H270, Q270, Z270 )<br/>
              LGA 1150 chipsets ( H81, B85, Q85, Q87, H87, Z87, H97, Z97 )<br/>
              LGA 1155 chipsets ( H61, B65, Q65, Q67, H67, P67, Z68 )<br/>
              LGA 1156 chipsets ( H55, P55, H57, Q57 )</p>

            <p>Intel Workstation<br/>
              LGA 2066 chipsets (X299/C422)<br/>
              LGA 2011 v3 chipsets (X99/C612)<br/>
              LGA 2011 chipsets ( X79 / C602 / C604 / C606 / C608 )<br/>
              LGA 1366 chipsets (X58)</p>

            <p>AMD<br/>
              AM4 chipsets ( X570 / X470 / X370 / B450 / B350 / A320 )</p>

            <p>AMD for workstations<br/>
              TR4 chipsets ( X399 )</p>

            <p>RAM<br/>
              DDR4 memory modules with capacity ( 8gb / 16gb / 32gb / 64gb )<br/>
              DDR3 memory modules with capacity ( 8gb / 16gb / 32gb )</p>

            <p>SSD drives<br/>
              SSD drives Sata / m.2 / pci-e ( 60gb / 120gb / 240gb / 256gb / 480gb / 512gb / 980gb / 1tb / 2tb )</p>

            <p>Coolers and cooling systems<br/>
              CPU coolers are only fully equipped with mounts (Intel 115x and/or AM4), boxed coolers are not accepted, used coolers / coolers are not accepted.<br/>
              Case fans ( 120mm / 140mm )</p>

            <p>Power supplies<br/>
              Power supplies from 500w and above. Mining power supplies are not accepted.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="default-content">
      <h3>Buying a Trade In computer - is it profitable?</h3>
      <p>It is hard to keep up with modern technologies, what was a novelty yesterday is already hopelessly outdated today. Particularly noticeable progress in the world of computer technology. A PC or laptop that was relevant a couple of years ago loses its novelty in a year or two. I want something new. This is especially true for gamers. Every year there are more and more demanding games that require large computer resources.</p>
      <br/>
      <br/>
      <h3>Which option to choose?</h3>
      <p>An upgrade is justified if the computer is slightly outdated. It is suitable for those who decide to replace one or two modules. For those who want to completely update the filling, the upgrade is unprofitable.</p>

      <p>Buying used PC components is not the only activity of the TeraFlops store. More information can be found on our website. Selling a PC and buying a new one will take time. You will have to deal with the implementation yourself, spend time writing an ad. Since there can be many such ads, you may have to pay extra for advertising. Yes, and no one will guarantee that you will sell the old computer at a fair price, it is quite possible that after a month of ordeals, accept the first offer. Parts for PC assembly will be sold separately even longer.</p>

      <p>Buying a Trade In PC is beneficial when you decide to radically upgrade your hardware. You buy a new PC and immediately sell the old one. Saves time and money. The master will evaluate used computer components and pay the real cost for them.</p>

      <p>Now the Trade In scheme is used not only in the PC world. So they buy TVs, washing machines, refrigerators and other household appliances. Why is it beneficial? The thing is, renovations happen all the time. Phones, tablets, which were sold a couple of years ago, are now being discontinued. Manufacturers do not bother making spare parts for outdated models. It is beneficial for them to buy new equipment, and not repair the old one. Purchasing computer parts allows workshops to stock up on parts for discontinued products.</p>
      <br/>
      <br/>
      <h3>How to buy used PC components?</h3>
      <p>Buying back old computers is not new. The scheme appeared in the last century. By purchasing a computer under the trade-in scheme, buyers save money.</p>

      <p>So if you understand that you want to sell your computer for parts, you are welcome. If you are not sure which is more profitable, consult with our specialist. He will calculate what is best for you.</p>

      <p>To make the right decision, you need to evaluate your technique. This can be done exactly only in the store, but a preliminary assessment can also be done by phone.</p>

      <p>The next step is to understand what the client wants. Some indicate specific names of video cards and processors that they would like to see. If you can't tell the serial number of the model, it doesn't matter, tell the technician why you don't like your current computer. For example, if a new game “hangs”, say its name, the master will understand what needs to be replaced.</p>

      <p>After the problem is identified, the specialist will be able to evaluate what is better to choose, upgrade or sell PC parts. The beauty of this scheme is that you don't have to worry about selling your old computer.</p>

      <p>If you choose to upgrade, you can also reduce costs. We offer to hand over computer components.</p>

      <p>Buying used PC components is not the only activity of the TeraFlops store. More information can be found on our website.</p>
    </div>
  </div>
  <?php get_footer(); ?>
</section>


