<!-- Html -->
<?php

   if (!wp_is_mobile()) get_template_part( 'template-parts/footer/footer', 'nav' ); 
   if (wp_is_mobile())  get_template_part( 'template-parts/footer/footer', 'navmobile' ); 


//    <noscript id="deferred-styles">
//     <link href="<?php //echo get_template_directory_uri().'/assets/css/footer.css'" rel='stylesheet'>
//    </noscript>
?>

</body>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8J4ZB5LDLT"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-8J4ZB5LDLT');
</script>

<?php
wp_footer();
?>

</linda-view-layer-two>
              </ui-view>
            </linda-view-layer-one>
          </ui-view>
        </linda-app>
      </ui-view>
    </ui-view>





