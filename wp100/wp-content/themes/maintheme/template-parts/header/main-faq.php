<style>
    :root {
  --white-1000:255,255,255;
  --black-800:31,33,38;
  --black-700:23,28,39;
  --red-1000:253,53,92;
  --red-900:244,67,54;
  --green-900:8,201,143;
  --green-1000:0,200,83;
  --yellow-1000:255,214,0;
  --yellow-900:255,229,145;
  --yellow-800:255,160,0;
  --yellow-700:251,192,45;
  --purple-1000:131,66,237;
  --purple-900:120,87,217;
  --purple-650:104,41,206;
  --purple-600:45,25,110;
  --purple-550:44,19,98;
  --purple-500:24,8,76;
  --purple-450:34,10,65;
  --purple-400:38,18,100;
  --purple-370:56,16,105;
  --purple-350:61,7,131;
  --purple-300:113,56,209;
  --purple-200:82,78,114;
  --purple-100:140,135,179;
  --blue-800:8,20,76;
  --blue-400:53,134,255;
  --blue-300:25,53,110;
  --blue-200:42,120,238;
  --blue-100:85,201,255;
  --neutral-dark:0,0,0;
  --neutral-1000:20,20,20;
  --neutral-900:31,31,31;
  --neutral-800:51,51,51;
  --neutral-700:84,84,84;
  --neutral-600:117,117,117;
  --neutral-500:175,175,175;
  --neutral-400:203,203,203;
  --neutral-300:226,226,226;
  --neutral-200:238,238,238;
  --neutral-100:246,246,246;
  --primary-color:255,216,107;
  --secondary-color-blue:100,193,255;
  --primary-text-color:rgb(var(--white-1000));
  --secondary-text-color:91,102,124;
  --tertiary-text-color:179,172,210;
  --link-color-primary:255,227,142;
  --link-color-secondary:166,113,253;
  --blue-navigation:41,121,255;
  --button-text-dark:107,64,0;
  --background-casino:22,8,64;
  --background-sport:0,17,51;
  --background-secondary:245,246,251;
  --background-contrast:9,10,11;
  --background-footer:4,3,9;
  --primary-box-shadow-color:223,152,70;
  --secondary-box-shadow-color:82,27,171;
  --warn-box-shadow-color:34,80,199;
  --banner-primary-color:255,217,109;
  --button-border-color:104,41,206;
  --wall-of-wins-shadow-color:162,107,253;
  --primary-color-gradient:linear-gradient(rgb(var(--primary-color)),#ffbd59);
  --secondary-color-gradient:linear-gradient(rgb(var(--purple-1000)),rgb(var(--purple-650)));
  --warn-color-gradient:linear-gradient(rgb(var(--secondary-color-blue)),#2e72d7)
}
.info-preload {
  display:none
}
.info-preload._show {
  display:block
}
.page-template._hidden {
  display:none
}
.sidebar--nav {
  display:grid;
  grid-auto-flow:column;
  width:-webkit-max-content;
  width:max-content;
  margin:0 var(--containerPadding);
  overflow:auto;
  text-transform:uppercase
}
@media screen and (min-width:1280px) {
  .sidebar--nav {
    grid-auto-flow:row;
    margin:0 48px 0 0;
    overflow:visible
  }
}
.sidebar--item {
  border-radius:8px;
  background:rgb(var(--purple-900),.2);
  margin-right:8px
}
@media screen and (min-width:1280px) {
  .sidebar--item {
    text-align:center;
    margin-bottom:8px;
    margin-right:0;
    width:254px
  }
}
.sidebar--item:last-child {
  margin-bottom:0
}
.sidebar--scroll-container {
  width:-webkit-max-content;
  width:max-content;
  margin:0 calc(-1 * var(--containerPadding))
}
@media screen and (min-width:1280px) {
  .sidebar--scroll-container {
    margin:0
  }
}
.sidebar--link {
  display:block;
  text-decoration:none;
  white-space:nowrap;
  line-height:100%;
  padding:10px 14px
}
@media screen and (min-width:1280px) {
  .sidebar--link {
    padding:12px 20px
  }
  :lang(ch) .sidebar--link,
  :lang(de) .sidebar--link,
  :lang(fr) .sidebar--link,
  :lang(pt) .sidebar--link {
    padding:12px 8px;
    font-size:16px
  }
  :lang(fi) .sidebar--link,
  :lang(it) .sidebar--link {
    padding:12px 8px;
    font-size:18px
  }
  :lang(hu) .sidebar--link {
    padding:12px 8px;
    font-size:15px
  }
}
.sidebar--link._active,
.sidebar--link:hover {
  color:rgb(var(--white-1000))
}
.sidebar--link._active {
  background:rgb(var(--purple-1000));
  border-radius:8px
}
.sidebar--item:last-child .sidebar--link {
  border-right:none
}
@media screen and (min-width:1280px) {
  .sidebar--item:last-child .sidebar--link {
    border-bottom:none
  }
}
.container--content {
  min-width:0
}
._info-center {
  max-width:calc(1024px + (var(--containerPadding) * 2));
  flex-direction:column
}
@media screen and (min-width:1280px) {
  ._info-center {
    margin:0 auto;
    max-width:1304px;
    width:100%;
    flex-direction:row
  }
}
:lang(ch) ._info-center,
:lang(de) ._info-center,
:lang(fi) ._info-center,
:lang(fr) ._info-center,
:lang(hu) ._info-center,
:lang(it) ._info-center,
:lang(pl) ._info-center,
:lang(pt) ._info-center {
  max-width:calc(1200px + (var(--containerPadding) * 2))
}
.info-decor {
  background-repeat:no-repeat;
  background-size:100% 130%;
  background-position:center -76px;
  mix-blend-mode:screen;
  background-image:url(/cdn-static/images/polestarbet/general/background-gradient-casino-dark-mob.png)
}
@media (-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi) {
  .info-decor {
    background-image:url(/cdn-static/images/polestarbet/general/background-gradient-casino-dark-mob@2x.png)
  }
}
@media screen and (min-width:1280px) {
  .info-decor {
    background-image:url(/cdn-static/images/polestarbet/general/background-gradient-casino-dark.png);
    background-size:100% auto
  }
}
@media screen and (min-width:1280px) and (-webkit-min-device-pixel-ratio:2),screen and (min-width:1280px) and (min-resolution:192dpi) {
  .info-decor {
    background-image:url(/cdn-static/images/polestarbet/general/background-gradient-casino-dark@2x.png)
  }
}
.page {
  padding-top:16px;
  padding-bottom:40px;
  counter-reset:custom-counter
}
@media screen and (min-width:1024px) {
  .page {
    padding-top:24px;
    padding-bottom:48px
  }
}
@media screen and (min-width:1280px) {
  .page {
    padding-top:64px;
    padding-bottom:64px
  }
}
.page p {
  line-height:120%;
  color:rgb(var(--tertiary-text-color));
  font-family:var(--font-family-primary)
}
@media screen and (min-width:1280px) {
  .page p {
    font-size:19px
  }
}
@media screen and (min-width:1920px) {
  .page p {
    line-height:140%
  }
}
.page p a {
  text-decoration:underline;
  color:rgb(var(--link-color-secondary))
}
@media screen and (min-width:1280px) {
  .page p a:hover {
    text-decoration:none;
    transition:var(--transitionTime) ease
  }
}
.page--title {
  margin-bottom:20px;
  line-height:100%;
  font-family:var(--font-family-base)
}
@media screen and (min-width:1280px) {
  .page--title {
    font-size:32px
  }
}
.page article {
  margin:12px 0
}
@media screen and (min-width:768px) {
  .page article {
    margin:16px 0
  }
}
.page article h2 {
  font-weight:700;
  margin:20px 0 8px
}
@media screen and (min-width:1280px) {
  .page article h2 {
    font-weight:800;
    margin-top:24px
  }
}
.page--about h1,
.page--complaints h1,
.page--contact-us h1 {
  font-weight:800;
  font-size:24px;
  letter-spacing:.04em;
  line-height:120%;
  margin-bottom:20px;
  text-transform:uppercase
}
@media screen and (min-width:1280px) {
  .page--about h1,
  .page--complaints h1,
  .page--contact-us h1 {
    font-size:32px
  }
}
.page--about h2,
.page--complaints h2,
.page--contact-us h2 {
  font-weight:700;
  letter-spacing:-.03em;
  font-family:var(--font-family-primary);
  margin:24px 0 12px;
  line-height:120%;
  font-size:19px
}
@media screen and (min-width:1280px) {
  .page--about h2,
  .page--complaints h2,
  .page--contact-us h2 {
    font-size:24px
  }
}
.page--contact-us div>div>div {
  display:grid;
  grid-gap:8px
}
@media screen and (min-width:768px) {
  .page--contact-us div>div>div {
    grid-template-columns:repeat(2,1fr)
  }
}
.page--contact-us div>div>div a {
  font-size:16px;
  line-height:100%;
  font-weight:400;
  padding:21px 10px;
  border-radius:12px;
  text-decoration:none;
  color:rgb(var(--white-1000));
  align-items:center;
  justify-content:center;
  display:flex;
  background:rgba(var(--purple-900),.2);
  width:100%
}
.page--contact-us div>div>div a img {
  width:18px;
  height:18px;
  margin-right:8px;
  filter:invert(82%) sepia(84%) saturate(413%) hue-rotate(321deg) brightness(101%) contrast(103%)
}
.page--contact-us div>div>div a>div {
  display:grid;
  grid-auto-flow:column;
  grid-gap:8px;
  font-family:var(--font-family-primary);
  font-weight:600;
  letter-spacing:-.03em
}
.page--complaints h2:first-child {
  display:none
}
.page--cookies-policy h1,
.page--faq h1,
.page--privacy-policy h1,
.page--responsible-gaming h1,
.page--rules h1 {
  font-weight:800;
  font-size:24px;
  letter-spacing:.04em;
  line-height:120%;
  margin-bottom:20px;
  text-transform:uppercase
}
@media screen and (min-width:1280px) {
  .page--cookies-policy h1,
  .page--faq h1,
  .page--privacy-policy h1,
  .page--responsible-gaming h1,
  .page--rules h1 {
    font-size:32px
  }
}
.page--cookies-policy h2,
.page--faq h2,
.page--privacy-policy h2,
.page--responsible-gaming h2,
.page--rules h2 {
  font-weight:700;
  letter-spacing:-.03em;
  font-family:var(--font-family-primary);
  padding:12px 36px 16px 0;
  margin-bottom:12px;
  line-height:120%;
  font-size:16px;
  position:relative;
  border-bottom:1px solid rgba(var(--purple-900),.2)
}
@media screen and (min-width:1280px) {
  .page--cookies-policy h2,
  .page--faq h2,
  .page--privacy-policy h2,
  .page--responsible-gaming h2,
  .page--rules h2 {
    font-size:19px;
    cursor:pointer
  }
}
.page--cookies-policy h2:after,
.page--faq h2:after,
.page--privacy-policy h2:after,
.page--responsible-gaming h2:after,
.page--rules h2:after {
  content:"";
  display:block;
  position:absolute;
  top:50%;
  right:0;
  transform:translateY(-50%);
  width:20px;
  height:20px;
  background:url(/assets/icons/caret-down.svg) 50% no-repeat;
  background-size:125%;
  margin-left:auto;
  flex-shrink:0;
  filter:invert(99%) sepia(0) saturate(7500%) hue-rotate(269deg) brightness(104%) contrast(103%)
}
.page--cookies-policy section p,
.page--cookies-policy section table,
.page--cookies-policy section ul,
.page--faq section p,
.page--faq section table,
.page--faq section ul,
.page--privacy-policy section p,
.page--privacy-policy section table,
.page--privacy-policy section ul,
.page--responsible-gaming section p,
.page--responsible-gaming section table,
.page--responsible-gaming section ul,
.page--rules section p,
.page--rules section table,
.page--rules section ul {
  display:none
}
.page--cookies-policy section._open,
.page--faq section._open,
.page--privacy-policy section._open,
.page--responsible-gaming section._open,
.page--rules section._open {
  padding-bottom:16px
}
.page--cookies-policy section._open h2:after,
.page--faq section._open h2:after,
.page--privacy-policy section._open h2:after,
.page--responsible-gaming section._open h2:after,
.page--rules section._open h2:after {
  transform:translateY(-50%) rotate(-180deg)
}
.page--cookies-policy section._open p,
.page--cookies-policy section._open table,
.page--cookies-policy section._open ul,
.page--faq section._open p,
.page--faq section._open table,
.page--faq section._open ul,
.page--privacy-policy section._open p,
.page--privacy-policy section._open table,
.page--privacy-policy section._open ul,
.page--responsible-gaming section._open p,
.page--responsible-gaming section._open table,
.page--responsible-gaming section._open ul,
.page--rules section._open p,
.page--rules section._open table,
.page--rules section._open ul {
  max-height:100%;
  width:100%;
  display:block
}
.page--cookies-policy section._open div>div,
.page--faq section._open div>div,
.page--privacy-policy section._open div>div,
.page--responsible-gaming section._open div>div,
.page--rules section._open div>div {
  overflow-x:auto
}
.page--cookies-policy ul,
.page--faq ul,
.page--privacy-policy ul,
.page--responsible-gaming ul,
.page--rules ul {
  list-style:circle;
  padding-left:18px;
  margin:10px 0;
  font-size:16px;
  font-family:var(--font-family-primary);
  color:rgb(var(--tertiary-text-color))
}
@media screen and (min-width:1280px) {
  .page--cookies-policy ul,
  .page--faq ul,
  .page--privacy-policy ul,
  .page--responsible-gaming ul,
  .page--rules ul {
    font-size:19px
  }
}
.page--cookies-policy ul li a,
.page--faq ul li a,
.page--privacy-policy ul li a,
.page--responsible-gaming ul li a,
.page--rules ul li a {
  text-decoration:underline;
  color:rgb(var(--link-color-secondary))
}
.page--cookies-policy table,
.page--faq table,
.page--privacy-policy table,
.page--responsible-gaming table,
.page--rules table {
  margin:20px 0;
  max-height:100%;
  min-width:700px;
  overflow-x:scroll;
  display:block;
  font-size:16px;
  font-family:var(--font-family-primary);
  color:rgb(var(--tertiary-text-color));
  text-align:center
}
.page--cookies-policy table td,
.page--cookies-policy table th,
.page--faq table td,
.page--faq table th,
.page--privacy-policy table td,
.page--privacy-policy table th,
.page--responsible-gaming table td,
.page--responsible-gaming table th,
.page--rules table td,
.page--rules table th {
  padding:5px;
  vertical-align:top;
  line-height:120%;
  border:1px solid rgba(var(--tertiary-text-color),.4)
}
@media screen and (min-width:1280px) {
  .page--cookies-policy table,
  .page--faq table,
  .page--privacy-policy table,
  .page--responsible-gaming table,
  .page--rules table {
    min-width:100%;
    font-size:19px
  }
}
.page--rules h2 {
  padding:12px 36px 16px 32px
}
.page--rules h2:before {
  counter-increment:custom-counter;
  content:counter(custom-counter);
  line-height:20px;
  flex-shrink:0;
  width:20px;
  height:20px;
  position:absolute;
  left:0;
  background-color:rgb(var(--purple-900));
  text-align:center;
  font-weight:800;
  font-size:10px;
  color:rgb(var(--white-1000));
  box-shadow:0 0 8px rgba(129,65,237,.8);
  border-radius:50%
}
@media screen and (min-width:1280px) {
  .page--rules h2:before {
    top:13px
  }
}
.page--responsible-gaming section:first-child div {
  margin-bottom:20px
}
.page--responsible-gaming section:first-child h2 {
  display:none
}
.page--responsible-gaming section:first-child a,
.page--responsible-gaming section:first-child p,
.page--responsible-gaming section:first-child table {
  display:block
}
@media screen and (min-width:1280px) {
  .page--cookies-policy .cookie-banner-opener {
    cursor:pointer
  }
}
.page--cookies-policy td a {
  text-decoration:underline;
  color:rgb(var(--link-color-secondary))
}
.page .page-block {
  font-size:16px
}
.page .page-block a {
  color:rgb(var(--link-color-secondary))
}
@media screen and (min-width:375px) {
  .page .site-map {
    display:grid;
    grid-template-columns:auto
  }
}
@media screen and (min-width:768px) {
  .page .site-map {
    display:block;
    grid-template-columns:auto;
    grid-gap:0
  }
}
.page .site-map--container {
  margin-bottom:20px
}
.page .site-map--container:last-child {
  margin-bottom:0
}
@media screen and (min-width:375px) {
  .page .site-map--container {
    padding-left:0
  }
}
.page .site-map--title {
  font-family:var(--font-family-warn);
  font-size:19px;
  line-height:120%
}
.page .site-map--list {
  display:grid;
  grid-template-columns:repeat(2,1fr);
  grid-gap:16px;
  justify-content:space-between;
  margin-top:20px
}
@media screen and (min-width:540px) {
  .page .site-map--list {
    grid-template-columns:repeat(3,1fr)
  }
}
.page .site-map--link {
  text-decoration:underline;
  color:rgb(var(--link-color-secondary));
  line-height:120%;
  font-family:var(--font-family-primary)
}
.page .site-map--link:hover {
  text-decoration:underline;
  transition:var(--transitionTime) ease
}

</style>



<?php 

$quest = array();
$ans = array();

for ($t=0; $t<10; $t++) {
        $quest[] = "Πώς μπορώ ".$t." να εγγραφώ στην ιστοσελίδα της Spinaro;";
          $ans[] = "Για να εγγραφείτε, ".$t."  θα χρειαστεί να δώσετε τουλάχιστον
        τα ακόλουθα προσωπικά δεδομένα: όνομα, επώνυμο, ημερομηνία γέννησης, έγκυρη διεύθυνση
        ηλεκτρονικού ταχυδρομείου, διεύθυνση κατοικίας, χώρα, νόμισμα, αποδοχή των όρων και προϋποθέσεων
        και εθελοντική επιβεβαίωση της ηλικίας άνω των 18 ετών.";
}

?>


<div class="container--content" style="margin-left:400px; margin-right:400px;>
    <div class="page--faq page--wrap">
        <div class="page-template ng-star-inserted">
        <h1 style="font-size: 32px; font-weight: 800; ">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</h1>
        <div>



        <?php for ($t=0; $t<count($ans); $t++) { ?>


        <section class="_open">
          <div style="" onclick="faqClickedTitle(<?php echo $t;?>);" id="quest_<?php echo $t;?>">

                <div style="dispaly:flex; width:30px; position:relative; float:right; right:0px; top:0px; margin-right:20px;  border:0px solid red;">
                <img src="/mp100/wp-content/themes/maintheme/assets/images/customimages/chevron-down.svg" 
                      class="chevron"  id="chevron_<?php echo $t;?>" alt="">
                </div>   
                      
                <div class="quest" style="display:block; position:relative; left:0px; top:0px; margin:20px; border-bottom:1px solid grey; ">
                    <h2>
                    <?php echo $quest[$t];?></h2>
                </div>
          </div> 

          <div class="faqanswear"  id="ans_<?php echo $t;?>">
              <?php echo $ans[$t];?>
          </div>
        
      </section>

        <?php 
   }
   ?>

<br><br><br><br>
</div>
        </div>

    </div>
    <!---->
</div>



























