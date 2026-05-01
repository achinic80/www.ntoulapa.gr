
<style>
    .burger-menu._open {  transition:all .5s ease-in-out; transform:translateX(0%); top:0px;}
    .burger-menu { transform:translateX(-100%); top:0px;}
</style>


<stb-header-sidemenu _ngcontent-ckk-c170="" class="burger-menu ng-tns-c170-1 ng-star-inserted" _nghost-nek-c169="" 
style="border:0px solid red; position:fixed;  z-index:2100; height:100%; margin-left:-15px; ">
    <div _ngcontent-nek-c169="" stbuserlocation="" class="side-nav" >
        <div _ngcontent-nek-c169="" class="side-nav--content ng-star-inserted">
            <div _ngcontent-nek-c169="" class="side-nav--header"><a _ngcontent-nek-c169="" routerlink="/"
                    href="/gr/"><img _ngcontent-nek-c169="" alt="Polestarcasino" height="39" width="100"
                        class="side-nav--logo" src="/mp100/wp-content/themes/maintheme/assets/images/customimages/new-logo.svg"></a>
                <stb-icon-button _ngcontent-nek-c169="" classlist="_tertiary" iconheight="20" iconwidth="20"
                    palette="warn" size="x-small" src="close" _nghost-nek-c159="">
                    
                    <button onclick="toggleMobileMenu();"  _ngcontent-nek-c159=""
                        aria-label="button" type="button"
                        class="_tertiary _warn _x-small button icon-button ng-star-inserted" title="">
                        <svg-icon-sprite _ngcontent-nek-c159="" _nghost-nek-c132="" class="ng-star-inserted">
                            <!---->
                            <svg _ngcontent-nek-c132="" svgIconSpriteAttr="" class="ng-star-inserted" width="20" fillcolor="white" style="color:white;" 
                                height="20">
                                <!---->
                                <use _ngcontent-nek-c132="" xlink:href="/mp100/wp-content/themes/maintheme/assets/images/customimages/sprite.svg#close"></use>
                            </svg>
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                        </svg-icon-sprite>
                        <!---->
                    </button>
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                </stb-icon-button>
            </div>
            <div _ngcontent-nek-c169="" class="side-nav--info ng-star-inserted">
                <div _ngcontent-nek-c169=""
                    class="side-nav--info-text text-font-primary text-14 text-600 text-letter-m3 line-height-120">
                    Επιλέξτε το μπόνους καλωσορίσματός σας </div>
                <stb-template-button _ngcontent-nek-c169="" size="x-small" stbopenloginwithbankidcondition=""
                    class="side-nav--button" _nghost-nek-c139="">
                    <button _ngcontent-uia-c139="" class="_primary _x-small button" title="" type="button" onclick="clickFavoriteMaster();" style="cursor:pointer;" >
                        <span _ngcontent-uia-c139=""
                            class="button-content"> ΕΓΓΡΑΦΗ
                            <!---->
                        </span></button></stb-template-button><img _ngcontent-nek-c169="" alt="" height="123"
                    width="123" class="side-nav--info-img"
                    src="/mp100/wp-content/themes/maintheme/assets/images/customimages/burger-gift-v2.webp">
            </div>
            <!---->
            <!---->
            <nav _ngcontent-nek-c169="" class="side-nav--wrap">
                <ul _ngcontent-nek-c169="" cssclass="_open" stbtoggleclasson="click" applyon=".side-nav--item"
                    trigger=".side-nav--text" class="side-nav--list text-font-primary">
                    <!---->
<?php 
$icons = $GLOBALS['icons'];
$name       = wp_get_nav_menu_name( 'main-menu' );
$menumobile = wp_get_nav_menu_items( $name ); // all the "upper" menu items array
$t=-1;
 foreach ($menumobile as $key => $item) {
          $t++;
?>      
<li _ngcontent-nek-c169="" class="side-nav--item ng-star-inserted">
                        <p _ngcontent-nek-c169=""
                            class="side-nav--text text-white text-16 text-500 line-height-120 text-font-primary ng-star-inserted"
                            style="color:#fff; font-size:16px; margin-left:-20px;"  onclick="clickFavoriteMaster();" style="cursor:pointer;">
                            <span _ngcontent-nek-c169="" class="side-nav--link-icon">
                                <svg-icon-sprite _ngcontent-nek-c169="" height="16" width="16" _nghost-nek-c132=""><svg
                                        _ngcontent-nek-c132="" class="icon ng-star-inserted" width="16" height="16">
                                        <use _ngcontent-nek-c132="" 
                                        xlink:href="/mp100/wp-content/themes/maintheme/assets/images/customimages/<?php echo $icons[$t];?>"></use>
                                    </svg>
                                </svg-icon-sprite>
                            </span> <?= $item->title; ?> </p>
                    </li>
   
<?php } ?> 
                </ul>
            </nav>
        </div>
        <!---->
        <div _ngcontent-nek-c169="" langswitcher="" class="side-nav--footer">
          <button _ngcontent-nek-c169=""onclick="clickFavoriteMaster();" style="cursor:pointer;" 
                componentname="LanguageSelectDialogComponent" stbopenmodaldialog="" aria-label="language button"
                type="button" classlist="_tertiary" class="side-nav--btn">
                <div _ngcontent-nek-c169="" class="side-nav--btn-icon"><img _ngcontent-nek-c169="" alt="flag"
                        class="side-nav--icon-img" src="/mp100/wp-content/themes/maintheme/assets/images/customimages/gr.svg"></div><span
                    _ngcontent-nek-c169="" class="text-font-primary text-white text-16 text-500 line-height-120">
                    Ελληνικά </span>
            </button>
            <!---->
            <button _ngcontent-nek-c169="" stbopenzendeskchat="" type="button" aria-label="live chat"onclick="clickFavoriteMaster();" style="cursor:pointer;" 
                class="side-nav--btn">
                <svg-icon-sprite _ngcontent-nek-c169="" height="16" src="chat-fill" width="16"
                    class="side-nav--btn-icon text-white _live-chat" _nghost-nek-c132=""><svg _ngcontent-nek-c132=""
                        class="icon ng-star-inserted" width="16" height="16">
                        <!---->
                        <use _ngcontent-nek-c132="" xlink:href="/mp100/wp-content/themes/maintheme/assets/images/customimages/sprite.svg#chat-fill"></use>
                    </svg>
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                </svg-icon-sprite><span _ngcontent-nek-c169=""
                    class="text-font-primary text-white text-16 text-500">Live Chat</span>
            </button>
        </div>
    </div>
</stb-header-sidemenu>



<style>
  .side-nav[_ngcontent-nek-c169] {
  flex-direction:column;
  overflow-y:auto;
  overflow-x:hidden;
  width:320px;
  padding:0 24px;
  height:100%;
  background-color:rgb(var(--background-casino))
}
.side-nav[_ngcontent-nek-c169],
.side-nav--header[_ngcontent-nek-c169] {
  display:flex;
  justify-content:space-between;
  position:relative
}
.side-nav--header[_ngcontent-nek-c169] {
  align-items:center;
  margin:24px 0;
  min-height:40px
}
.side-nav--logo[_ngcontent-nek-c169] {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  margin:0 auto
}
.side-nav--info[_ngcontent-nek-c169] {
  width:100%;
  margin-bottom:24px;
  min-height:110px;
  border-radius:12px;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  padding:12px 0
}
.side-nav--info-img[_ngcontent-nek-c169] {
  position:absolute;
  top:90px;
  right:0
}
.side-nav--info-text[_ngcontent-nek-c169] {
  max-width:130px;
  line-height:120%
}
.side-nav--button[_ngcontent-nek-c169] {
  position:relative;
  z-index:1
}
.side-nav--wrap[_ngcontent-nek-c169] {
  padding-bottom:60px
}
.side-nav--item-arrow[_ngcontent-nek-c169] {
  margin-left:auto
}
.side-nav--drop[_ngcontent-nek-c169],
.side-nav--drop-item[_ngcontent-nek-c169]:empty {
  display:none
}
.side-nav--drop-link[_ngcontent-nek-c169] {
  display:grid;
  grid-template-columns:auto 1fr auto;
  align-items:center;
  grid-gap:8px;
  padding:12px 0 12px 12px;
  text-decoration:none;
  margin-left:12px
}
.side-nav--drop-link._active[_ngcontent-nek-c169] {
  color:rgb(var(--primary-color))
}
@media screen and (min-width:1280px) {
  .side-nav--drop-link[_ngcontent-nek-c169]:not(._active):hover {
    background:rgba(var(--purple-1000),.1);
    border-radius:12px
  }
}
.side-nav--item[_ngcontent-nek-c169] {
  position:relative;
  display:flex;
  flex-direction:column;
  align-items:flex-start
}
.side-nav--item._open[_ngcontent-nek-c169]   .side-nav--item-arrow[_ngcontent-nek-c169] {
  transform:rotate(180deg)
}
.side-nav--item._open[_ngcontent-nek-c169]   .side-nav--drop[_ngcontent-nek-c169] {
  display:grid;
  width:100%
}
.side-nav--item._separated[_ngcontent-nek-c169]:after {
  width:100%;
  background-position:50%;
  background-size:contain
}
.side-nav--item._hasLinks[_ngcontent-nek-c169]:nth-child(3):after,
.side-nav--item._separated[_ngcontent-nek-c169]:after {
  content:"";
  display:block;
  height:16px;
  background-image:url(/mp100/wp-content/themes/maintheme/assets/images/customimages/burger-separator.png)
}
.side-nav--item._hasLinks[_ngcontent-nek-c169]:nth-child(3):after {
  width:224px
}
.side-nav--link[_ngcontent-nek-c169],
.side-nav--text[_ngcontent-nek-c169] {
  display:grid;
  grid-template-columns:auto 1fr auto;
  align-items:center;
  grid-gap:8px;
  position:relative;
  width:100%;
  padding:12px;
  text-decoration:none;
  letter-spacing:.02em;
  cursor:pointer
}
._open[_ngcontent-nek-c169]   .side-nav--link[_ngcontent-nek-c169],
._open[_ngcontent-nek-c169]   .side-nav--text[_ngcontent-nek-c169],
.side-nav--link._active[_ngcontent-nek-c169],
.side-nav--text._active[_ngcontent-nek-c169] {
  background:rgba(var(--purple-1000),.2);
  border-radius:12px
}
._open[_ngcontent-nek-c169]   .side-nav--link[_ngcontent-nek-c169]   .side-nav--link-icon[_ngcontent-nek-c169],
._open[_ngcontent-nek-c169]   .side-nav--text[_ngcontent-nek-c169]   .side-nav--link-icon[_ngcontent-nek-c169],
.side-nav--link._active[_ngcontent-nek-c169]   .side-nav--link-icon[_ngcontent-nek-c169],
.side-nav--text._active[_ngcontent-nek-c169]   .side-nav--link-icon[_ngcontent-nek-c169] {
  color:rgb(var(--primary-color))
}
._open[_ngcontent-nek-c169]   .side-nav--link[_ngcontent-nek-c169]:before,
._open[_ngcontent-nek-c169]   .side-nav--text[_ngcontent-nek-c169]:before,
.side-nav--link._active[_ngcontent-nek-c169]:before,
.side-nav--text._active[_ngcontent-nek-c169]:before {
  content:"";
  display:block;
  width:40px;
  height:40px;
  background:rgb(var(--primary-color));
  opacity:.2;
  filter:blur(40px);
  position:absolute;
  left:0;
  top:0
}
.side-nav--link._holiday[_ngcontent-nek-c169],
.side-nav--text._holiday[_ngcontent-nek-c169] {
  text-transform:capitalize
}
.side-nav--link._holiday[_ngcontent-nek-c169]   .side-nav--link-icon[_ngcontent-nek-c169]   img[_ngcontent-nek-c169],
.side-nav--text._holiday[_ngcontent-nek-c169]   .side-nav--link-icon[_ngcontent-nek-c169]   img[_ngcontent-nek-c169] {
  height:20px
}
.side-nav--link._holiday[_ngcontent-nek-c169]   .side-nav--new-icon[_ngcontent-nek-c169],
.side-nav--text._holiday[_ngcontent-nek-c169]   .side-nav--new-icon[_ngcontent-nek-c169] {
  position:absolute;
  top:50%;
  right:15px;
  transform:translateY(-50%);
  height:18px
}
@media screen and (min-width:1280px) {
  .side-nav--link[_ngcontent-nek-c169]:not(._active):hover,
  .side-nav--text[_ngcontent-nek-c169]:not(._active):hover {
    background:rgba(var(--purple-1000),.1);
    border-radius:12px
  }
}
.side-nav--footer[_ngcontent-nek-c169] {
  display:grid;
  grid-template-columns:1fr 1fr;
  grid-column-gap:8px;
  grid-auto-flow:column;
  padding:22px 16px;
  margin:0 -24px;
  box-shadow:inset 0 1px 0 rgba(var(--white-1000),.15)
}
.side-nav--btn-icon[_ngcontent-nek-c169] {
  margin-right:8px
}
.side-nav--btn-icon._live-chat[_ngcontent-nek-c169] {
  margin-right:4px
}
.side-nav--btn[_ngcontent-nek-c169] {
  display:flex;
  justify-content:center;
  align-items:center;
  padding:12px;
  background:rgba(var(--purple-900),.2);
  border-radius:8px
}
.side-nav--btn[_ngcontent-nek-c169]:first-child   .side-nav--btn-icon[_ngcontent-nek-c169] {
  width:21px;
  height:21px
}
.side-nav--icon-img[_ngcontent-nek-c169] {
  object-fit:cover;
  height:100%;
  border-radius:4px
}
[_nghost-nek-c169]  .side-nav--link .link {
  color:rgb(var(--white-1000))
}

.icon-button.button[_ngcontent-nek-c159] {
  display:flex;
  justify-content:center;
  align-items:center;
  padding:0;
  margin:0;
  min-width:unset;
  min-height:unset;
  outline-style:unset;
  outline-width:unset
}
.icon-button.button._large[_ngcontent-nek-c159] {
  width:86px;
  height:84px
}
.icon-button.button._medium[_ngcontent-nek-c159] {
  width:66px;
  height:64px
}
.icon-button.button._small[_ngcontent-nek-c159] {
  width:52px;
  height:50px
}
.icon-button.button._x-small[_ngcontent-nek-c159] {
  width:40px;
  height:38px
}
.icon-button.button._tertiary[_ngcontent-nek-c159] {
  box-shadow:unset;
  background:rgba(var(--purple-900),.2)
}
.icon-button.button._tertiary[_ngcontent-nek-c159]:after {
  display:none
}
.icon-button.button._tertiary._large[_ngcontent-nek-c159] {
  border-radius:12px;
  width:64px;
  height:64px
}
.icon-button.button._tertiary._medium[_ngcontent-nek-c159] {
  border-radius:12px;
  width:52px;
  height:52px
}
.icon-button.button._tertiary._small[_ngcontent-nek-c159] {
  border-radius:8px;
  width:40px;
  height:40px
}
.icon-button.button._tertiary._x-small[_ngcontent-nek-c159] {
  border-radius:8px;
  width:32px;
  height:32px
}
@media screen and (min-width:1280px) {
  .icon-button.button._tertiary[_ngcontent-nek-c159]:hover:not(:active) {
    border:1px solid rgba(var(--purple-900),.2);
    box-shadow:inset 0 0 8px rgba(var(--purple-900),.1)
  }
}
.icon-button.button._tertiary[_ngcontent-nek-c159]:active {
  background:rgba(var(--purple-900),.1);
  box-shadow:inset 0 0 8px rgba(var(--purple-900),.1)
}
.icon-button.button._outline[_ngcontent-nek-c159] {
  box-shadow:unset;
  background:transparent;
  border:1px solid rgb(var(--white-1000));
  color:rgb(var(--white-1000));
  padding:unset;
  min-width:unset
}
.icon-button.button._outline[_ngcontent-nek-c159]:after {
  display:none
}
.icon-button.button._outline._border[_ngcontent-nek-c159] {
  border:2px solid rgb(var(--purple-650));
  background:rgba(var(--link-color-secondary),.2)
}
.icon-button.button._outline._border[_ngcontent-nek-c159]:active {
  box-shadow:inset 0 0 8px rgba(var(--purple-900),.5)
}
@media screen and (min-width:1280px) {
  .icon-button.button._outline._border[_ngcontent-nek-c159]:hover:not(:active) {
    box-shadow:inset 0 0 8px rgba(var(--purple-900),.5)
  }
}
.icon-button.button._outline._large[_ngcontent-nek-c159] {
  border-radius:16px;
  width:64px;
  height:64px
}
.icon-button.button._outline._medium[_ngcontent-nek-c159] {
  border-radius:16px;
  width:52px;
  height:52px
}
.icon-button.button._outline._small[_ngcontent-nek-c159] {
  border-radius:12px;
  width:38px;
  height:38px
}
.icon-button.button._outline._x-small[_ngcontent-nek-c159] {
  border-radius:10px;
  width:32px;
  height:32px
}
.icon-button.button._noborder[_ngcontent-nek-c159] {
  border:unset
}
.icon-button.button._noborder[_ngcontent-nek-c159]:before {
  content:"";
  position:absolute;
  left:0;
  top:0;
  width:100%;
  height:100%;
  border-radius:8px;
  box-shadow:inset 0 0 6px rgba(var(--purple-900),.1);
  background:rgb(var(--purple-900));
  transition:opacity .3s linear;
  opacity:0
}
.icon-button.button._noborder._large[_ngcontent-nek-c159]:before,
.icon-button.button._noborder._medium[_ngcontent-nek-c159]:before {
  border-radius:12px;
  box-shadow:inset 0 0 8px rgba(var(--purple-900),.1)
}
@media screen and (min-width:1280px) {
  .icon-button.button._noborder[_ngcontent-nek-c159]:hover:not(:active):before {
    opacity:.05
  }
}
.icon-button.button._noborder[_ngcontent-nek-c159]:active:before {
  opacity:.1
}
.icon-button.button._hasNotification[_ngcontent-nek-c159]:before {
  content:"";
  position:absolute;
  top:-4px;
  right:-2px;
  width:12px;
  height:12px;
  background-color:rgb(var(--red-1000));
  border-radius:100%;
  z-index:2
}
.icon-button.button._hasNotification._large[_ngcontent-nek-c159]:before {
  width:16px;
  height:16px
}
.icon-button.button._hasNotification._small[_ngcontent-nek-c159]:before,
.icon-button.button._hasNotification._x-small[_ngcontent-nek-c159]:before {
  top:-2px;
  width:8px;
  height:8px
}
.icon-button.button._wide[_ngcontent-nek-c159] {
  width:100%
}
.icon-button.button._selected[_ngcontent-nek-c159] {
  color:rgb(var(--primary-color));
  border:1px solid rgb(var(--primary-color))
}


</style>