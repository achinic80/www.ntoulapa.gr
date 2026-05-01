
<?php 
 if ( strpos(get_stylesheet_directory_uri(),"host.docker.internal")===false) {
     echo '<link rel="icon" sizes="16x16"  type="image/png"  href="'.get_stylesheet_directory_uri() . '/assets/images/extra_images/favicon.ico"> ';
 }
 else {
     echo '<link rel="icon" sizes="16x16" type="image/svg"  href="'.get_stylesheet_directory_uri() . '/assets/images/extra_images/favicon_for_staging.svg"> ';
}
?>
<title><?php echo get_site_metadata( 'title' ) ?></title>

</head>
<body <?php body_class(); ?>>
<style>
.overlaydiv {
  display:none;
  position:fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  border:0px solid red;
  background: #4B2297;
  opacity:0.6;
  z-index:2099;
}
.overlaydiv._open {
  display:block;
}
</style>
<div id="overlaydiv" class="overlaydiv" onclick="toggleMobileMenu();"></div>
<h1 style="display:none;">PoleStarCasino</h1>
<script>
function navClicked(id) {
        var el = document.getElementById("nav_"+id);
        icon = document.getElementById("icon_"+id);
		    var isActive = el.classList.contains("_open");
        if (isActive) {
            el.classList.remove("_open");
            icon.classList.remove("_open");
            return;
        }
        el.classList.add("_open");
        icon.classList.add("_open");        
	}

function faqClickedTitle(id) {
        var ans = document.getElementById("ans_"+id);
        var qst = document.getElementById("quest_"+id);
        var chevron = document.getElementById("chevron_"+id);
        
		var isActive = ans.classList.contains("_open");
        if (isActive) {
            ans.classList.remove("_open");
            qst.classList.remove("_open");
            chevron.classList.remove("_open");
            return;
        }
        ans.classList.add("_open");
        qst.classList.add("_open");
        chevron.classList.add("_open");
  
	}
function toggleDesktopMenu() {
        var sidenav =  document.getElementsByClassName("burger-menu")[0]; 
         var main =  document.getElementsByClassName("main")[0]; 
        const isActive = sidenav.classList.contains("_open");
        if (isActive) {
            sidenav.classList.remove("_open");
            main.classList.remove("_open");
            return;
        }
        sidenav.classList.add("_open");
        main.classList.add("_open");
    }


function clickFavoriteMaster() {
    var eltoclick = document.getElementById('FavoriteMaster');
    eltoclick.click();
    } 

function toggleMobileMenu() {
        var sidenav =  document.getElementsByClassName("burger-menu")[0]; 
        var overlay =  document.getElementsByClassName("overlaydiv")[0]; 
        const isActive = sidenav.classList.contains("_open");
        if (isActive) {
            sidenav.classList.remove("_open");
            overlay.classList.remove("_open");
            return;
        }
        sidenav.classList.add("_open");
        overlay.classList.add("_open");
      
    }

function randomIntFromInterval(min, max) { // min and max included 
  return Math.floor(Math.random() * (max - min + 1) + min)
}

function countup() {
        let el1 = document.getElementById("countup0");
        let el2 = document.getElementById("countup");
        countup0 = parseInt(el1.innerHTML);
        countup0 = countup0 + randomIntFromInterval(0,8);
        el1.innerHTML = countup0;
        el2.innerHTML = " €" + countup0.toLocaleString("de-DE") + "," + randomIntFromInterval(0,9) + randomIntFromInterval(0,9);
    }

setInterval(countup, 400);

</script> 



<script>
  document.head = document.head || document.getElementsByTagName('head')[0];

function changeFavicon(src) {
 var link = document.createElement('link'),
     oldLink = document.getElementById('dynamic-favicon');
 link.id = 'dynamic-favicon';
 link.rel = 'shortcut icon';
 link.href = src;
 if (oldLink) {
  document.head.removeChild(oldLink);
 }
 document.head.appendChild(link);
}


function changeFavicon2() {
  changeFavicon('<?php echo get_stylesheet_directory_uri();?>/assets/images/extra_images/favicon.ico');
}

document.addEventListener('DOMContentLoaded', changeFavicon2, false);

</script>