<?php
  $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
  //file_put_contents('UIDContainer.php',$Write);

    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM items where TagID = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();
  
  $msg = null;
  if (null==$data['Name']) {
  
  echo "Item does not exist...";
  } 
  ?>

<!DOCTYPE html>
<html>

<head>


  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
         $("#getUID").load("UIDContainer.php");
        setInterval(function() {
          $("#getUID").load("UIDContainer.php");  
        }, 500);
      });
    </script>

  <title>Smart Mart</title>

 

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>Smart mart</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html"> About</a>
            </li>
            <div class="dropdown">
              <form method="post" action="Search.php"> <li onclick="myFunction()" class="dropbtn" class="nav-link">SEARCH</li> 
              <div id="myDropdown" class="dropdown-content" >
                <input type="text" placeholder="Search.." id="myInput" name="myInput" onkeyup="filterFunction()"> 
             </form>
              </div>
            </div>
            
            <script>
            /* When the user clicks on the button,
            toggle between hiding and showing the dropdown content */
            function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
            }
            
            function filterFunction() {
              var input, filter, ul, li, a, i;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              div = document.getElementById("myDropdown");
              a = div.getElementsByTagName("a");
              for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
                } else {
                  a[i].style.display = "none";
                }
              }
            }
            </script>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <style>
      /* .parent {
        position: relative;
        top: 0;
        left: 0;
      }
      .image1 {
        position: relative;
        top: 0;
        left: 0;
        border: 1px solid #000000;
      } */
      .emptyimage {
        
        
        padding-top: 50px;
        padding-right: 350px;
        padding-bottom: 50px;
        padding-left: 350px;
        
      }

      .dropbtn {
  
  color: black;
  padding: 5px; 
  font-size: 16px;
  border: none;
  cursor: pointer;
}



#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
 padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.styleB{
  border: none;
  text-transform: uppercase;
  display: inline-block;
  padding: 10px 45px;
  background-color: #6ed6a6;
  color: #ffffff;
  border-radius: 0px;
  border: 1px solid #6ed6a6;
  -webkit-transition: all .3s;
  transition: all .3s;
  margin-left: 100px;
}
/*.dropdown a:hover {background-color: #ddd;}*/

.show {display: block;}

    </style>
  </header>
  <!-- end header section -->
  <!-- slider section -->
  <section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container ">
            <div class="row">
              <div class="col-md-6 col-lg-5">
                <div class="detail-box">
                  <h1>
                   WELCOME  <br>
                    
                  </h1>
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-7">
                <div class="img-box">
                  <img src="images/slider-img.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->

  <!-- offer section -->

    <section class="offer_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 px-0">
          <div class="box offer-box1">
            <p>
              <svg class="animated" id="freepik_stories-discount" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><style>svg#freepik_stories-discount:not(.animated) .animable {opacity: 0;}svg#freepik_stories-discount.animated #freepik--background-complete--inject-5 {animation: 1.5s Infinite  linear floating;animation-delay: 0s;}            @keyframes floating {                0% {                    opacity: 1;                    transform: translateY(0px);                }                50% {                    transform: translateY(-10px);                }                100% {                    opacity: 1;                    transform: translateY(0px);                }            }        .animator-hidden { display: none; }</style><g id="freepik--background-complete--inject-5" class="animable" style="transform-origin: 374.244px 249.143px;"><path d="M578.56,118.66l1,3.53-3.18,22.48-5.93,1.65,3.14-21.48L565.75,127l1.07,3.84L562,132.2l-2.31-8.29Z" style="fill: rgb(224, 224, 224); transform-origin: 569.625px 132.49px;" id="el40zk9mwppz4" class="animable"></path><path d="M602.72,129.35c1.16,4.18-.89,8.67-7.62,10.54a16.91,16.91,0,0,1-9.7,0l1-4.78a11.83,11.83,0,0,0,7.3.26c2.72-.76,4.09-2.37,3.56-4.29s-2.07-2.73-6.35-1.54l-6,1.68-2.48-13.61,14.38-4L598,118l-9.84,2.73.88,4.59,1.92-.54C597.93,122.81,601.56,125.18,602.72,129.35Z" style="fill: rgb(224, 224, 224); transform-origin: 592.728px 127.105px;" id="elc5xox94avx4" class="animable"></path><path d="M602.28,118.77c-1.06-3.84.38-7,3.55-7.88s6,1,7.1,4.92-.41,7-3.55,7.88S603.35,122.61,602.28,118.77Zm9-2.49c-.85-3.06-2.8-4.48-5-3.87s-3.13,2.86-2.28,5.9,2.77,4.49,5,3.87S612.09,119.35,611.24,116.28Zm8.91-9.19,2-.55-9.54,28.05-2,.55Zm-.33,18.78c-1.06-3.84.41-7,3.54-7.88s6,1.08,7.11,4.92-.38,7-3.55,7.88S620.89,129.71,619.82,125.87Zm9-2.49c-.84-3-2.77-4.49-5-3.87s-3.14,2.83-2.28,5.89,2.8,4.48,5,3.87S629.62,126.41,628.78,123.38Z" style="fill: rgb(224, 224, 224); transform-origin: 616.405px 120.84px;" id="ello6qs8xkq3g" class="animable"></path><g id="elw0fz72zx49s"><rect x="630.26" y="358.36" width="70.41" height="88.88" style="fill: rgb(235, 235, 235); transform-origin: 665.465px 402.8px; transform: rotate(-179.55deg);" class="animable" id="eldhrssmv5vtd"></rect></g><polygon points="673.48 361.23 672.23 447.28 661.11 447.2 663.49 361.15 673.48 361.23" style="fill: rgb(250, 250, 250); transform-origin: 667.295px 404.215px;" id="el7tyg7e95cpv" class="animable"></polygon><polygon points="590.19 360.58 630.58 360.9 700.99 361.45 630.51 370.72 629.91 446.95 589.53 446.64 590.19 360.58" style="fill: rgb(224, 224, 224); transform-origin: 645.26px 403.765px;" id="elgauixyundn" class="animable"></polygon><polygon points="612.18 360.75 610.57 446.8 598.59 446.71 600.55 360.66 612.18 360.75" style="fill: rgb(250, 250, 250); transform-origin: 605.385px 403.73px;" id="el9avoiba408n" class="animable"></polygon><path d="M644.15,334.56c0,.18-1.19.4-3.36.61a87.78,87.78,0,0,1-9.23.41,51.69,51.69,0,0,1-13.78-1.81,9.88,9.88,0,0,1-2-.9,5.41,5.41,0,0,1-1.84-1.74,4.86,4.86,0,0,1-.74-2.57,9.64,9.64,0,0,1,.3-2.36,52.35,52.35,0,0,1,2.61-8.46,21.57,21.57,0,0,1,2.28-4.06,12.72,12.72,0,0,1,3.35-3.31,6.82,6.82,0,0,1,2.32-1,6,6,0,0,1,2.56,0,10.14,10.14,0,0,1,3.89,2.12A40.4,40.4,0,0,1,639.67,322a33.69,33.69,0,0,1,3.71,8.57c.55,2.14.61,3.36.46,3.4-.44.13-1.43-4.68-5.72-11a42.45,42.45,0,0,0-9.11-9.57,8.15,8.15,0,0,0-3-1.59,3.8,3.8,0,0,0-2.95.64,10.47,10.47,0,0,0-2.62,2.68,20,20,0,0,0-2,3.58,55,55,0,0,0-2.51,8,4,4,0,0,0,.07,3,4.79,4.79,0,0,0,2.53,1.7,32.72,32.72,0,0,0,3.47.92c1.15.26,2.29.46,3.4.63,2.21.35,4.29.55,6.21.68,3.83.26,7,.31,9.13.42S644.14,334.38,644.15,334.56Z" style="fill: rgb(224, 224, 224); transform-origin: 628.675px 322.407px;" id="elkimolntkptb" class="animable"></path><path d="M642.69,335.21c0-.18,1.28-.56,3.65-1.1s5.83-1.25,10-2.26a95.38,95.38,0,0,0,14.38-4.54,16.09,16.09,0,0,0,3.61-1.92,4,4,0,0,0,1.16-1.28,2.23,2.23,0,0,0,.2-1.46,8.07,8.07,0,0,0-.69-1.9c-.33-.71-.67-1.43-1-2.15a34.71,34.71,0,0,0-2.3-4.14,17.92,17.92,0,0,0-3-3.49,11.45,11.45,0,0,0-3.58-2.31,5.72,5.72,0,0,0-3.71-.16,9.68,9.68,0,0,0-3.33,2,50.48,50.48,0,0,0-9.63,11.35,43.77,43.77,0,0,0-4.28,9.14c-.75,2.29-1.05,3.6-1.25,3.57s-.19-1.39.27-3.82a35.07,35.07,0,0,1,3.66-9.82,48.13,48.13,0,0,1,9.65-12.22,11.69,11.69,0,0,1,4.15-2.59,8.18,8.18,0,0,1,5.33.13,11.27,11.27,0,0,1,2.38,1.19,18.65,18.65,0,0,1,2.07,1.59,19.85,19.85,0,0,1,3.39,4,37.86,37.86,0,0,1,2.47,4.45l1,2.21a9.86,9.86,0,0,1,.86,2.56,4.69,4.69,0,0,1-.49,3.06,6.42,6.42,0,0,1-1.88,2.07,18,18,0,0,1-4.2,2.16,82.56,82.56,0,0,1-14.91,4.12c-4.31.8-7.82,1.21-10.24,1.46S642.72,335.38,642.69,335.21Z" style="fill: rgb(250, 250, 250); transform-origin: 660.457px 320.523px;" id="elmf66bptrc3p" class="animable"></path><g id="el2mksgvfjfrc"><rect x="577.49" y="331.47" width="103.5" height="29.42" style="fill: rgb(224, 224, 224); transform-origin: 629.24px 346.18px; transform: rotate(-179.55deg);" class="animable" id="elxir7jyvepeb"></rect></g><g id="eltdtix2fvl0r"><rect x="615.54" y="331.73" width="93.55" height="29.42" style="fill: rgb(235, 235, 235); transform-origin: 662.315px 346.44px; transform: rotate(-179.55deg);" class="animable" id="el1pw40miwvah"></rect></g><polygon points="680.5 331.87 679.85 361.42 668.94 361.19 669.7 331.78 680.5 331.87" style="fill: rgb(250, 250, 250); transform-origin: 674.72px 346.6px;" id="elsvg2eebamvn" class="animable"></polygon><polygon points="602.99 331.41 601.93 360.7 589.94 360.6 590.58 331.17 602.99 331.41" style="fill: rgb(250, 250, 250); transform-origin: 596.465px 345.935px;" id="elkutwf1vyjes" class="animable"></polygon><g id="elzo239tm01wf"><rect x="683.77" y="407.52" width="32.16" height="40.6" style="fill: rgb(235, 235, 235); transform-origin: 699.85px 427.82px; transform: rotate(-179.55deg);" class="animable" id="elbg1qucb2j9q"></rect></g><polygon points="703.52 408.84 702.95 448.14 697.86 448.11 698.95 408.8 703.52 408.84" style="fill: rgb(250, 250, 250); transform-origin: 700.69px 428.47px;" id="el1qw5t8t0scw" class="animable"></polygon><polygon points="665.47 408.54 683.92 408.68 716.08 408.94 683.89 413.17 683.61 447.99 665.17 447.85 665.47 408.54" style="fill: rgb(224, 224, 224); transform-origin: 690.625px 428.265px;" id="ellk9fysgocj" class="animable"></polygon><polygon points="675.51 408.62 674.78 447.93 669.3 447.88 670.2 408.58 675.51 408.62" style="fill: rgb(250, 250, 250); transform-origin: 672.405px 428.255px;" id="elmwk97mwxq4e" class="animable"></polygon><path d="M690.12,396.66c0,.33-2.15.83-5.77,1a22.44,22.44,0,0,1-6.49-.71,3.79,3.79,0,0,1-2.12-1.46,2.88,2.88,0,0,1-.45-1.53,5.67,5.67,0,0,1,.14-1.25,23.87,23.87,0,0,1,1.22-4,10.48,10.48,0,0,1,1.12-2A6.34,6.34,0,0,1,679.5,385a3.54,3.54,0,0,1,2.75-.49,5.24,5.24,0,0,1,2,1.12,18.07,18.07,0,0,1,4.21,5c1.81,3.31,1.79,5.7,1.48,5.74s-1-2-3-4.74a19.92,19.92,0,0,0-4.14-4.12,2.94,2.94,0,0,0-1.11-.59,1.06,1.06,0,0,0-.82.22,4.23,4.23,0,0,0-1,1.05,8.39,8.39,0,0,0-.83,1.51,24.19,24.19,0,0,0-1.12,3.53c-.15.56-.12.81-.07.87a1.53,1.53,0,0,0,.79.51,20.89,20.89,0,0,0,3,.75c1,.18,1.92.3,2.78.39C687.88,396.11,690.11,396.27,690.12,396.66Z" style="fill: rgb(224, 224, 224); transform-origin: 682.705px 391.046px;" id="elkghupha32kk" class="animable"></path><path d="M689.45,397c-.06-.38,2.35-1,6.14-2a49.57,49.57,0,0,0,6.43-2.19,7.07,7.07,0,0,0,1.49-.81,1.2,1.2,0,0,0,.33-.37c0-.08,0-.08,0-.23a11.1,11.1,0,0,0-.72-1.66,17.34,17.34,0,0,0-1-1.81,8,8,0,0,0-1.23-1.46,4.74,4.74,0,0,0-1.4-.92,1.91,1.91,0,0,0-1.26-.08,3.68,3.68,0,0,0-1.29.76,24.06,24.06,0,0,0-4.4,4.95c-2.11,3.18-2.55,5.62-3,5.56-.16,0-.27-.67-.14-1.82a14.31,14.31,0,0,1,1.51-4.66,21.28,21.28,0,0,1,4.41-5.83,5.84,5.84,0,0,1,2.12-1.33,4.34,4.34,0,0,1,2.87.05,5.3,5.3,0,0,1,1.24.61,8.71,8.71,0,0,1,1,.78,10,10,0,0,1,1.67,2,17.84,17.84,0,0,1,1.17,2.11c.16.35.31.69.47,1a5.34,5.34,0,0,1,.44,1.35,2.9,2.9,0,0,1-.3,1.83,3.66,3.66,0,0,1-1.06,1.16,8.29,8.29,0,0,1-2.08,1,35.11,35.11,0,0,1-6.95,1.77C692,397.31,689.51,397.28,689.45,397Z" style="fill: rgb(250, 250, 250); transform-origin: 697.841px 390.038px;" id="eloc4ekrk5o6" class="animable"></path><g id="elcrb6o1hfcgd"><rect x="659.67" y="395.24" width="47.27" height="13.44" style="fill: rgb(224, 224, 224); transform-origin: 683.305px 401.96px; transform: rotate(-179.55deg);" class="animable" id="eltbj209njjk"></rect></g><g id="ela1sysqgdre6"><rect x="677.05" y="395.36" width="42.73" height="13.44" style="fill: rgb(235, 235, 235); transform-origin: 698.415px 402.08px; transform: rotate(-179.55deg);" class="animable" id="elf52rjcpxxst"></rect></g><polygon points="706.72 395.43 706.42 408.92 701.44 408.82 701.79 395.39 706.72 395.43" style="fill: rgb(250, 250, 250); transform-origin: 704.08px 402.155px;" id="elhhtbozlthmu" class="animable"></polygon><polygon points="671.31 395.21 670.83 408.59 665.35 408.55 665.65 395.1 671.31 395.21" style="fill: rgb(250, 250, 250); transform-origin: 668.33px 401.845px;" id="elezfwkx5afh8" class="animable"></polygon><g id="el534qbt76lsm"><rect x="71.98" y="375.25" width="57.68" height="72.81" style="fill: rgb(235, 235, 235); transform-origin: 100.82px 411.655px; transform: rotate(-179.55deg);" class="animable" id="elqeefmme7qb"></rect></g><polygon points="107.39 377.6 106.37 448.1 97.25 448.03 99.21 377.54 107.39 377.6" style="fill: rgb(250, 250, 250); transform-origin: 102.32px 412.82px;" id="elie1avka0xc" class="animable"></polygon><polygon points="39.16 377.07 72.25 377.33 129.93 377.78 72.19 385.38 71.7 447.83 38.62 447.57 39.16 377.07" style="fill: rgb(224, 224, 224); transform-origin: 84.275px 412.45px;" id="el2sfcjcrtxn" class="animable"></polygon><polygon points="57.17 377.21 55.86 447.7 46.04 447.63 47.64 377.14 57.17 377.21" style="fill: rgb(250, 250, 250); transform-origin: 51.605px 412.42px;" id="el6mm7xx2hkst" class="animable"></polygon><path d="M83.36,355.76c0,.36-1,.73-2.73,1.09a49.27,49.27,0,0,1-13,.7c-1-.09-2-.2-3-.38a25.79,25.79,0,0,1-3.3-.72,9.4,9.4,0,0,1-1.95-.85,5.92,5.92,0,0,1-2-1.87,5.53,5.53,0,0,1-.85-2.87,9.36,9.36,0,0,1,.27-2.3,42.64,42.64,0,0,1,2.19-7.2,19.46,19.46,0,0,1,2-3.6,17.28,17.28,0,0,1,1.37-1.62,9.15,9.15,0,0,1,1.81-1.47,7.21,7.21,0,0,1,2.41-1,6.27,6.27,0,0,1,2.73.06,9.55,9.55,0,0,1,3.73,2.06,32.31,32.31,0,0,1,7.56,9.09,23.84,23.84,0,0,1,2.69,7.42c.29,1.84.14,2.9-.19,3-.77.19-2-3.59-5.6-8.4a36.52,36.52,0,0,0-7.42-7.3,5.05,5.05,0,0,0-1.89-1,1.66,1.66,0,0,0-1.28.36,5.46,5.46,0,0,0-.85.74c-.28.31-.59.7-.87,1.08a15.23,15.23,0,0,0-1.46,2.65,46.17,46.17,0,0,0-2,6.29,4.47,4.47,0,0,0-.19,1.06c0,.23,0,.25,0,.3a2.52,2.52,0,0,0,1.29.82,26.19,26.19,0,0,0,2.65.78c.91.23,1.81.41,2.68.58,1.75.32,3.42.55,5,.73,3.08.35,5.64.56,7.41.83S83.35,355.4,83.36,355.76Z" style="fill: rgb(224, 224, 224); transform-origin: 69.9871px 345.625px;" id="ele03ax40szfa" class="animable"></path><path d="M82.17,356.28c-.13-.74,4.19-1.94,11-3.81a87.79,87.79,0,0,0,11.47-4,11.52,11.52,0,0,0,2.6-1.43,1.71,1.71,0,0,0,.53-.58c0-.09,0,0,0-.25a5.94,5.94,0,0,0-.46-1.16l-.83-1.73a29.71,29.71,0,0,0-1.79-3.21,13.47,13.47,0,0,0-2.16-2.57,10.25,10.25,0,0,0-1.24-1,5.44,5.44,0,0,0-1.18-.63,3.19,3.19,0,0,0-2.09-.15,6.36,6.36,0,0,0-2.23,1.32,43.53,43.53,0,0,0-7.89,8.77c-3.81,5.64-4.67,10-5.46,9.88-.34,0-.58-1.21-.36-3.29a25.49,25.49,0,0,1,2.64-8.43,38,38,0,0,1,7.9-10.54,10.92,10.92,0,0,1,3.89-2.45,8.17,8.17,0,0,1,5.33.09,10.43,10.43,0,0,1,2.27,1.12,15.27,15.27,0,0,1,1.88,1.43,17.65,17.65,0,0,1,3,3.55,32.7,32.7,0,0,1,2.12,3.83l.84,1.84a9.68,9.68,0,0,1,.81,2.49,5.35,5.35,0,0,1-.58,3.45,6.66,6.66,0,0,1-2,2.17,15.7,15.7,0,0,1-3.8,1.91,61.35,61.35,0,0,1-12.51,3.12,64.18,64.18,0,0,1-8.53.73C83.37,356.81,82.22,356.64,82.17,356.28Z" style="fill: rgb(250, 250, 250); transform-origin: 97.4146px 343.689px;" id="elwn5q3b2smzm" class="animable"></path><g id="el8hcjvp41je6"><rect x="28.75" y="353.22" width="84.78" height="24.1" style="fill: rgb(224, 224, 224); transform-origin: 71.14px 365.27px; transform: rotate(-179.55deg);" class="animable" id="eluf9w00rltn"></rect></g><g id="elbmjdp0e2vav"><rect x="59.93" y="353.43" width="76.64" height="24.1" style="fill: rgb(235, 235, 235); transform-origin: 98.25px 365.48px; transform: rotate(-179.55deg);" class="animable" id="elwmvzvlfcwhl"></rect></g><polygon points="113.14 353.55 112.61 377.76 103.67 377.57 104.29 353.48 113.14 353.55" style="fill: rgb(250, 250, 250); transform-origin: 108.405px 365.62px;" id="elgeewug7ork5" class="animable"></polygon><polygon points="49.64 353.17 48.78 377.17 38.95 377.09 39.48 352.98 49.64 353.17" style="fill: rgb(250, 250, 250); transform-origin: 44.295px 365.075px;" id="elae4kcxk951b" class="animable"></polygon><path d="M137.8,76.68l1,3.81-15.25,3.92-.78-3,5.9-9.35c1.35-2.16,1.4-3.28,1.15-4.26-.41-1.59-1.74-2.23-3.87-1.68a5.07,5.07,0,0,0-3.66,3.09l-4-1.32c1-2.68,3.42-4.87,7-5.81,4.5-1.15,8.09.39,9,4,.51,2,.42,3.89-1.74,7.24l-3.51,5.57Z" style="fill: rgb(224, 224, 224); transform-origin: 128.545px 73.0575px;" id="elbntuka6n1u7" class="animable"></path><path d="M138.06,69.92c-1.71-6.67,1-11.39,6-12.66s9.62,1.55,11.33,8.21-1,11.38-6,12.66S139.77,76.58,138.06,69.92Zm12.6-3.24c-1.18-4.59-3.28-6.07-5.62-5.47s-3.43,2.91-2.25,7.49,3.28,6.07,5.59,5.48S151.84,71.26,150.66,66.68Z" style="fill: rgb(224, 224, 224); transform-origin: 146.725px 67.6967px;" id="eluaipsxgggge" class="animable"></path><path d="M156.51,60.11c-.85-3.29.44-6,3.15-6.65s5.11,1,6,4.31-.47,6-3.15,6.65S157.35,63.39,156.51,60.11Zm7.67-2c-.68-2.63-2.32-3.87-4.19-3.38s-2.71,2.38-2,5,2.28,3.87,4.19,3.38S164.85,60.76,164.18,58.14Zm7.74-7.68,1.7-.43L165,73.75l-1.7.44Zm-.6,16c-.84-3.29.47-6,3.15-6.65s5.12,1,6,4.31-.44,6-3.15,6.64S172.17,69.73,171.32,66.45Zm7.67-2c-.67-2.6-2.28-3.87-4.19-3.38s-2.71,2.35-2,5,2.32,3.86,4.19,3.38S179.66,67.07,179,64.48Z" style="fill: rgb(224, 224, 224); transform-origin: 168.496px 62.095px;" id="elrth2xmepz2" class="animable"></path><path d="M327.23,139.91c.08,4.13-3,8-10,8.08a16.76,16.76,0,0,1-9.37-2.46l2.12-4.37a12,12,0,0,0,7,2.08c2.83-.05,4.56-1.23,4.53-3.23,0-1.85-1.42-3-4.63-2.92l-2.59,0-.06-3.74,4.93-5.78-10.42.18-.07-4.55,17.12-.29.07,3.67L320.47,133C324.89,133.63,327.17,136.31,327.23,139.91Z" style="fill: rgb(224, 224, 224); transform-origin: 317.546px 135.456px;" id="elare3qgskmft" class="animable"></path><path d="M329.77,135.12C329.63,127,334,122.39,340,122.28s10.56,4.4,10.7,12.47-4.22,12.74-10.26,12.84S329.91,143.19,329.77,135.12Zm15.28-.27c-.1-5.55-2.1-7.83-4.93-7.78s-4.71,2.39-4.61,8,2.09,7.83,4.88,7.78S345.14,140.41,345.05,134.85Z" style="fill: rgb(224, 224, 224); transform-origin: 340.235px 134.935px;" id="eluhxbj6cclsg" class="animable"></path><path d="M353.51,128.94c-.07-4,2.12-6.68,5.41-6.74s5.57,2.53,5.64,6.55-2.16,6.68-5.41,6.73S353.58,132.92,353.51,128.94Zm9.3-.16c-.06-3.18-1.59-5-3.86-5s-3.75,2-3.69,5.14,1.55,5,3.86,5S362.86,132,362.81,128.78Zm10.93-6.66,2.06,0-16.28,24.75-2.06,0Zm-5,18.09c-.06-4,2.16-6.68,5.41-6.73s5.57,2.56,5.64,6.54-2.12,6.68-5.41,6.74S368.77,144.2,368.7,140.21Zm9.3-.16c-.05-3.14-1.55-5-3.86-5s-3.74,1.95-3.69,5.13,1.59,5,3.86,5S378.06,143.2,378,140.05Z" style="fill: rgb(224, 224, 224); transform-origin: 366.65px 134.495px;" id="elr7srv88rzwg" class="animable"></path><path d="M445.58,64.33c-.48,3.12-3.19,5.49-8.23,4.72a12.33,12.33,0,0,1-6.44-2.91L433,63.26a8.58,8.58,0,0,0,4.77,2.35c2.05.31,3.44-.35,3.66-1.79s-.56-2.43-3.76-2.92l-4.51-.69,2.42-9.79,10.76,1.64-.5,3.28-7.36-1.12-.79,3.3,1.44.22C444.35,58.54,446.06,61.2,445.58,64.33Z" style="fill: rgb(245, 245, 245); transform-origin: 438.625px 59.8082px;" id="el4co0t72jhdg" class="animable"></path><path d="M447.74,61.31c.89-5.83,4.62-8.64,9-8s7.06,4.45,6.17,10.28-4.6,8.63-9,8S446.86,67.13,447.74,61.31Zm11,1.68c.61-4-.55-5.89-2.59-6.2s-3.68,1.14-4.29,5.15.54,5.88,2.56,6.19S458.15,67,458.76,63Z" style="fill: rgb(245, 245, 245); transform-origin: 455.326px 62.4489px;" id="elryg7rzcv2vc" class="animable"></path><path d="M465.57,59.77c.44-2.87,2.35-4.54,4.72-4.18s3.69,2.5,3.25,5.4-2.37,4.54-4.72,4.18S465.13,62.65,465.57,59.77ZM481,57.35l1.49.23L467.7,73.38l-1.49-.23Zm-8.67,3.45c.35-2.3-.53-3.82-2.17-4.07s-2.93,1-3.28,3.24.5,3.81,2.17,4.07S471.93,63.09,472.28,60.8Zm2.83,8.94c.44-2.87,2.37-4.54,4.72-4.18s3.69,2.53,3.25,5.4-2.35,4.54-4.72,4.18S474.67,72.62,475.11,69.74Zm6.71,1c.34-2.27-.5-3.82-2.17-4.07s-2.93.94-3.28,3.23.53,3.83,2.17,4.08S481.47,73,481.82,70.77Z" style="fill: rgb(245, 245, 245); transform-origin: 474.35px 65.365px;" id="el3ra9i2nvz3f" class="animable"></path><path d="M44.24,149.19l-3.66,15.63L37,164l3-12.73-3.13-.73.68-2.91Z" style="fill: rgb(245, 245, 245); transform-origin: 40.555px 156.225px;" id="elg6pvpp4tl2" class="animable"></path><path d="M45.14,157.65c1.2-5.16,4.75-7.42,8.59-6.52s6,4.5,4.8,9.65-4.72,7.42-8.59,6.52S43.93,162.81,45.14,157.65Zm9.76,2.28c.83-3.55-.08-5.32-1.89-5.74s-3.38.76-4.21,4.31.07,5.32,1.86,5.74S54.06,163.48,54.9,159.93Z" style="fill: rgb(245, 245, 245); transform-origin: 51.8318px 159.215px;" id="elx5ecq5fnn6j" class="animable"></path><path d="M75.19,156.44l1.32.31L62.17,169.88l-1.31-.31Zm-14,1.09c.6-2.55,2.43-3.91,4.53-3.42s3.13,2.5,2.53,5.07-2.44,3.9-4.52,3.42S60.63,160.07,61.22,157.53Zm5.94,1.39c.48-2-.2-3.46-1.65-3.8s-2.7.66-3.17,2.67.18,3.46,1.66,3.8S66.69,161,67.16,158.92Zm1.92,8.22c.59-2.55,2.44-3.9,4.52-3.42s3.13,2.53,2.54,5.07-2.43,3.91-4.53,3.42S68.48,169.68,69.08,167.14ZM75,168.53c.47-2-.18-3.46-1.65-3.8s-2.7.64-3.17,2.67.2,3.46,1.65,3.8S74.55,170.54,75,168.53Z" style="fill: rgb(245, 245, 245); transform-origin: 68.685px 163.16px;" id="elr13ma04k1q8" class="animable"></path></g><g id="freepik--Plant--inject-5" class="animable" style="transform-origin: 137.715px 309.165px;"><path d="M138.9,310.87c-17.41-17.81-44.68-25.3-68.74-18.86a125.25,125.25,0,0,0,69.55,21.73" style="fill: #FFB400; transform-origin: 104.935px 301.735px;" id="elskkxvrt4jg" class="animable"></path><path d="M115.58,228.31c2.87-20.26-5-43-20.17-57.77-.5,20.08,8,42.67,20.17,57.77" style="fill: #FFB400; transform-origin: 105.776px 199.425px;" id="elfanqlfyfyln" class="animable"></path><path d="M127.71,266.57A108.16,108.16,0,0,0,78,219.1c6.33,23.32,26.28,42.4,49.86,47.69" style="fill: #FFB400; transform-origin: 102.93px 242.945px;" id="el6hn4tvaqf93" class="animable"></path><path d="M130.22,274c-12.23.34-24.62-.09-36.45-3.22s-23.16-9.15-31-18.52A121.84,121.84,0,0,1,130,272.77" style="fill: #FFB400; transform-origin: 96.495px 263.179px;" id="el7ympo78fspf" class="animable"></path><path d="M124,249.64c6.21-23.28,16.46-39.38,34.75-52.42A48.4,48.4,0,0,1,124,249.64" style="fill: #FFB400; transform-origin: 141.554px 223.43px;" id="el2rlplh82qgn" class="animable"></path><path d="M170.19,289.78a34.44,34.44,0,0,0-20.93-31.91c1,12,10.46,25.92,20.93,31.91" style="fill: #FFB400; transform-origin: 159.725px 273.825px;" id="el0kdi0pfa67r" class="animable"></path><path d="M176,270.15c1.39-19.44,15.2-37.43,33.63-43.79C205.44,245.81,194.2,262,176,270.15" style="fill: #FFB400; transform-origin: 192.815px 248.255px;" id="el7i2bdyvhi3q" class="animable"></path><path d="M167.23,305c4.31-6.17,11.35-10,18.64-11.92s14.9-2.07,22.43-2.23a52.43,52.43,0,0,1-40.5,16.87" style="fill: #FFB400; transform-origin: 187.765px 299.303px;" id="el9fsg64qmfws" class="animable"></path><path d="M158.48,354.59a57.46,57.46,0,0,1,70.15,33.23C203.15,383,178,371.67,158.48,354.59" style="fill: #FFB400; transform-origin: 193.555px 369.929px;" id="elikz41sb7zg" class="animable"></path><path d="M130.52,337.35c4.23,12.51,3.42,27.64-6,38.42a45.88,45.88,0,0,1,6-38.42" style="fill: #FFB400; transform-origin: 127.832px 356.56px;" id="elta4g9djybfn" class="animable"></path><path d="M114,330.4a47.1,47.1,0,0,1-26,38.2,2.92,2.92,0,0,1-2.3.37c-1.15-.46-1.25-2-1.11-3.26,1.84-16,13.72-31.53,29.41-35.31" style="fill: #FFB400; transform-origin: 99.2705px 349.731px;" id="elvimdndi477" class="animable"></path><path d="M103.19,328.77a38.61,38.61,0,0,1-56.39.29c17.92-2,38.61-3.27,56.39-.29" style="fill: #FFB400; transform-origin: 74.995px 334.076px;" id="elt80zdm0ux7d" class="animable"></path><path d="M100.51,185.47a3.27,3.27,0,0,0,.16.53c.14.37.32.87.55,1.51.51,1.36,1.23,3.31,2.16,5.81s2.08,5.6,3.37,9.2l2.07,5.75c.71,2,1.46,4.22,2.24,6.49,3.18,9.08,6.7,20,10.51,32.1s7.67,25.57,11.53,39.72,7.19,27.74,10.06,40.13,5.2,23.6,6.93,33.06q.67,3.54,1.27,6.74c.37,2.13.71,4.15,1,6,.65,3.76,1.2,7,1.58,9.67s.72,4.69.94,6.12c.11.67.2,1.2.26,1.59a3.36,3.36,0,0,0,.11.54,3.24,3.24,0,0,0,0-.55c-.05-.39-.11-.92-.2-1.6-.19-1.44-.46-3.5-.81-6.14s-.85-5.92-1.46-9.69c-.31-1.89-.63-3.91-1-6.05s-.79-4.38-1.22-6.75c-1.68-9.48-4-20.69-6.79-33.11s-6.21-26-10-40.17-7.81-27.58-11.59-39.73-7.41-23-10.65-32.07q-1.2-3.4-2.29-6.47l-2.12-5.74c-1.33-3.59-2.48-6.67-3.48-9.17s-1.75-4.41-2.28-5.76l-.61-1.49A3.92,3.92,0,0,0,100.51,185.47Z" style="fill: rgb(38, 50, 56); transform-origin: 127.886px 287.95px;" id="elxadrgmvejyp" class="animable"></path><path d="M199,236.75a1.92,1.92,0,0,0-.31.29l-.86.9c-.75.8-1.83,2-3.18,3.56a125.14,125.14,0,0,0-10.56,14.08,94.11,94.11,0,0,0-11,23.61c-3,9.39-4.8,20.08-6.62,31.24-3.65,22.35-8.12,42.37-11.36,56.85-1.63,7.21-3,13.05-3.88,17.15-.44,2-.79,3.55-1,4.66-.11.51-.19.91-.26,1.22a2.16,2.16,0,0,0-.06.42,2,2,0,0,0,.13-.41c.08-.3.19-.7.32-1.2.28-1.1.66-2.65,1.16-4.63,1-4.08,2.37-9.91,4.09-17.1,3.36-14.45,7.91-34.47,11.56-56.85,1.83-11.16,3.64-21.81,6.55-31.17a95.59,95.59,0,0,1,10.84-23.53,133.88,133.88,0,0,1,10.35-14.16c1.32-1.6,2.37-2.82,3.09-3.65.33-.39.6-.7.8-.95A2.28,2.28,0,0,0,199,236.75Z" style="fill: rgb(38, 50, 56); transform-origin: 174.455px 313.74px;" id="elz0yvd45thri" class="animable"></path><path d="M97.84,328a2.16,2.16,0,0,0,.64.12l1.86.2,1.34.14,1.58.23c1.14.17,2.44.34,3.85.65l2.23.45,2.38.6c1.66.37,3.37,1,5.2,1.53a76.31,76.31,0,0,1,11.35,5A63.67,63.67,0,0,1,138.45,344a50.34,50.34,0,0,1,3.9,3.75,39.37,39.37,0,0,1,3.09,3.57,35.89,35.89,0,0,1,2.29,3.15A25.12,25.12,0,0,1,149.3,357l.95,1.61a2.51,2.51,0,0,0,.37.54,2.21,2.21,0,0,0-.25-.61l-.84-1.67a20.06,20.06,0,0,0-1.48-2.57,34.48,34.48,0,0,0-2.22-3.24,40.64,40.64,0,0,0-3.06-3.66,49.24,49.24,0,0,0-3.91-3.83,61.12,61.12,0,0,0-10.26-7.19,73.11,73.11,0,0,0-11.48-5c-1.85-.54-3.58-1.13-5.26-1.48l-2.41-.57-2.25-.4c-1.43-.29-2.74-.42-3.89-.56l-1.6-.18-1.35-.07L98.49,328A2.48,2.48,0,0,0,97.84,328Z" style="fill: rgb(38, 50, 56); transform-origin: 124.23px 343.564px;" id="el3gahov0x7ea" class="animable"></path><path d="M92.73,237.17A8.74,8.74,0,0,0,94,238.42l3.69,3.2c3.14,2.68,7.5,6.34,12.34,10.36s9.26,7.63,12.47,10.21l3.83,3a8.23,8.23,0,0,0,1.46,1,8.74,8.74,0,0,0-1.29-1.25l-3.69-3.2c-3.14-2.68-7.5-6.34-12.34-10.36s-9.25-7.62-12.46-10.2l-3.83-3A9.9,9.9,0,0,0,92.73,237.17Z" style="fill: rgb(38, 50, 56); transform-origin: 110.26px 251.68px;" id="el45b6g5xq2an" class="animable"></path><path d="M88.32,260.89c0,.18,9.36,3.12,21,6.57s21.17,6.09,21.22,5.91-9.36-3.13-21-6.57S88.38,260.71,88.32,260.89Z" style="fill: rgb(38, 50, 56); transform-origin: 109.43px 267.13px;" id="el3dcslp5bh8" class="animable"></path><path d="M123.08,251.45a8.45,8.45,0,0,0,1-1.35l2.48-3.78c2.1-3.19,5.09-7.53,8.63-12.16s6.94-8.65,9.45-11.52c1.18-1.36,2.18-2.5,3-3.4a8.62,8.62,0,0,0,1-1.3,6.59,6.59,0,0,0-1.24,1.11c-.76.75-1.84,1.86-3.15,3.26-2.6,2.8-6.08,6.8-9.63,11.44s-6.48,9.05-8.49,12.3c-1,1.63-1.79,3-2.3,3.91A7.08,7.08,0,0,0,123.08,251.45Z" style="fill: rgb(38, 50, 56); transform-origin: 135.86px 234.695px;" id="elzndpjp5bup" class="animable"></path><path d="M155.76,264.61a32.53,32.53,0,0,0,2.21,3.63c1.41,2.21,3.32,5.28,5.29,8.75s3.64,6.69,4.83,9a32,32,0,0,0,2,3.75,22.23,22.23,0,0,0-1.56-4c-1.07-2.4-2.68-5.66-4.66-9.16s-4-6.53-5.48-8.68A22,22,0,0,0,155.76,264.61Z" style="fill: rgb(38, 50, 56); transform-origin: 162.925px 277.175px;" id="eler08hm8w9o" class="animable"></path><path d="M167,305.63c.05.09,1.84-.79,4.78-2.11s7-3,11.68-4.68,8.93-2.83,12.05-3.62,5.07-1.24,5-1.34a5.39,5.39,0,0,0-1.4.15c-.9.13-2.18.37-3.76.71a103,103,0,0,0-12.17,3.46,104.65,104.65,0,0,0-11.66,4.88c-1.45.72-2.6,1.33-3.39,1.79A5.75,5.75,0,0,0,167,305.63Z" style="fill: rgb(38, 50, 56); transform-origin: 183.756px 299.757px;" id="elvcj1ntxjfk8" class="animable"></path><path d="M158.14,354.67a2.29,2.29,0,0,0,.58.19l1.7.43,6.26,1.45a205.87,205.87,0,0,1,20.44,5.4,90.5,90.5,0,0,1,19.08,9c2.28,1.45,4.06,2.73,5.26,3.66a19.54,19.54,0,0,0,1.89,1.4s-.13-.17-.42-.45-.72-.68-1.31-1.16a55.08,55.08,0,0,0-5.16-3.86,83.62,83.62,0,0,0-19.11-9.2,169,169,0,0,0-20.57-5.22L160.47,355A15.81,15.81,0,0,0,158.14,354.67Z" style="fill: rgb(38, 50, 56); transform-origin: 185.745px 365.435px;" id="elvhd6r8bt84l" class="animable"></path><path d="M126.31,366.75c.18,0,1.3-6.57,2.5-14.74s2-14.82,1.82-14.85-1.3,6.58-2.5,14.75S126.12,366.73,126.31,366.75Z" style="fill: rgb(38, 50, 56); transform-origin: 128.469px 351.955px;" id="elacbm3ae4j68" class="animable"></path><path d="M93.16,354.72a35.42,35.42,0,0,0,3-3.55c1.79-2.23,4.27-5.3,7.08-8.64s5.4-6.32,7.29-8.47a33.18,33.18,0,0,0,3-3.55,4.77,4.77,0,0,0-1,.81c-.58.56-1.39,1.38-2.39,2.42-2,2.07-4.64,5-7.46,8.35s-5.24,6.47-6.94,8.78c-.85,1.16-1.52,2.11-2,2.77A4.28,4.28,0,0,0,93.16,354.72Z" style="fill: rgb(38, 50, 56); transform-origin: 103.345px 342.615px;" id="elbqpzuxvfzgj" class="animable"></path><polygon points="180.88 385.46 180.88 401.84 176.78 401.84 162.23 447.79 129.94 447.79 115.84 402.29 110.38 401.84 110.38 385.46 180.88 385.46" style="fill: rgb(69, 90, 100); transform-origin: 145.63px 416.625px;" id="elmadxz4nwlz" class="animable"></polygon><path d="M113.11,402.29c0,.19,14.25.35,31.83.35s31.84-.16,31.84-.35-14.25-.34-31.84-.34S113.11,402.1,113.11,402.29Z" style="fill: rgb(38, 50, 56); transform-origin: 144.945px 402.295px;" id="elrwqya15muza" class="animable"></path><path d="M89.89,296.94a12.86,12.86,0,0,0,2.07.56l5.66,1.37c4.78,1.18,11.34,3,18.45,5.36s13.43,4.93,18,6.88l5.34,2.33a13.67,13.67,0,0,0,2,.81,12.09,12.09,0,0,0-1.87-1.05c-1.22-.64-3-1.51-5.26-2.54a186.09,186.09,0,0,0-36.48-12.27c-2.4-.53-4.36-.92-5.72-1.15A13.35,13.35,0,0,0,89.89,296.94Z" style="fill: rgb(38, 50, 56); transform-origin: 115.65px 305.595px;" id="elc35q3fdiys" class="animable"></path><path d="M123.83,427.81c0,.19,10,.34,22.33.34s22.34-.15,22.34-.34-10-.34-22.34-.34S123.83,427.62,123.83,427.81Z" style="fill: rgb(250, 250, 250); transform-origin: 146.165px 427.81px;" id="eleikh8tey539" class="animable"></path><path d="M122.57,424c0,.19,10.6.34,23.67.34s23.68-.15,23.68-.34-10.6-.34-23.68-.34S122.57,423.82,122.57,424Z" style="fill: rgb(250, 250, 250); transform-origin: 146.245px 424px;" id="el05byu260hpd6" class="animable"></path></g><g id="freepik--Label--inject-5" class="animable" style="transform-origin: 494.844px 277.81px;"><path d="M636.15,321.77l-66.67-74.9a28.24,28.24,0,0,0-20.88-9.46l-219.49-1.59a28.22,28.22,0,0,0-28.43,28.29l.37,155.42a28.22,28.22,0,0,0,28.34,28.16l218.73-.92A28.21,28.21,0,0,0,569.4,437l67.07-78A28.24,28.24,0,0,0,636.15,321.77Zm-37.1,27a23.28,23.28,0,1,1-12.8-30.33A23.28,23.28,0,0,1,599.05,348.73Z" style="fill: #FFB400; transform-origin: 471.998px 341.755px;" id="elqcvtdsriorc" class="animable"></path><g id="elkb9e4ygfa5"><g style="opacity: 0.4; transform-origin: 471.998px 341.755px;" class="animable" id="elp5f46h90a4"><path d="M636.15,321.77l-66.67-74.9a28.24,28.24,0,0,0-20.88-9.46l-219.49-1.59a28.22,28.22,0,0,0-28.43,28.29l.37,155.42a28.22,28.22,0,0,0,28.34,28.16l218.73-.92A28.21,28.21,0,0,0,569.4,437l67.07-78A28.24,28.24,0,0,0,636.15,321.77Zm-37.1,27a23.28,23.28,0,1,1-12.8-30.33A23.28,23.28,0,0,1,599.05,348.73Z" id="el30v5s3xk2t9" class="animable" style="transform-origin: 471.998px 341.755px;"></path></g></g><path d="M647.7,321.77,581,246.87a28.26,28.26,0,0,0-20.88-9.46l-219.49-1.59a28.21,28.21,0,0,0-28.43,28.29l.36,155.42A28.23,28.23,0,0,0,341,447.69l218.72-.92A28.23,28.23,0,0,0,581,437l67.06-78A28.23,28.23,0,0,0,647.7,321.77Zm-37.09,27a23.28,23.28,0,1,1-12.8-30.33A23.28,23.28,0,0,1,610.61,348.73Z" style="fill: #FFB400; transform-origin: 483.544px 341.755px;" id="elmmvyz2ag4d8" class="animable"></path><path d="M385.24,316.56c.17-18.84,11.78-30.71,28.06-30.55s27.51,12.07,27.34,31.06S429,347.78,412.73,347.63,385.06,335.4,385.24,316.56Zm39.43.37c.11-12-4.46-17.77-11.49-17.83-6.86-.07-11.71,5.79-11.82,17.61s4.63,17.76,11.49,17.83C419.88,334.6,424.56,328.9,424.67,316.93Zm55.19-29,19,.18-77.35,111-19-.18ZM460.74,370c.18-18.84,11.78-30.71,27.91-30.56,16.28.16,27.66,12.24,27.49,31.07S504.36,401.17,488.07,401C472,400.87,460.57,388.79,460.74,370Zm39.27.36c.11-11.81-4.46-17.76-11.49-17.82-6.86-.07-11.7,5.63-11.81,17.61s4.62,17.76,11.48,17.83C495.22,388,499.9,382.13,500,370.31Z" style="fill: rgb(255, 255, 255); transform-origin: 450.69px 343.505px;" id="elud9ij613ft" class="animable"></path><path d="M640.4,368a10.19,10.19,0,0,1,2.19,1.57c1.37,1.09,3.37,2.73,5.9,4.9s5.61,4.85,9.07,8.08,7.34,7,11.35,11.47a116.24,116.24,0,0,1,11.93,15.57l1.42,2.27,1.34,2.37a52,52,0,0,1,2.54,5A31.29,31.29,0,0,1,689,430.77a18.22,18.22,0,0,1-.92,6.29,16.21,16.21,0,0,1-3.3,5.67,21.28,21.28,0,0,1-11.44,6.54,31.12,31.12,0,0,1-13.51-.32A59.1,59.1,0,0,1,647,444.22a80.18,80.18,0,0,1-21.51-16,103.46,103.46,0,0,1-8.31-9.66q-3.76-4.93-7.16-9.81c-9-13-16-25.5-20.4-36.68-1.1-2.79-2.05-5.47-2.87-8.05-.4-1.29-.78-2.55-1.09-3.8a23.61,23.61,0,0,1-.73-3.69,9.15,9.15,0,0,1,1.65-6.71,9.76,9.76,0,0,1,4.74-3.3,13.28,13.28,0,0,1,2.38-.55,13,13,0,0,1,2.14-.05,10.06,10.06,0,0,1,3.26.71,6.62,6.62,0,0,1,1.74,1.07c.34.31.49.48.46.52s-.24-.07-.62-.3a7.7,7.7,0,0,0-1.76-.79,10.3,10.3,0,0,0-3.1-.44,14.37,14.37,0,0,0-2,.16,13,13,0,0,0-2.17.62,8.81,8.81,0,0,0-4.08,3.08,7.83,7.83,0,0,0-1.2,5.8,21.89,21.89,0,0,0,.78,3.47c.33,1.2.74,2.42,1.16,3.68q1.31,3.78,3,7.88c4.53,10.9,11.61,23.21,20.65,36q3.4,4.8,7.17,9.67a102.14,102.14,0,0,0,8.17,9.4,78.69,78.69,0,0,0,20.84,15.48,57.26,57.26,0,0,0,12.3,4.54,28.77,28.77,0,0,0,12.4.35,18.93,18.93,0,0,0,10.12-5.7,14.7,14.7,0,0,0,3.68-10.26A29.13,29.13,0,0,0,684,420.15a50.58,50.58,0,0,0-2.39-4.84L680.36,413,679,410.74a117.8,117.8,0,0,0-11.49-15.49c-3.86-4.48-7.61-8.32-11-11.64s-6.32-6.1-8.75-8.37L642.24,370A11,11,0,0,1,640.4,368Z" style="fill: rgb(38, 50, 56); transform-origin: 636.92px 397.879px;" id="elptt0h2lv54l" class="animable"></path><path d="M536.23,212.79c-.14,0-2.94-19.55-6.26-43.71s-5.89-43.76-5.74-43.78,2.94,19.55,6.26,43.71S536.38,212.77,536.23,212.79Z" style="fill: rgb(38, 50, 56); transform-origin: 530.23px 169.045px;" id="el5ckzk4fl7ln" class="animable"></path><path d="M618.68,105.76a1.26,1.26,0,0,1-.09.3l-.32.87L617,110.26l-4.76,12.22c-4,10.32-9.48,24.6-15.3,40.47s-10.87,30.3-14.47,40.77c-1.79,5.21-3.24,9.44-4.25,12.41-.5,1.43-.89,2.56-1.17,3.37-.13.36-.24.64-.32.87a1.48,1.48,0,0,1-.12.29,1.05,1.05,0,0,1,.07-.31l.27-.89c.25-.81.61-2,1.07-3.4.94-2.95,2.34-7.21,4.1-12.46,3.52-10.5,8.52-25,14.34-40.83s11.33-30.14,15.43-40.43c2-5.14,3.74-9.3,4.93-12.16l1.37-3.29c.15-.35.28-.63.37-.85Z" style="fill: rgb(38, 50, 56); transform-origin: 597.645px 163.21px;" id="el6p09lmqu2pf" class="animable"></path><path d="M677.76,182.72c.09.11-14.22,11.32-32,25s-32.2,24.74-32.29,24.62,14.23-11.32,32-25S677.68,182.6,677.76,182.72Z" style="fill: rgb(38, 50, 56); transform-origin: 645.615px 207.53px;" id="elvvk4nedrtso" class="animable"></path><path d="M501.52,216.44c-.12.09-5.65-7-12.36-15.76s-12.07-16-12-16.07,5.65,7,12.36,15.76S501.63,216.35,501.52,216.44Z" style="fill: rgb(38, 50, 56); transform-origin: 489.34px 200.525px;" id="elsjzm1ni7wrr" class="animable"></path><path d="M671,271.56c0,.14-8.81-2.3-19.59-5.44s-19.48-5.8-19.44-5.94,8.81,2.3,19.59,5.44S671.05,271.42,671,271.56Z" style="fill: rgb(38, 50, 56); transform-origin: 651.485px 265.87px;" id="el2ym132b96t3" class="animable"></path><polygon points="544.99 271.24 551.49 267.5 554.94 260.84 558.69 267.34 565.35 270.8 558.85 274.54 555.39 281.2 551.65 274.7 544.99 271.24" style="fill: rgb(255, 255, 255); transform-origin: 555.17px 271.02px;" id="elmpqytreqxbr" class="animable"></polygon><polygon points="509.85 260.92 512.13 259.61 513.34 257.28 514.65 259.55 516.98 260.76 514.7 262.07 513.49 264.4 512.18 262.13 509.85 260.92" style="fill: rgb(255, 255, 255); transform-origin: 513.415px 260.84px;" id="elj95ygt19av8" class="animable"></polygon><polygon points="532.29 306.85 536.69 304.32 539.03 299.81 541.56 304.21 546.07 306.55 541.67 309.08 539.33 313.59 536.8 309.19 532.29 306.85" style="fill: rgb(255, 255, 255); transform-origin: 539.18px 306.7px;" id="el31nkbz5tibq" class="animable"></polygon></g><g id="freepik--Floor--inject-5" class="animable" style="transform-origin: 372.32px 447.79px;"><path d="M716.81,447.79c0,.14-154.25.26-344.48.26s-344.5-.12-344.5-.26,154.21-.26,344.5-.26S716.81,447.64,716.81,447.79Z" style="fill: rgb(38, 50, 56); transform-origin: 372.32px 447.79px;" id="el3sn5fvpiwi7" class="animable"></path></g><g id="freepik--Character--inject-5" class="animable" style="transform-origin: 272.577px 316.176px;"><path d="M228.71,430.06S187,441.62,185.27,442.21c-2.51.88-2.09,10.1,1.83,10,1.85-.07,32.07,1.12,35.89.88s14.1-4.29,14.1-4.29Z" style="fill: rgb(69, 90, 100); transform-origin: 210.395px 441.591px;" id="elubdbgep1nos" class="animable"></path><path d="M211.31,446c-.21,0-.49-2.18-1.84-4.48s-3.08-3.68-2.95-3.84,2.15,1,3.56,3.49S211.49,446,211.31,446Z" style="fill: rgb(38, 50, 56); transform-origin: 208.953px 441.833px;" id="eltxy9oxyj0m" class="animable"></path><path d="M215.67,444c-.21,0-.63-1.94-1.74-4.12s-2.43-3.71-2.28-3.85,1.75,1.23,2.9,3.54S215.85,444,215.67,444Z" style="fill: rgb(38, 50, 56); transform-origin: 213.686px 440.01px;" id="ellho37rnddwr" class="animable"></path><path d="M219.75,442.93c-.21,0-.05-2.1-1-4.42s-2.43-3.75-2.28-3.9,2,1.13,2.93,3.65S219.92,443,219.75,442.93Z" style="fill: rgb(38, 50, 56); transform-origin: 218.224px 438.765px;" id="els24z21lgloh" class="animable"></path><path d="M219,437.53a7.54,7.54,0,0,1-.45-3.1A15,15,0,0,1,219,431a13.16,13.16,0,0,1,.62-1.94,2.29,2.29,0,0,1,.67-1,1.11,1.11,0,0,1,1.43.07,1.88,1.88,0,0,1,.56,1.18,8.25,8.25,0,0,1,0,1.1,9,9,0,0,1-.26,2,12.53,12.53,0,0,1-1.28,3.19,8.47,8.47,0,0,1-1.88,2.51c-.09-.06.61-1,1.44-2.74a13.48,13.48,0,0,0,1.09-3.1,9.16,9.16,0,0,0,.21-1.91c0-.64,0-1.44-.39-1.75a.4.4,0,0,0-.55-.05,1.73,1.73,0,0,0-.46.73,14.32,14.32,0,0,0-.63,1.84,16.31,16.31,0,0,0-.55,3.26C218.93,436.33,219.12,437.52,219,437.53Z" style="fill: rgb(38, 50, 56); transform-origin: 220.416px 432.971px;" id="elixn3jmm5h5" class="animable"></path><path d="M219.06,437.11a5.89,5.89,0,0,1,2.7-.44,12.06,12.06,0,0,1,3,.37,6.18,6.18,0,0,1,1.71.63,1.75,1.75,0,0,1,.94,1.9,2.09,2.09,0,0,1-1.51,1.49,3.81,3.81,0,0,1-1.87,0,8.91,8.91,0,0,1-4.65-3.25,18.83,18.83,0,0,1,2.22,1.51,7.43,7.43,0,0,0,2.56,1.11,3.25,3.25,0,0,0,1.55,0,1.43,1.43,0,0,0,1-1,1.07,1.07,0,0,0-.62-1.16,6.08,6.08,0,0,0-1.52-.59,13.63,13.63,0,0,0-2.81-.49C220.1,437.05,219.08,437.22,219.06,437.11Z" style="fill: rgb(38, 50, 56); transform-origin: 223.251px 438.915px;" id="elvhc1y9npy2r" class="animable"></path><path d="M204.9,446.44c-.21,0,0-1.81-.83-3.76s-2.17-3.11-2-3.27,1.81.82,2.69,3S205.07,446.52,204.9,446.44Z" style="fill: rgb(38, 50, 56); transform-origin: 203.647px 442.918px;" id="elka31cbnbrt" class="animable"></path><path d="M234,448.37a9.9,9.9,0,0,1-1.62.76,36.69,36.69,0,0,1-4.65,1.44,65.85,65.85,0,0,1-15.94,1.51c-6.26-.07-11.9-.35-16-.52l-4.84-.25a8.89,8.89,0,0,1-1.77-.19A8.1,8.1,0,0,1,191,451l4.85,0,16,.31a74.47,74.47,0,0,0,15.83-1.29C231.66,449.27,234,448.24,234,448.37Z" style="fill: rgb(38, 50, 56); transform-origin: 211.59px 450.232px;" id="el2iku9wq2nva" class="animable"></path><path d="M235.27,449.32a33.68,33.68,0,0,1-3.13-1.42,14.64,14.64,0,0,0-7.9-1.31c-3.15.48-5.38,2.6-6.83,4.06a23.39,23.39,0,0,1-2.41,2.46,13.09,13.09,0,0,1,2.05-2.79,16.4,16.4,0,0,1,2.77-2.59,9.92,9.92,0,0,1,4.31-1.83,13.82,13.82,0,0,1,8.22,1.56A11.06,11.06,0,0,1,235.27,449.32Z" style="fill: rgb(38, 50, 56); transform-origin: 225.135px 449.455px;" id="el2ezqvfv3iu8" class="animable"></path><path d="M193.38,451.13a15,15,0,0,1,.61-1.58,7.69,7.69,0,0,0-1.38-7.48c-.66-.8-1.19-1.18-1.14-1.26s.66.22,1.43,1a7.12,7.12,0,0,1,1.46,7.9C193.91,450.69,193.43,451.17,193.38,451.13Z" style="fill: rgb(38, 50, 56); transform-origin: 193.218px 445.965px;" id="el8yhqg2asekg" class="animable"></path><path d="M272.28,431.3s42.84,6.51,44.57,6.9c2.61.58,3.28,9.78-.62,10.1-1.85.15-31.72,4.93-35.54,5.15s-15.8-2.92-15.8-2.92Z" style="fill: rgb(69, 90, 100); transform-origin: 291.936px 442.381px;" id="el5js8u6s4rwo" class="animable"></path><path d="M291.45,445.05c.21,0,.23-2.22,1.29-4.67s2.63-4,2.48-4.17-2,1.27-3.12,3.9S291.28,445.09,291.45,445.05Z" style="fill: rgb(38, 50, 56); transform-origin: 293.256px 440.623px;" id="el31ms9i5ll8x" class="animable"></path><path d="M286.89,443.61c.21,0,.39-2,1.24-4.3s2-4,1.8-4.09-1.59,1.42-2.46,3.85S286.71,443.62,286.89,443.61Z" style="fill: rgb(38, 50, 56); transform-origin: 288.359px 439.413px;" id="elknqt2swmwqa" class="animable"></path><path d="M282.71,443c.2,0-.2-2.09.44-4.5s2-4,1.8-4.15-1.81,1.36-2.47,4S282.55,443.09,282.71,443Z" style="fill: rgb(38, 50, 56); transform-origin: 283.589px 438.671px;" id="eldn6c59277pe" class="animable"></path><path d="M282.8,437.56a7.22,7.22,0,0,0,.08-3.13,14.42,14.42,0,0,0-.83-3.33,13.84,13.84,0,0,0-.85-1.86,2.3,2.3,0,0,0-.78-.93,1.12,1.12,0,0,0-1.42.24,1.87,1.87,0,0,0-.41,1.24,7.91,7.91,0,0,0,.08,1.1,9,9,0,0,0,.5,2,12.55,12.55,0,0,0,1.65,3,8.65,8.65,0,0,0,2.16,2.28c.09-.08-.72-1-1.75-2.55a13.83,13.83,0,0,1-1.46-3,9.12,9.12,0,0,1-.42-1.87c-.06-.64-.16-1.43.17-1.78a.4.4,0,0,1,.54-.11,1.74,1.74,0,0,1,.55.67,14,14,0,0,1,.84,1.75,16.88,16.88,0,0,1,.94,3.17C282.73,436.37,282.69,437.56,282.8,437.56Z" style="fill: rgb(38, 50, 56); transform-origin: 280.801px 433.163px;" id="elcdeq7155ue" class="animable"></path><path d="M282.7,437.15A5.85,5.85,0,0,0,280,437a12.41,12.41,0,0,0-2.9.71,6.56,6.56,0,0,0-1.62.83,1.76,1.76,0,0,0-.71,2,2.12,2.12,0,0,0,1.68,1.31,3.91,3.91,0,0,0,1.86-.23,9,9,0,0,0,4.23-3.78,18.87,18.87,0,0,0-2,1.76,7.38,7.38,0,0,1-2.41,1.41,3.36,3.36,0,0,1-1.54.16,1.45,1.45,0,0,1-1.13-.86,1.1,1.1,0,0,1,.48-1.24,6.52,6.52,0,0,1,1.43-.76,13.33,13.33,0,0,1,2.74-.82C281.66,437.22,282.7,437.26,282.7,437.15Z" style="fill: rgb(38, 50, 56); transform-origin: 278.694px 439.393px;" id="elxhaddfso3ki" class="animable"></path><path d="M297.87,444.73c.21-.05-.21-1.79.37-3.84s1.8-3.34,1.65-3.48-1.71,1-2.32,3.3S297.72,444.83,297.87,444.73Z" style="fill: rgb(38, 50, 56); transform-origin: 298.619px 441.066px;" id="el2dt85yt0i0m" class="animable"></path><path d="M269.17,450.11a8.76,8.76,0,0,0,1.7.56,35.53,35.53,0,0,0,4.78.88,65.94,65.94,0,0,0,16-.39c6.21-.82,11.77-1.77,15.81-2.42l4.78-.83a8.22,8.22,0,0,0,1.73-.4,8.36,8.36,0,0,0-1.77.13l-4.81.61-15.83,2.21a74.54,74.54,0,0,1-15.87.6C271.64,450.72,269.2,450,269.17,450.11Z" style="fill: rgb(38, 50, 56); transform-origin: 291.57px 449.684px;" id="el3tuc2g8ux4g" class="animable"></path><path d="M268.06,451.2c.07.09,1.12-.71,2.94-1.78a14.48,14.48,0,0,1,7.69-2.24c3.18.1,5.64,1.94,7.26,3.22a25.88,25.88,0,0,0,2.68,2.16,12.56,12.56,0,0,0-2.36-2.53,16.41,16.41,0,0,0-3.06-2.25,10,10,0,0,0-4.5-1.3,13.83,13.83,0,0,0-8,2.52A11.06,11.06,0,0,0,268.06,451.2Z" style="fill: rgb(38, 50, 56); transform-origin: 278.345px 449.52px;" id="elstbgflc2ysj" class="animable"></path><path d="M405.51,255.29a2.63,2.63,0,0,0-1.25-1.23l1-2a5.85,5.85,0,0,0-.59-2.06c-.5-.86-2.25-.79-2.25-.79l.27-.57a2.58,2.58,0,0,0-.22-2.52c-.08-.11-.16-.22-.26-.34a4.17,4.17,0,0,0-2.21-1.12s1-1.92.55-2.73a4.16,4.16,0,0,0-4.26-1.68,60.42,60.42,0,0,0-7.75,3.7,1.83,1.83,0,0,1-2.6-1,26.3,26.3,0,0,0-3.79-7.12c-1.88-2.26-3.64-2.08-4.67-1.68a.85.85,0,0,0-.42,1.23,45.63,45.63,0,0,1,2.72,5c.49,1.31,1,11.17,1,11.17l-2.7,5.14L350.85,299.7s-41.15-27.73-41-28.42l-1.94,31.8,31,20.6A21.84,21.84,0,0,0,371,314.24l20.87-45.3,2.53-3.7,9.83-6.3S405.86,256.12,405.51,255.29Z" style="fill: rgb(255, 190, 157); transform-origin: 356.735px 280.616px;" id="eld7lfp6bf6gt" class="animable"></path><path d="M401,244.67s-.06.07-.19.18l-.59.48c-.55.42-1.3,1-2.2,1.71l-3.29,2.5c-.62.46-1.24,1-2,1.44a2.89,2.89,0,0,1-2.61.35,2,2,0,0,1-1-1,2.87,2.87,0,0,1-.23-1.31,3.78,3.78,0,0,1,1-2.24,14,14,0,0,1,1.64-1.5l1.48-1.23,2.16-1.77.59-.47c.14-.1.21-.16.22-.15l-.19.19-.56.51-2.1,1.82-1.46,1.25a13.91,13.91,0,0,0-1.6,1.5,3.51,3.51,0,0,0-1,2.1,2.07,2.07,0,0,0,1.05,2.07,2.15,2.15,0,0,0,1.23.12,3.5,3.5,0,0,0,1.16-.45c.7-.43,1.34-1,2-1.41l3.31-2.47,2.25-1.64.62-.44Z" style="fill: rgb(235, 153, 110); transform-origin: 394.942px 246.577px;" id="elq5h77syv5ua" class="animable"></path><path d="M403.18,249.3a2.62,2.62,0,0,1-.46.38c-.3.23-.75.56-1.31.95-1.11.77-2.68,1.81-4.47,2.86-.45.26-.88.53-1.34.74a2.9,2.9,0,0,1-1.43.27,2.24,2.24,0,0,1-1.85-1.49,2.2,2.2,0,0,1,.12-1.62,2.08,2.08,0,0,1,.25-.37c.07-.08.11-.11.12-.11s-.13.18-.28.52a2.19,2.19,0,0,0,0,1.52,2,2,0,0,0,1.7,1.32,2.71,2.71,0,0,0,1.31-.27,14.4,14.4,0,0,0,1.31-.72c1.79-1.05,3.37-2.06,4.51-2.8l1.34-.88A3.49,3.49,0,0,1,403.18,249.3Z" style="fill: rgb(235, 153, 110); transform-origin: 397.699px 251.903px;" id="el7mg94yl5y5h" class="animable"></path><path d="M404.45,253.82a2.55,2.55,0,0,1-.47.27l-1.33.67c-1.13.56-2.7,1.31-4.43,2.13a12.13,12.13,0,0,1-1.3.56,2.51,2.51,0,0,1-1.35.11,1.45,1.45,0,0,1-1-.72,1.69,1.69,0,0,1-.16-1.06,2.29,2.29,0,0,1,.79-1.29c.27-.23.45-.32.46-.3s-.15.13-.4.37a2.34,2.34,0,0,0-.67,1.25,1.48,1.48,0,0,0,.16.93,1.27,1.27,0,0,0,.87.6,2.26,2.26,0,0,0,1.22-.12,11.47,11.47,0,0,0,1.27-.56c1.74-.81,3.31-1.54,4.46-2.06l1.37-.59A1.84,1.84,0,0,1,404.45,253.82Z" style="fill: rgb(235, 153, 110); transform-origin: 399.417px 255.713px;" id="eluwrdti2aisi" class="animable"></path><path d="M405.16,258a10.44,10.44,0,0,1-1.56.41c-1,.22-2.32.51-3.81.81l-1.09.22a4.18,4.18,0,0,1-1.05.12,1.48,1.48,0,0,1-.93-.33,1,1,0,0,1-.36-.79,1.43,1.43,0,0,1,.6-1.05.75.75,0,0,1,.4-.18s-.14.08-.34.26a1.36,1.36,0,0,0-.48,1,.8.8,0,0,0,.31.63,1.28,1.28,0,0,0,.8.26,4.5,4.5,0,0,0,1-.13l1.09-.23c1.49-.3,2.84-.56,3.82-.74A11.49,11.49,0,0,1,405.16,258Z" style="fill: rgb(235, 153, 110); transform-origin: 400.76px 258.385px;" id="elc0z015f61ok" class="animable"></path><path d="M394.49,256a14.39,14.39,0,0,0-2.8-.28,13.46,13.46,0,0,0-2.75.55,5.13,5.13,0,0,1,2.74-.8A5.26,5.26,0,0,1,394.49,256Z" style="fill: rgb(235, 153, 110); transform-origin: 391.715px 255.86px;" id="el0cuw3s41yjv" class="animable"></path><path d="M247.56,246.58s-13.84-11.67-10.64-19.71,12.09-12,16.46-26.65C256.87,188.54,277.66,166,302.3,183c0,0,8.34-1.31,13.08,2.49s5.89,11.38,7.9,20.13c3.1,13.49,4.8,23.86-1.2,30.46s-8.2,8.37-7.88,15.87c.42,9.79,4.74,8.48,1,15.62l-20.66-6.74-.22-5.69-2.09,5.35-12-4.32Z" style="fill: rgb(38, 50, 56); transform-origin: 281.267px 222.221px;" id="elom5qineheu8" class="animable"></path><path d="M316.37,197.36c-1.34,3.08-.24,6.64,1,9.76s2.75,6.41,2.11,9.71c-1.14,5.85-8.41,9.11-9.21,15-.43,3.16,1.15,6.38.54,9.52s-3.13,5.32-5.82,6.84-5.66,2.54-8.19,4.32c0,0-5.56,4.56-15.14-2.95" style="fill: rgb(38, 50, 56); transform-origin: 300.646px 225.621px;" id="elgx2to9wdsgu" class="animable"></path><path d="M277.12,189.71a5.1,5.1,0,0,0-6,3.39h0L251.27,259c-2.57,7.71,7.13,15.94,15.4,18.62h0c8.36,2.71,10.05-1.26,12.7-8.52,4.44-12.12,6-16.7,6-16.63s11.08,1.9,18-11c3.44-6.43,7-17.7,9.57-27,2.34-8.38.4-20.34-8.07-22.31Z" style="fill: rgb(255, 190, 157); transform-origin: 282.353px 234.027px;" id="el45fhdufkhvb" class="animable"></path><path d="M305.94,221.35a1.85,1.85,0,0,1-2.31,1.18,1.78,1.78,0,0,1-1.26-2.21,1.86,1.86,0,0,1,2.31-1.18A1.78,1.78,0,0,1,305.94,221.35Z" style="fill: rgb(38, 50, 56); transform-origin: 304.155px 220.836px;" id="elo1tz698srxg" class="animable"></path><path d="M308.68,219c-.29.15-1.28-1.29-3.17-1.94s-3.6-.19-3.72-.49c-.07-.14.3-.48,1-.71a5.13,5.13,0,0,1,3.08.11,4.94,4.94,0,0,1,2.43,1.84C308.77,218.41,308.83,218.9,308.68,219Z" style="fill: rgb(38, 50, 56); transform-origin: 305.267px 217.343px;" id="eljc2dpjobeks" class="animable"></path><path d="M287.22,215.37a1.86,1.86,0,0,1-2.3,1.19,1.78,1.78,0,0,1-1.26-2.21,1.86,1.86,0,0,1,2.3-1.19A1.78,1.78,0,0,1,287.22,215.37Z" style="fill: rgb(38, 50, 56); transform-origin: 285.44px 214.86px;" id="elb5aqvhpjxj" class="animable"></path><path d="M289.86,213.31c-.3.16-1.29-1.29-3.18-1.94s-3.6-.19-3.72-.49c-.07-.14.3-.47,1.05-.7a5.05,5.05,0,0,1,3.08.11,4.87,4.87,0,0,1,2.43,1.83C289.94,212.76,290,213.25,289.86,213.31Z" style="fill: rgb(38, 50, 56); transform-origin: 286.44px 211.657px;" id="elsmammesdhsg" class="animable"></path><path d="M291.84,229.69a13,13,0,0,1,3.26.51c.5.12,1,.18,1.18-.12a2.63,2.63,0,0,0,.17-1.54c0-1.32-.09-2.71-.14-4.16-.17-5.92-.11-10.71.13-10.72s.57,4.79.73,10.7c0,1.45.05,2.84.08,4.17a2.92,2.92,0,0,1-.41,2,1.25,1.25,0,0,1-1,.43,3.19,3.19,0,0,1-.85-.17A13.06,13.06,0,0,1,291.84,229.69Z" style="fill: rgb(38, 50, 56); transform-origin: 294.562px 222.311px;" id="elxq36y996jfm" class="animable"></path><path d="M285.38,252.47a36.73,36.73,0,0,1-16.61-11.25s1.35,11,15.48,14.49Z" style="fill: rgb(235, 153, 110); transform-origin: 277.075px 248.465px;" id="elx1dj3t8diop" class="animable"></path><path d="M289.46,234a3.57,3.57,0,0,0-2.61-2.32,3.28,3.28,0,0,0-2.54.4,2.06,2.06,0,0,0-.93,2.2,2.4,2.4,0,0,0,2.25,1.48,7.4,7.4,0,0,0,2.91-.6,2.24,2.24,0,0,0,.74-.37.68.68,0,0,0,.24-.7" style="fill: rgb(235, 153, 110); transform-origin: 286.436px 233.671px;" id="eljdry2i49he" class="animable"></path><path d="M291.26,207.91c-.29.5-2.2-.13-4.56-.29s-4.33.11-4.55-.42c-.09-.26.33-.7,1.18-1.07a7.49,7.49,0,0,1,3.53-.53,7.58,7.58,0,0,1,3.41,1.07C291.05,207.17,291.4,207.67,291.26,207.91Z" style="fill: rgb(38, 50, 56); transform-origin: 286.714px 206.834px;" id="elzv4glegyvl" class="animable"></path><path d="M311.4,212.7c-.52.32-2-.58-3.89-1.14s-3.61-.7-3.86-1.26c-.1-.27.28-.64,1.1-.85a6.89,6.89,0,0,1,6.25,1.93C311.55,212,311.64,212.53,311.4,212.7Z" style="fill: rgb(38, 50, 56); transform-origin: 307.58px 211.043px;" id="elfdbq8ep8btm" class="animable"></path><path d="M254,233q5.58-18.69,11.17-37.4c.76-2.56,1.64-5.29,3.77-6.9s4.71-1.7,7.23-1.75a136.85,136.85,0,0,1,32.4,3.2c.5,2.53-1.69,4.94-4.15,5.77s-5.12.53-7.7.56-5.41.49-7.16,2.4-2.05,5.16-3.81,7.28c-3,3.64-9.37,2.87-12.38,6.53-2.27,2.77-1.66,6.82-2.41,10.32-.85,4-.85,4-4,9.82-1.91,3.58,2.89,10.42-1.89,19.29l-9.28-2.64,4.07-13.7-5.52,12.85Z" style="fill: rgb(38, 50, 56); transform-origin: 281.321px 219.52px;" id="elkc51zqilnf" class="animable"></path><path d="M286.24,229.46c.19.11.09.61.08,1.33a4.83,4.83,0,0,0,2.35,4.48c.59.4,1.06.6,1,.82s-.57.41-1.46.2a4.39,4.39,0,0,1-3-5.74C285.58,229.69,286.07,229.35,286.24,229.46Z" style="fill: rgb(38, 50, 56); transform-origin: 287.311px 232.91px;" id="el6crkygj01qw" class="animable"></path><path d="M283.48,199.4a2,2,0,0,1-.52.29,15.23,15.23,0,0,0-1.47.82,17.78,17.78,0,0,0-8.19,12.35,20.16,20.16,0,0,0,0,5.37,32.23,32.23,0,0,1,.35,5.88,10.63,10.63,0,0,1-.63,3,18.78,18.78,0,0,1-1.33,2.61,13,13,0,0,0-2.1,4.89,16.56,16.56,0,0,0,.13,4.84c.21,1.53.48,3,.58,4.27a11.29,11.29,0,0,1-.91,6.16,6.46,6.46,0,0,1-1,1.39c-.29.27-.45.4-.46.38a9,9,0,0,0,1.27-1.86,11.58,11.58,0,0,0,.73-6c-.13-1.3-.42-2.71-.65-4.24a16.76,16.76,0,0,1-.17-5c.39-3.68,3.94-6.38,4-10.42a32.6,32.6,0,0,0-.33-5.79,20.26,20.26,0,0,1,0-5.5,17.62,17.62,0,0,1,3.79-8.42,16.69,16.69,0,0,1,4.77-4,10.76,10.76,0,0,1,1.53-.73A2.13,2.13,0,0,1,283.48,199.4Z" style="fill: rgb(38, 50, 56); transform-origin: 275.705px 225.526px;" id="el4jqvocti83k" class="animable"></path><path d="M328.3,255.63l-.17.14c-.12.08-.29.22-.53.36a8.38,8.38,0,0,1-2.27.92,9.44,9.44,0,0,1-3.89.14,8.57,8.57,0,0,1-4.6-2.29,9.36,9.36,0,0,1-2.75-5.57,8.58,8.58,0,0,1,.23-3.51,10.82,10.82,0,0,1,1.64-3.34,44.48,44.48,0,0,1,5.53-5.64,21,21,0,0,0,2.72-3.07,15.18,15.18,0,0,0,1.87-3.76,24.42,24.42,0,0,0,1.05-8.25,59.63,59.63,0,0,0-.81-7.79A72.81,72.81,0,0,0,323,201.14a77.44,77.44,0,0,0-3.5-8.25c-.47-.95-.85-1.68-1.11-2.17A4.59,4.59,0,0,1,318,190a5.11,5.11,0,0,1,.46.72c.29.47.7,1.19,1.2,2.13a67.4,67.4,0,0,1,3.67,8.21,70.7,70.7,0,0,1,3.46,12.88,58.56,58.56,0,0,1,.85,7.86,24.57,24.57,0,0,1-1.07,8.42,15.2,15.2,0,0,1-1.93,3.89,21.78,21.78,0,0,1-2.8,3.15,44.78,44.78,0,0,0-5.49,5.55,10.32,10.32,0,0,0-1.59,3.18,8.46,8.46,0,0,0-.25,3.34,9.1,9.1,0,0,0,2.59,5.36,8.44,8.44,0,0,0,4.39,2.27,9.3,9.3,0,0,0,3.79-.06A10.74,10.74,0,0,0,328.3,255.63Z" style="fill: rgb(38, 50, 56); transform-origin: 321.152px 223.664px;" id="eldsobw4d0tci" class="animable"></path><path d="M243.23,242.07a8.64,8.64,0,0,0,3.21-1.6,12.79,12.79,0,0,0,4.26-8.59,50.09,50.09,0,0,0,.18-6.83,30.16,30.16,0,0,1,.61-7.9,14.72,14.72,0,0,1,1.61-4,9.5,9.5,0,0,1,3.16-3.24c2.71-1.66,6-1.58,9-2.61a9.51,9.51,0,0,0,3.83-2.51,23.9,23.9,0,0,0,2.7-3.65c1.6-2.52,3.14-5.17,5.58-6.74a9.55,9.55,0,0,1,3.87-1.41,21,21,0,0,1,3.85-.16,39.49,39.49,0,0,0,6.83-.06,20.31,20.31,0,0,0,9.08-3.62,25.18,25.18,0,0,0,2.08-1.7l.51-.48.19-.16a14,14,0,0,1-2.66,2.5,20.18,20.18,0,0,1-9.15,3.83,40,40,0,0,1-6.89.12c-2.42,0-5.17,0-7.45,1.55s-3.81,4.06-5.41,6.6a24.17,24.17,0,0,1-2.76,3.74,10,10,0,0,1-4,2.64c-3.08,1.06-6.36,1-8.89,2.56a10.89,10.89,0,0,0-4.57,6.92,29.87,29.87,0,0,0-.65,7.77,47.61,47.61,0,0,1-.24,6.89,12.87,12.87,0,0,1-4.5,8.7,7.2,7.2,0,0,1-2.41,1.25,6.62,6.62,0,0,1-.69.16A.74.74,0,0,1,243.23,242.07Z" style="fill: rgb(69, 90, 100); transform-origin: 273.505px 214.441px;" id="elc9hrrdos43p" class="animable"></path><path d="M253.25,200.65a13.14,13.14,0,0,0,2,.53,9.74,9.74,0,0,0,5.4-.89,22.59,22.59,0,0,0,6.46-5.09c1.1-1.12,2.25-2.32,3.55-3.45a16.18,16.18,0,0,1,4.51-2.88,14.61,14.61,0,0,1,5.27-1,43.48,43.48,0,0,1,4.95.27c1.56.15,3,.31,4.42.32a19.81,19.81,0,0,0,3.83-.31,10.55,10.55,0,0,0,5-2.22,19.27,19.27,0,0,0,1.41-1.47,2.4,2.4,0,0,1-.27.46,4.11,4.11,0,0,1-.39.52,5.21,5.21,0,0,1-.62.64,10.4,10.4,0,0,1-5.09,2.43,19.54,19.54,0,0,1-3.9.38c-1.41,0-2.9-.14-4.47-.27a42.94,42.94,0,0,0-4.89-.24,14.15,14.15,0,0,0-5.09.94c-3.31,1.37-5.69,4-7.91,6.19a22.05,22.05,0,0,1-6.65,5.08,9.59,9.59,0,0,1-5.58.76,6.46,6.46,0,0,1-1.48-.47A2.61,2.61,0,0,1,253.25,200.65Z" style="fill: rgb(69, 90, 100); transform-origin: 276.65px 192.968px;" id="elclit7me0jbv" class="animable"></path><path d="M325.6,228.69a7.55,7.55,0,0,0,.49-1.91,8.2,8.2,0,0,0-1.42-5.05c-1.16-2-3.31-3.68-5.49-5.81a14.73,14.73,0,0,1-2.91-3.84,13.49,13.49,0,0,1-1.24-5c-.23-3.55.38-6.87.3-9.88a12,12,0,0,0-2.2-7.46,7.43,7.43,0,0,0-4.39-2.81,8.51,8.51,0,0,0-2-.05,1.72,1.72,0,0,1,.51-.14,5.48,5.48,0,0,1,1.49,0,7.44,7.44,0,0,1,4.65,2.78c1.55,1.79,2.35,4.63,2.39,7.68s-.49,6.39-.26,9.85a13.1,13.1,0,0,0,1.18,4.84,14.17,14.17,0,0,0,2.79,3.73c2.12,2.12,4.31,3.9,5.46,6a8.17,8.17,0,0,1,1.31,5.27,4.74,4.74,0,0,1-.42,1.43A1.8,1.8,0,0,1,325.6,228.69Z" style="fill: rgb(69, 90, 100); transform-origin: 316.518px 207.69px;" id="elnfd33lc9ub" class="animable"></path><path d="M237.1,234.68a5.94,5.94,0,0,1-.64-.35,7.44,7.44,0,0,1-1.55-1.4,9.06,9.06,0,0,1-1.92-7.3,8.83,8.83,0,0,1,.85-2.45A9.74,9.74,0,0,1,235.6,221a22.43,22.43,0,0,1,5.2-3.2,20.31,20.31,0,0,0,5.56-3.54,13.11,13.11,0,0,0,3.15-6.22c.6-2.37,1-4.77,1.79-7a30.33,30.33,0,0,1,2.91-6.09,31.75,31.75,0,0,1,7.6-8.45,29.6,29.6,0,0,1,6.62-3.88,18.51,18.51,0,0,1,1.95-.73,3.19,3.19,0,0,1,.7-.2c0,.06-.94.36-2.57,1.12a30.68,30.68,0,0,0-6.47,4,31.92,31.92,0,0,0-7.42,8.41,29.87,29.87,0,0,0-2.83,6c-.76,2.18-1.16,4.55-1.78,7a13.48,13.48,0,0,1-3.29,6.45,20.61,20.61,0,0,1-5.7,3.61,22.47,22.47,0,0,0-5.13,3.09,9.6,9.6,0,0,0-1.7,2.06,8.32,8.32,0,0,0-.84,2.32,9.33,9.33,0,0,0,.23,4.23,8.55,8.55,0,0,0,1.48,2.87A10.69,10.69,0,0,0,237.1,234.68Z" style="fill: rgb(38, 50, 56); transform-origin: 251.968px 208.185px;" id="el0n35jlgvqmbc" class="animable"></path><path d="M328.42,229.62c-.05,0,.42-.48,1.06-1.43a12.1,12.1,0,0,0,1.78-4.43,16.79,16.79,0,0,0-.25-7.06,28.43,28.43,0,0,0-3.58-7.95c-1.65-2.65-3.43-5.05-4.93-7.32a41.28,41.28,0,0,1-3.53-6.32,20.84,20.84,0,0,1-1.45-4.67,12,12,0,0,1-.16-1.32,1.61,1.61,0,0,1,0-.46s.12.63.37,1.74A23.51,23.51,0,0,0,319.3,195a45,45,0,0,0,3.6,6.2c1.51,2.25,3.31,4.64,5,7.32a28.21,28.21,0,0,1,3.61,8.11,16.85,16.85,0,0,1,.14,7.25,11.59,11.59,0,0,1-2,4.47,7.79,7.79,0,0,1-.88,1A1.68,1.68,0,0,1,328.42,229.62Z" style="fill: rgb(38, 50, 56); transform-origin: 324.661px 209.14px;" id="elgvqmbj7in2r" class="animable"></path><path d="M224.55,369l-8.21,14.29s-40.81-14.93-64.7-10.58c-9.09,1.65-18.81,22.26-5.57,35.5,12.91,12.91,36,31.17,79.33,37.08,1.08.14,18.83,3.95,17.73,3.82s24.88,4,24.88,4l6.1-23.06,48.39,7.59c28.52-1.94,42.48-32.44,25.3-42.26-16-9.15-46.14-9.89-46.14-9.89l-10.92-17.12Z" style="fill: rgb(38, 50, 56); transform-origin: 247.448px 410.74px;" id="elqrohe2fm2im" class="animable"></path><path d="M269,454c.12-.78.47-2.88,1.17-7.19.39-2.3.86-5.1,1.47-8.32.31-1.62.65-3.33,1.06-5.14.21-.91.43-1.83.7-2.78.13-.47.27-.94.44-1.42a4.21,4.21,0,0,1,.74-1.42l.07.35c-10.3-3.66-23.18-8.49-36.9-14.28-8.44-3.59-16.4-7.21-23.41-11a76,76,0,0,1-9.6-5.95c-2.84-2.1-5.38-4.2-7.76-6-4.7-3.72-9-6.12-12.17-7.14a20.67,20.67,0,0,0-2.13-.63,12.88,12.88,0,0,0-1.59-.34l-1-.18-.34-.08a1.54,1.54,0,0,1,.35,0l1,.13a11.71,11.71,0,0,1,1.62.29,18.45,18.45,0,0,1,2.16.59,29.22,29.22,0,0,1,5.6,2.49,58,58,0,0,1,6.73,4.55c2.4,1.81,4.94,3.89,7.79,6a75.78,75.78,0,0,0,9.57,5.88c7,3.74,14.95,7.35,23.38,10.93,13.71,5.78,26.57,10.65,36.84,14.36l.29.11-.22.24a4.13,4.13,0,0,0-.63,1.26c-.17.46-.31.93-.45,1.39-.27.93-.5,1.86-.71,2.75-.42,1.8-.78,3.51-1.1,5.12-.64,3.22-1.14,6-1.56,8.3s-.76,4.05-1,5.3c-.12.61-.21,1.08-.29,1.39A3.39,3.39,0,0,1,269,454Z" style="fill: rgb(69, 90, 100); transform-origin: 227.415px 418.235px;" id="elbzoobkztn2e" class="animable"></path><path d="M338.42,398.18l-.27,0-.75-.12c-.66-.09-1.62-.33-2.89-.46a56.27,56.27,0,0,0-10.73-.38,80.11,80.11,0,0,0-15.72,2.6c-2.9.77-5.92,1.69-9,2.76s-6.24,2.3-9.47,3.59a87.05,87.05,0,0,1-9.65,3.19c-3.17.87-6.26,1.55-9.22,2.12-5.92,1.16-11.31,1.87-15.83,2.42s-8.19.92-10.72,1.18l-2.92.29-.76.06a.86.86,0,0,1-.26,0l.25,0,.76-.11,2.9-.39,10.7-1.34c4.52-.6,9.89-1.35,15.78-2.53,2.95-.58,6-1.27,9.18-2.15a89.71,89.71,0,0,0,9.6-3.17c3.22-1.29,6.39-2.53,9.5-3.59s6.13-2,9.05-2.75a77.91,77.91,0,0,1,15.82-2.49,52.93,52.93,0,0,1,10.78.54c1.27.16,2.22.44,2.88.56l.75.17A.9.9,0,0,1,338.42,398.18Z" style="fill: rgb(69, 90, 100); transform-origin: 289.325px 406.139px;" id="eld5mnnriodj7" class="animable"></path><path d="M263.86,389.88c0,.34-2.16.89-5.79,1.23a75.7,75.7,0,0,1-28.12-3c-3.47-1.1-5.5-2.11-5.4-2.44.23-.72,8.8,1.56,19.6,2.68S263.79,389.12,263.86,389.88Z" style="fill: rgb(38, 50, 56); transform-origin: 244.203px 388.447px;" id="el3yxzrfmx0ay" class="animable"></path><path d="M302.12,385.83a11,11,0,0,1-1.6.43,18.55,18.55,0,0,0-1.87.48c-.72.21-1.55.43-2.44.75a60.77,60.77,0,0,0-6.18,2.45c-2.26,1.08-4.7,2.36-7.19,3.84a113.51,113.51,0,0,0-12.11,8.52c-1.48,1.18-2.67,2.16-3.48,2.84a9.48,9.48,0,0,1-1.31,1,11.09,11.09,0,0,1,1.17-1.17c.78-.73,1.93-1.75,3.39-3a96.26,96.26,0,0,1,12.08-8.69,76.78,76.78,0,0,1,7.25-3.82,52.76,52.76,0,0,1,6.27-2.37c.9-.3,1.74-.5,2.48-.68a16.38,16.38,0,0,1,1.9-.4A9.6,9.6,0,0,1,302.12,385.83Z" style="fill: rgb(69, 90, 100); transform-origin: 284.03px 395.985px;" id="elprvehnc3tse" class="animable"></path><path d="M256.75,406.16a11.56,11.56,0,0,1-2.87-.82,61.64,61.64,0,0,1-6.55-2.95L241,399.06a22.47,22.47,0,0,1-2.61-1.42,14.57,14.57,0,0,1,2.78,1.09c1.67.76,3.93,1.92,6.42,3.19s4.76,2.37,6.45,3.08S256.77,406.08,256.75,406.16Z" style="fill: rgb(69, 90, 100); transform-origin: 247.57px 401.9px;" id="el42xc3wjyouk" class="animable"></path><path d="M261.16,370.72c.08,0-.06,1.5-.21,3.91s-.29,5.74-.22,9.42.34,7,.58,9.42a38.93,38.93,0,0,1,.37,3.9,3.82,3.82,0,0,1-.26-1c-.14-.66-.3-1.63-.47-2.83a79.87,79.87,0,0,1-.74-9.45,82.17,82.17,0,0,1,.37-9.46c.13-1.21.25-2.18.36-2.85A4.45,4.45,0,0,1,261.16,370.72Z" style="fill: rgb(69, 90, 100); transform-origin: 260.938px 384.045px;" id="el2umb5f713u1" class="animable"></path><path d="M265.71,372.2s-.18.16-.43.46a2.84,2.84,0,0,0-.64,1.47,2.77,2.77,0,0,0,.63,2.19,2.58,2.58,0,0,0,4.27-1.58,2.79,2.79,0,0,0-1-2.07,2.83,2.83,0,0,0-1.44-.7c-.39-.06-.61,0-.62-.07s.21-.13.64-.13a2.75,2.75,0,0,1,1.66.62,3,3,0,0,1,1.19,2.36,3,3,0,0,1-5.1,1.89,3.06,3.06,0,0,1-.63-2.57,2.76,2.76,0,0,1,.86-1.56C265.46,372.24,265.7,372.18,265.71,372.2Z" style="fill: rgb(69, 90, 100); transform-origin: 267.072px 374.639px;" id="el5drxon8zddd" class="animable"></path><path d="M278.13,355.73a5.7,5.7,0,0,1-.78,1,30.38,30.38,0,0,1-2.4,2.54,37.45,37.45,0,0,1-4,3.31,43.41,43.41,0,0,1-5.45,3.29,42.5,42.5,0,0,1-5.9,2.37,38,38,0,0,1-5.06,1.2,28.62,28.62,0,0,1-3.47.39,6.62,6.62,0,0,1-1.28,0c0-.1,1.81-.2,4.69-.76a44.11,44.11,0,0,0,5-1.3A42.74,42.74,0,0,0,274.7,359C276.88,357.06,278.05,355.67,278.13,355.73Z" style="fill: rgb(38, 50, 56); transform-origin: 263.96px 362.795px;" id="elxvho4755av" class="animable"></path><path d="M296.38,366.83c0,.15-1.8.15-3.92.69s-3.72,1.34-3.8,1.21a10.39,10.39,0,0,1,7.72-1.9Z" style="fill: rgb(38, 50, 56); transform-origin: 292.52px 367.728px;" id="ely47a4juqg5p" class="animable"></path><g id="elvyntmz93t5s"><g style="opacity: 0.3; transform-origin: 271.61px 362.901px;" class="animable" id="el1uiri60jtkh"><path d="M254.41,369.33a38.3,38.3,0,0,0,22.29-12.88,9,9,0,0,1-2.19,9.18c2.54,1.2,5.52.4,8.3,0s6.18,0,7.51,2.47a294,294,0,0,1-37.42,1.07" id="eljpe2yebwswc" class="animable" style="transform-origin: 271.61px 362.901px;"></path></g></g><path d="M229.58,349.73a14.05,14.05,0,0,0-4.31-2.79,13.86,13.86,0,0,0-5.47-.93,15,15,0,0,0-6.53,1.76c-4.36,2.26-7,6.12-8.92,8.59a26.72,26.72,0,0,0-2,3.26,8.08,8.08,0,0,1-.69,1.22,7,7,0,0,1,.51-1.31,22,22,0,0,1,1.84-3.38c.93-1.34,2.13-2.84,3.51-4.48A19.48,19.48,0,0,1,213,347.3a15.16,15.16,0,0,1,6.77-1.77,13.84,13.84,0,0,1,5.62,1.07,10.71,10.71,0,0,1,3.24,2.07,5.69,5.69,0,0,1,.72.76C229.52,349.62,229.6,349.72,229.58,349.73Z" style="fill: rgb(38, 50, 56); transform-origin: 215.622px 353.184px;" id="eln9m24bu0nv" class="animable"></path><polygon points="255.76 253.81 241.8 256.78 248.78 282.91 273.5 288.22 290.46 276.19 292.79 261.78 278.25 256.28 255.76 253.81" style="fill: rgb(255, 190, 157); transform-origin: 267.295px 271.015px;" id="eljooxn5lrqbq" class="animable"></polygon><path d="M245.93,255.71s9.45,27.44,26.91,24.9,16-20.32,16-20.32,18.22,5.56,23.85,11.47S315,290.52,315,290.52l-4.72,23.22L300,358.22s3.93,12.14-6.12,15.14l-3.17-5-60.27,1.7s-12.89,14.86-16.91,9.74-7.88-15.12-7.88-15.12L233.34,259Z" style="fill: rgb(69, 90, 100); transform-origin: 260.811px 318.292px;" id="elrl6e50e0ks9" class="animable"></path><path d="M307.93,268.25c.49.28,42.79,31,42.79,31s-3.32,25.28,17,21.26c0,0-8.2,21.14-19.3,16.7-3.16-1.26-42.15-25.93-42.15-25.93L298,293.67Z" style="fill: rgb(69, 90, 100); transform-origin: 332.86px 303.036px;" id="elizahxzc27l" class="animable"></path><path d="M245.93,257.06s-1,0-2.57.18c-8.28.8-38.84,7.13-41.67,28.7-1.48,11.28-1.9,44.27-3.5,58.1,0,0,2.55,19.22,3.5,22.78C203.38,373.16,234,363,234,363l.06-61L245,257.09" style="fill: rgb(69, 90, 100); transform-origin: 222.06px 312.981px;" id="elta0glfe1klo" class="animable"></path><path d="M226.59,312.48a1.47,1.47,0,0,1,0,.49,13.17,13.17,0,0,0,.1,1.42,20.48,20.48,0,0,0,1.29,5c.78,2.06,2,4.4,3.16,7.08a32,32,0,0,1,1.6,4.34,26.56,26.56,0,0,1,.83,4.89,58.1,58.1,0,0,1-.25,9.54c-.25,2.92-.49,5.55-.85,7.74a34.46,34.46,0,0,1-1.21,5.11c-.2.59-.37,1-.5,1.34a1.72,1.72,0,0,1-.22.45s.19-.66.53-1.85a38.81,38.81,0,0,0,1-5.11c.32-2.18.52-4.8.75-7.71a62.46,62.46,0,0,0,.2-9.47,26.29,26.29,0,0,0-.8-4.8,32.65,32.65,0,0,0-1.55-4.28c-1.16-2.67-2.32-5.05-3.07-7.14a18.6,18.6,0,0,1-1.14-5.14,8.34,8.34,0,0,1,0-1.43A2.75,2.75,0,0,1,226.59,312.48Z" style="fill: rgb(38, 50, 56); transform-origin: 230.045px 336.18px;" id="ele6rzuv85m64" class="animable"></path><path d="M228,304.78c.09,0,.16,1.55.51,4a53.61,53.61,0,0,0,2.23,9.49c.31.91.63,1.78,1,2.62a5.58,5.58,0,0,0,.25.57l.36.55a12.93,12.93,0,0,1,.64,1.13,9.47,9.47,0,0,1,1.13,4.32,7.71,7.71,0,0,1-.59,3,4.3,4.3,0,0,1-.55,1,10.39,10.39,0,0,0,.77-3.9,9.41,9.41,0,0,0-1.18-4.11c-.19-.36-.41-.72-.64-1.08l-.36-.55a3.64,3.64,0,0,1-.3-.65c-.35-.84-.67-1.73-1-2.64a45,45,0,0,1-2.1-9.62c-.14-1.25-.18-2.28-.19-3A4.86,4.86,0,0,1,228,304.78Z" style="fill: rgb(38, 50, 56); transform-origin: 231.038px 318.12px;" id="eltk7vvnx2wsj" class="animable"></path><path d="M229.22,295.62c-.08,0-.54-1.25-1.44-3.22a45.27,45.27,0,0,0-4.23-7.34,46,46,0,0,0-5.55-6.39c-1.57-1.5-2.63-2.35-2.57-2.42a3.58,3.58,0,0,1,.8.52,24.87,24.87,0,0,1,2,1.63,37.87,37.87,0,0,1,9.87,13.85c.41,1,.71,1.85.88,2.44A3.86,3.86,0,0,1,229.22,295.62Z" style="fill: rgb(38, 50, 56); transform-origin: 222.324px 285.935px;" id="elrig3nn18m19" class="animable"></path><path d="M315.89,277.7a11.28,11.28,0,0,1-.2,2.42c-.18,1.49-.44,3.54-.67,5.81s-.42,4.33-.55,5.83a11.59,11.59,0,0,1-.3,2.41,10.87,10.87,0,0,1-.07-2.43c0-1.51.16-3.58.4-5.86s.55-4.34.82-5.81A10.86,10.86,0,0,1,315.89,277.7Z" style="fill: rgb(38, 50, 56); transform-origin: 314.978px 285.935px;" id="elmkilf1202vg" class="animable"></path><path d="M324.59,303.38c0,.09-1.32.22-3.37.8a15.93,15.93,0,0,0-7.05,4.13,19.47,19.47,0,0,0-2.69,3.66,28,28,0,0,0-1.54,3.4l-.49,1.36c-.12.37-.22.72-.32,1a3.62,3.62,0,0,1-.33.88,2.81,2.81,0,0,1,.14-.93l.23-1.07.42-1.4a24.23,24.23,0,0,1,1.47-3.51A18.45,18.45,0,0,1,313.8,308a15.14,15.14,0,0,1,7.32-4.12,10.48,10.48,0,0,1,1.44-.29,9,9,0,0,1,1.09-.14A3,3,0,0,1,324.59,303.38Z" style="fill: rgb(38, 50, 56); transform-origin: 316.695px 310.99px;" id="elm35p3rdu54" class="animable"></path><path d="M352.6,331.21a6,6,0,0,1-.67-1.12c-.21-.36-.45-.82-.7-1.37s-.55-1.15-.81-1.86a36.43,36.43,0,0,1-1.61-5.05,41.37,41.37,0,0,1-1-6.43,40.7,40.7,0,0,1,.11-6.49,37.39,37.39,0,0,1,.92-5.22c.16-.74.39-1.39.56-2a12.57,12.57,0,0,1,.5-1.45,6.24,6.24,0,0,1,.52-1.2c.1,0-.57,1.77-1.22,4.69a42.5,42.5,0,0,0-.8,5.18,45.25,45.25,0,0,0-.08,6.42,44.75,44.75,0,0,0,.94,6.35,41.91,41.91,0,0,0,1.48,5C351.8,329.53,352.69,331.17,352.6,331.21Z" style="fill: rgb(38, 50, 56); transform-origin: 350.168px 315.115px;" id="el93gaqtsbun5" class="animable"></path><path d="M341.61,323.7a4.22,4.22,0,0,1-.4-1.07,21.1,21.1,0,0,1-.62-3,23.66,23.66,0,0,1,.94-10.16,23,23,0,0,1,5.11-8.84,4.38,4.38,0,0,1,2.75-1.48,1.94,1.94,0,0,1,.85.17c.17.09.26.15.25.17a3,3,0,0,0-1.09-.14,4.45,4.45,0,0,0-2.49,1.53,24.33,24.33,0,0,0-4.88,8.74,25.52,25.52,0,0,0-1.08,10C341.21,322.12,341.7,323.67,341.61,323.7Z" style="fill: rgb(38, 50, 56); transform-origin: 345.448px 311.425px;" id="el6575ivym2yv" class="animable"></path><path d="M272.84,318.72a4.71,4.71,0,0,1-.25,1.19,11.79,11.79,0,0,1-.4,1.36,18.52,18.52,0,0,1-.67,1.76,27.91,27.91,0,0,1-2.28,4.34,29.6,29.6,0,0,1-8.37,8.56,28.22,28.22,0,0,1-4.29,2.39,16.74,16.74,0,0,1-1.75.7,9.05,9.05,0,0,1-1.35.44,6,6,0,0,1-1.18.28c0-.1,1.64-.55,4.12-1.75a31.43,31.43,0,0,0,4.18-2.45,35.56,35.56,0,0,0,4.52-3.82,34.7,34.7,0,0,0,3.71-4.61,30.69,30.69,0,0,0,2.35-4.23C272.33,320.37,272.74,318.69,272.84,318.72Z" style="fill: rgb(38, 50, 56); transform-origin: 262.57px 329.23px;" id="els87bxwar3b" class="animable"></path><g id="elir33vf4psw"><g style="opacity: 0.3; transform-origin: 234.836px 337.774px;" class="animable" id="ell4w71x9709j"><path d="M238.21,328.62l-5.76-21c-.28-1-.75-2.23-1.8-2.42a2,2,0,0,0-2.05,1.72,11.27,11.27,0,0,0,0,3.07c.45,4.57.81,7.67,2.94,11.21,4.15,6.9,1.42,10.25,1.42,10.25.33,8.4-.38,19.86-3,28.49l2.47,10.41c2.34-7.74,7.69-14.19,8.59-22.23C241.71,341.53,240,335,238.21,328.62Z" id="elpe8wry9iryi" class="animable" style="transform-origin: 234.836px 337.774px;"></path></g></g><g id="elrxzs2zsjmh"><g style="opacity: 0.3; transform-origin: 320.105px 318.684px;" class="animable" id="el99whug4xlzr"><path d="M310.3,313.88c6.85,3.56,12.94,8.48,19.61,12.29-2.61-5.45-7-10.84-12.28-13.73a7.77,7.77,0,0,0-4.64-1.23c-1.62.23-2.78,1.14-2.53,2.75" id="elwn0jo8x0juj" class="animable" style="transform-origin: 320.105px 318.684px;"></path></g></g><g id="elxw999bz426"><g style="opacity: 0.3; transform-origin: 345.167px 311.626px;" class="animable" id="elyf41o8uya8l"><path d="M349.55,298.81c-2.34-.06-4.1,2.07-5.25,4.11A31.61,31.61,0,0,0,340.52,322c.14,1.18.58,2.6,1.75,2.83a2,2,0,0,0,2.07-1.23,5.68,5.68,0,0,0,.39-2.53c0-4-.28-8.05.3-12s2.07-7.95,5-10.66" id="eloo802yjy4x" class="animable" style="transform-origin: 345.167px 311.626px;"></path></g></g><path d="M243.78,306.32l.24,0,.69-.05,2.71-.14,10.24-.47,36.27-1.54h.24v.23c.3,12.2.65,26.24,1,41.1l0,1.49v.26H295a355.05,355.05,0,0,0-44.66,3.34l-.19,0-.05-.19a159.68,159.68,0,0,1-5.33-32.16c-.24-3.94-.28-7-.28-9.14,0-1,0-1.86,0-2.41l0-.61c0-.14,0-.21,0-.21a.85.85,0,0,1,0,.21l0,.62c0,.56,0,1.37,0,2.4,0,2.11.13,5.2.4,9.12a164.15,164.15,0,0,0,5.5,32.07l-.25-.17A347.5,347.5,0,0,1,295,346.64l-.26.27,0-1.49c-.35-14.86-.67-28.9-1-41.1l.24.23-36.28,1.35-10.25.34-2.71.08h-.93Z" style="fill: rgb(255, 255, 255); transform-origin: 269.475px 327.33px;" id="el5xi2z1c4nip" class="animable"></path><path d="M257,336.63c-.14,0-1.39-6.73-2.79-15.09s-2.42-15.15-2.28-15.18,1.39,6.73,2.79,15.1S257.1,336.61,257,336.63Z" style="fill: rgb(255, 255, 255); transform-origin: 254.462px 321.495px;" id="elr55qlf7404" class="animable"></path><path d="M258.46,349.53a30.08,30.08,0,0,1-1.11-5.45,30.52,30.52,0,0,1-.6-5.54,30.08,30.08,0,0,1,1.11,5.46A28.39,28.39,0,0,1,258.46,349.53Z" style="fill: rgb(255, 255, 255); transform-origin: 257.605px 344.035px;" id="eln2ucq8o5b1a" class="animable"></path><path d="M267.08,329.94a3.07,3.07,0,0,1-.28-.93c-.15-.6-.34-1.49-.55-2.58-.42-2.19-.89-5.23-1.23-8.61s-.47-6.46-.5-8.68c0-1.12,0-2,0-2.64a4.29,4.29,0,0,1,.09-1,27.57,27.57,0,0,1,.25,3.59c.12,2.22.31,5.28.65,8.65s.75,6.4,1.07,8.6A30.41,30.41,0,0,1,267.08,329.94Z" style="fill: rgb(255, 255, 255); transform-origin: 265.799px 317.72px;" id="elrrf1swtpckn" class="animable"></path><path d="M265.94,348.19a49.6,49.6,0,0,1-1.13-7.07,47.33,47.33,0,0,1-.62-7.13,49.93,49.93,0,0,1,1.13,7.07A47.33,47.33,0,0,1,265.94,348.19Z" style="fill: rgb(255, 255, 255); transform-origin: 265.065px 341.09px;" id="eljfuokstl1t" class="animable"></path><path d="M277.24,347.38a11.93,11.93,0,0,1-.2-1.65l-.39-4.5c-.33-3.79-.82-9-1.48-14.81s-1.38-11-1.92-14.77c-.26-1.82-.48-3.33-.64-4.47a10.87,10.87,0,0,1-.18-1.65,9.27,9.27,0,0,1,.38,1.62c.21,1,.48,2.56.8,4.44.64,3.77,1.41,9,2.08,14.77s1.09,11,1.33,14.85c.11,1.9.19,3.44.22,4.51A8.82,8.82,0,0,1,277.24,347.38Z" style="fill: rgb(255, 255, 255); transform-origin: 274.855px 326.455px;" id="eldfva3j0dlb" class="animable"></path><path d="M286.86,347.92a10.31,10.31,0,0,1-.08-1.68c0-1.17,0-2.72,0-4.58,0-3.86-.14-9.2-.41-15.08s-.69-11.21-1-15.06c-.16-1.85-.29-3.39-.39-4.55a11.67,11.67,0,0,1-.09-1.68,9.13,9.13,0,0,1,.29,1.65c.16,1.07.35,2.63.56,4.55.42,3.84.88,9.17,1.17,15.06s.32,11.24.26,15.11c0,1.93-.07,3.5-.12,4.58A11.51,11.51,0,0,1,286.86,347.92Z" style="fill: rgb(255, 255, 255); transform-origin: 286.042px 326.605px;" id="elwrjdm1tf3li" class="animable"></path><g id="eljfcaw8nzsbo"><g style="opacity: 0.3; transform-origin: 262.908px 330.748px;" class="animable" id="elvx44ynfojr"><path d="M253.09,339.81a8.39,8.39,0,0,0,5.27,1.28,16.74,16.74,0,0,0,5.32-1.39,16.07,16.07,0,0,0,6.05-4,14.07,14.07,0,0,0,3-7.08,41.57,41.57,0,0,0,.26-7.81.51.51,0,0,0-.08-.32.39.39,0,0,0-.56,0,1.25,1.25,0,0,0-.31.55,29,29,0,0,1-19.29,18.24" id="elnu2e0oq29lo" class="animable" style="transform-origin: 262.908px 330.748px;"></path></g></g><path d="M246.9,423.57l-6.11-11.46L227.05,347.8s-12.64-7.26-23,8.65c-.41.64,14.24,46.7,18.33,59.51l.57,12.26s-.72,14.51,0,15.78a5.9,5.9,0,0,0,2.54,2s-.54,3.63,3.63,4c0,0,.36,4,3.44,3.45a5.93,5.93,0,0,0,4.18-2.54s0,5.07,2.72,4.53,3.16-2.72,3.66-3.44,1.08-8.17,1.08-8.17l-.05-12.28,7.08,5.74c2,1,5.05,2.28,6.75.75Z" style="fill: rgb(255, 190, 157); transform-origin: 231.011px 400.814px;" id="el6gx8hb8rrw7" class="animable"></path><path d="M244.16,430.92a22.1,22.1,0,0,1,.4,6.62c-.08,1.7-.15,3.25-.22,4.67a7.63,7.63,0,0,1-.18,1.93,30.66,30.66,0,0,1-.12-6.62C244.22,433.88,244,430.94,244.16,430.92Z" style="fill: rgb(235, 153, 110); transform-origin: 244.283px 437.53px;" id="elslu5eh6d31d" class="animable"></path><path d="M236.36,439.48a71.1,71.1,0,0,1,.16,12.15,71.1,71.1,0,0,1-.16-12.15Z" style="fill: rgb(235, 153, 110); transform-origin: 236.44px 445.555px;" id="elwaik2yz3iyd" class="animable"></path><path d="M229.82,441.71a16.54,16.54,0,0,1-.81,8.4c-.14,0,.22-1.89.43-4.2A38.4,38.4,0,0,1,229.82,441.71Z" style="fill: rgb(235, 153, 110); transform-origin: 229.507px 445.91px;" id="elted58pwn689" class="animable"></path><path d="M225.61,440.29a14.59,14.59,0,0,1-.54,5.47,7.28,7.28,0,0,1,0-2.76A7.61,7.61,0,0,1,225.61,440.29Z" style="fill: rgb(235, 153, 110); transform-origin: 225.304px 443.025px;" id="ellweqz707wg" class="animable"></path></g><g id="freepik--speech-bubble--inject-5" class="animable animator-hidden" style="transform-origin: 194.472px 150.799px;"><path d="M239.34,189.73l-9.2-16.22a43.44,43.44,0,1,0-10.41,11.58v0Z" style="fill: rgb(255, 255, 255); transform-origin: 194.526px 150.729px;" id="elkgzqnk8e2z8" class="animable"></path><path d="M239.34,189.73l-19.65-4.5a.12.12,0,0,1-.1-.15s0,0,0-.05l0,0,.18.18a44.09,44.09,0,0,1-8.92,5.38A43.48,43.48,0,0,1,199,194a38.66,38.66,0,0,1-6.86.34c-1.19-.06-2.39-.09-3.6-.19l-3.67-.56a43.76,43.76,0,0,1-27.11-17.4,43.29,43.29,0,0,1-7.33-16.76,44.23,44.23,0,0,1,.51-19.3,42.84,42.84,0,0,1,9.3-17.84l1.77-2c.59-.66,1.28-1.2,1.91-1.8s1.26-1.21,2-1.71l2.08-1.56a18.35,18.35,0,0,1,2.16-1.43l2.2-1.33,2.3-1.12a20.19,20.19,0,0,1,2.33-1,44.2,44.2,0,0,1,19.44-3,42.71,42.71,0,0,1,17.85,5.27A44,44,0,0,1,234.83,138a46.71,46.71,0,0,1,1.89,14.11,43.32,43.32,0,0,1-2.12,12.18,44.1,44.1,0,0,1-4.36,9.34v-.13l9.09,16.28L230,173.57a.13.13,0,0,1,0-.12,44.18,44.18,0,0,0,4.27-9.3,42.85,42.85,0,0,0,2.06-12.1,46.8,46.8,0,0,0-1.91-14A43.67,43.67,0,0,0,214,113a42.31,42.31,0,0,0-17.65-5.19,43.77,43.77,0,0,0-19.22,3,20.47,20.47,0,0,0-2.3,1l-2.27,1.1-2.18,1.32a18.69,18.69,0,0,0-2.13,1.41l-2.06,1.54c-.7.5-1.29,1.14-1.94,1.7s-1.31,1.12-1.88,1.77l-1.75,1.93a42.33,42.33,0,0,0-9.2,17.63,43.8,43.8,0,0,0-.52,19.07,42.92,42.92,0,0,0,7.23,16.58,43.41,43.41,0,0,0,26.8,17.28l3.63.56c1.2.1,2.39.13,3.56.2a38.24,38.24,0,0,0,6.82-.32,43.12,43.12,0,0,0,11.81-3.32,44,44,0,0,0,8.89-5.29.13.13,0,0,1,.19,0,.15.15,0,0,1,0,.16l0,0-.07-.21Z" style="fill: rgb(38, 50, 56); transform-origin: 194.472px 150.799px;" id="elenxgkdydi2" class="animable"></path><path d="M180.45,142.54a6,6,0,0,0-2.16-.56,6.46,6.46,0,0,0-5.95,2.2c4.69,2.72,11.08,6.33,15.65,8.94l5.77-3.3C189.6,147.53,184.38,144.65,180.45,142.54Z" style="fill: #FFB400; transform-origin: 183.05px 147.509px;" id="elvcv4xa3ookm" class="animable"></path><g id="elj60jv3zu5rk"><g style="opacity: 0.3; transform-origin: 183.05px 147.509px;" class="animable" id="elqfeqmyu9py"><path d="M180.45,142.54a6,6,0,0,0-2.16-.56,6.46,6.46,0,0,0-5.95,2.2c4.69,2.72,11.08,6.33,15.65,8.94l5.77-3.3C189.6,147.53,184.38,144.65,180.45,142.54Z" id="elw872mrnqwo" class="animable" style="transform-origin: 183.05px 147.509px;"></path></g></g><path d="M198.12,159.2l-.21-.18c-1.44-.83-3-2.41-4.42-2.38-.55,0-1.15.49-2.58,1.29-2.38,1.35-6.39,3.7-8.79,5-2,1.13-4.54,2-6.87,1.24a9.84,9.84,0,0,1-3.22-1.95l26.08-15.12c-.13-.39-.27-.76-.4-1.14a7.47,7.47,0,1,1,6.25,5,3.41,3.41,0,0,0-1.74.35c-1,.48-1.92,1.09-3.11,1.77,2,.9,3.37,2.34,5.72,2.12,3.24-.3,6.11,2.05,7.1,5.18a7.44,7.44,0,0,1-2.78,8.27,7.47,7.47,0,0,1-11.44-8.44C197.83,159.92,198,159.58,198.12,159.2Zm6.66-12a3.57,3.57,0,0,0,3.61-3.64,3.62,3.62,0,0,0-3.58-3.56,3.68,3.68,0,0,0-3.64,3.66A3.63,3.63,0,0,0,204.78,147.18Zm0,19.08a3.62,3.62,0,0,0,3.65-3.49,3.56,3.56,0,0,0-3.54-3.71,3.64,3.64,0,0,0-3.68,3.47A3.68,3.68,0,0,0,204.74,166.26Z" style="fill: #FFB400; transform-origin: 192.149px 153.058px;" id="el89m13gulv24" class="animable"></path><path d="M195.08,153c-.09,0-.05-.67-.79-1.2a1.52,1.52,0,0,0-1.41-.17,1.48,1.48,0,0,0,0,2.75,1.52,1.52,0,0,0,1.41-.17c.74-.53.7-1.23.79-1.21s.08.16,0,.44a1.67,1.67,0,0,1-.6,1.06,1.87,1.87,0,0,1-1.8.33,1.93,1.93,0,0,1,0-3.65,1.87,1.87,0,0,1,1.8.33,1.65,1.65,0,0,1,.6,1.05C195.16,152.84,195.11,153,195.08,153Z" style="fill: rgb(38, 50, 56); transform-origin: 193.261px 153.005px;" id="el19tmjqzy80a" class="animable"></path><path d="M201.46,151.73a5.15,5.15,0,0,1-.53.35l-1.49.9-4.93,2.9-5,2.84-1.52.84a3.71,3.71,0,0,1-.57.29,4.22,4.22,0,0,1,.53-.36l1.49-.9,4.93-2.89,5-2.84,1.52-.85A4.14,4.14,0,0,1,201.46,151.73Z" style="fill: rgb(38, 50, 56); transform-origin: 194.44px 155.79px;" id="elyvwv5v0v7o" class="animable"></path><path d="M197.12,147.73a2,2,0,0,1-.24.17l-.72.45L193.5,150c-2.24,1.36-5.35,3.22-8.84,5.19l-8.91,5.06L173,161.71l-.74.4-.26.13s.08-.06.24-.16l.72-.44,2.68-1.57,8.89-5.11c3.48-2,6.6-3.81,8.87-5.13l2.69-1.55.74-.42Z" style="fill: rgb(38, 50, 56); transform-origin: 184.56px 154.985px;" id="elt8x9jdcwnl" class="animable"></path></g><g id="freepik--Stars--inject-5" class="animable" style="transform-origin: 528.34px 242.35px;"><polygon points="362.32 202.18 364.22 205.65 367.69 207.55 364.22 209.45 362.32 212.92 360.42 209.45 356.95 207.55 360.42 205.65 362.32 202.18" style="fill: #FFB400; transform-origin: 362.32px 207.55px;" id="eluk8980zadoc" class="animable"></polygon><polygon points="375 154.66 376.97 154.53 378.56 153.35 378.69 155.33 379.87 156.92 377.89 157.05 376.3 158.22 376.17 156.25 375 154.66" style="fill: #FFB400; transform-origin: 377.435px 155.785px;" id="el74gv45hrnox" class="animable"></polygon><polygon points="694.86 312.46 696.83 312.33 698.42 311.15 698.55 313.13 699.73 314.72 697.75 314.85 696.16 316.02 696.03 314.05 694.86 312.46" style="fill: #FFB400; transform-origin: 697.295px 313.585px;" id="elns8s8xz72m" class="animable"></polygon><polygon points="469.55 213.73 471.52 213.6 473.12 212.43 473.25 214.4 474.42 215.99 472.45 216.12 470.85 217.29 470.73 215.32 469.55 213.73" style="fill: #FFB400; transform-origin: 471.985px 214.86px;" id="el3smnm6hls2f" class="animable"></polygon><polygon points="481.57 129.23 483.54 129.1 485.13 127.93 485.26 129.9 486.43 131.49 484.46 131.62 482.87 132.8 482.74 130.82 481.57 129.23" style="fill: #FFB400; transform-origin: 484px 130.365px;" id="eluoz0ga5x7cc" class="animable"></polygon><polygon points="421.02 181.67 424.02 179.94 425.61 176.87 427.34 179.87 430.42 181.47 427.42 183.19 425.82 186.27 424.09 183.27 421.02 181.67" style="fill: #FFB400; transform-origin: 425.72px 181.57px;" id="eldyp7xtyydsk" class="animable"></polygon><polygon points="673.07 352.18 676.07 350.45 677.66 347.38 679.39 350.38 682.46 351.97 679.46 353.7 677.87 356.77 676.14 353.77 673.07 352.18" style="fill: #FFB400; transform-origin: 677.765px 352.075px;" id="el5k9nnthz264" class="animable"></polygon><polygon points="658 297.33 661 295.6 662.6 292.53 664.33 295.53 667.4 297.12 664.4 298.85 662.8 301.93 661.08 298.92 658 297.33" style="fill: #FFB400; transform-origin: 662.7px 297.23px;" id="el4ucwqtprwpw" class="animable"></polygon></g><defs>     <filter id="active" height="200%">         <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>    </filter>    <filter id="hover" height="200%">        <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>            <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>    </filter></defs></svg>
            </p>
            <div class="detail-box">
              
            </div>
          </div>
        </div>
        <div class="col-md-5 px-0">
          <div class="box offer-box2">
            <img src="sales.jpg" alt="">
            <div >
              
              
            </div>
          </div>
          <div class="box offer-box3">
            <img src="discount.png" alt="">
            <div class="detail-box">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end offer section -->

  <!-- product section -->

  <section class="product_section layout_padding">
    
      <div class="container">
        <div class="heading_container heading_center">
        
      </div>

       <h3 align="center" id="blink"><font color="black">Please Scan Tag to Display ID or User Data</font></h3>
       <p id="getUID" hidden></p>


       <div id="show_user_data">
      <form>
        <table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
          <tr>
            <td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
            <b>User Data</b></font></td>
          </tr>
          <tr>
            <td bgcolor="#f9f9f9">
              <table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
                <tr>
                  <td width="113" align="left" class="lf">Name</td>
                  <td style="font-weight:bold">:</td>
                  <td align="left"><?php echo $data['Name'];?></td>
                </tr>
                <tr bgcolor="#f2f2f2">
                  <td align="left" class="lf">Price</td>
                  <td style="font-weight:bold">:</td>
                  <td align="left"><?php echo $data['Price'];?></td>
                </tr>

              </table>
            </td>
          </tr>
        </table>
      </form>
    </div>
        
            <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-7">
         
          </div>
          <div class="firstStyle">
             <div class="border border-gainsboro p-3">

            <h2 class="h6 text-uppercase mb-0">Cart Total: <strong class="cart-total"></strong></h2>
          </div>
          <div class="border border-gainsboro p-3 mt-3 clearfix item">
            <div class="text-lg-left">
              <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
            </div>
            <div class="col-lg-5 col-5 text-lg-left">
              <h3 class="h6 mb-0"><?php echo $data['Name'];?><br>
                <small>Cost: <?php echo $data['Price'];?></small>
              </h3>
            </div>
            <div class="product-price d-none"><?php echo $data['Price'];?></div>
            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
              <label for="pass-quantity" class="pass-quantity">Quantity</label>
              <input class="form-control" type="number" value="1" min="1">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
              <span class="product-line-price"><?php echo $data['Price'];?>
              </span>
            </div>
            <div class="remove-item pt-4">
              <button class="remove-product btn-light">
                Delete
              </button>
            </div>
          </div>

          <div class="border border-gainsboro p-3 mt-3 clearfix item">
            <div class="text-lg-left">
              <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
            </div>
            <div class="col-lg-5 col-5 text-lg-left">
              <h3 class="h6 mb-0" name="proname[]"><?php echo $data['Name'];?> <br><small name="price[]">Cost: <small><?php echo $data['Price'];?></small></small></h3>
            </div>
            <div class="product-price d-none"><?php echo $data['Price'];?></div>
            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
              <label for="pass-quantity" class="pass-quantity">Quantity</label>
              <input class="form-control" type="number" value="1" min="1">
            </div>
            <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
              <span class="product-line-price"><?php echo $data['Price'];?></span>
            </div>
            <div class="remove-item pt-4">
              <button class="remove-product btn-light">
                Delete
              </button>
            </div>
          </div><!-- item -->
        </div>
      </div>

        <div class="calculation">
          <div class="border border-gainsboro px-3">
            <div class="border-bottom border-gainsboro">
              <p class="text-uppercase mb-0 py-3"><strong>Order Summary</strong></p>
            </div>
            <div class="totals-item d-flex align-items-center justify-content-between mt-3">
              <p class="text-uppercase">Subtotal</p>
              <p class="totals-value" id="cart-subtotal"></p>
            </div>
            <div class="totals-item d-flex align-items-center justify-content-between">
              <p class="text-uppercase">Estimated Tax</p>
              <p class="totals-value" id="cart-tax"></p>
            </div>
            <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
              <p class="text-uppercase"><strong>Total</strong></p>
              <p class="totals-value font-weight-bold cart-total"></p>
            </div>
          </div>
          <a href="Checkout.php" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0"> 
              <!-- container style for the button class= btn-box -->
      Pay Now <span class="totals-value cart-total"></span> </a>
        </div>

      </div>

        <script>
      $(document).ready(function() {

        /* Set rates + misc */
        var taxRate = 0.05;
        var fadeTime = 300;

        $('.pass-quantity input').change(function() {
          updateQuantity(this);
        });

        $('.remove-item button').click(function() {
          removeItem(this);
        });


        /* Recalculate cart */
        function recalculateCart() {
          var subtotal = 0;

          /* Sum up row totals */
          $('.item').each(function() {
            subtotal += parseFloat($(this).children('.product-line-price').text());
          });

          /* Calculate totals */
          var tax = subtotal * taxRate;
          var total = subtotal + tax;

          /* Update totals display */
          $('.totals-value').fadeOut(fadeTime, function() {
            $('#cart-subtotal').html(subtotal.toFixed(2));
            $('#cart-tax').html(tax.toFixed(2));
            $('.cart-total').html(total.toFixed(2));
            if (total == 0) {
              $('.checkout').fadeOut(fadeTime);
            } else {
              $('.checkout').fadeIn(fadeTime);
            }
            $('.totals-value').fadeIn(fadeTime);
          });
        }

        /* Update quantity */
        function updateQuantity(quantityInput) {
          /* Calculate line price */
          var productRow = $(quantityInput).parent().parent();
          var price = parseFloat(productRow.children('.product-price').text());
          var quantity = $(quantityInput).val();
          var linePrice = price * quantity;

          /* Update line price display and recalc cart totals */
          productRow.children('.product-line-price').each(function() {
            $(this).fadeOut(fadeTime, function() {
              $(this).text(linePrice.toFixed(2));
              recalculateCart();
              $(this).fadeIn(fadeTime);
            });
          });
        }

        /* Remove item from cart */
        function removeItem(removeButton) {
          /* Remove row from DOM and recalc cart total */
          var productRow = $(removeButton).parent().parent();
          productRow.slideUp(fadeTime, function() {
            productRow.remove();
            recalculateCart();
          });
        }

      });

    </script>

      </form>
    </div>
  </section>

  <!-- end product section -->


  <!-- info section -->

  <section class="info_section ">
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="info_contact ">
              <div class="row">
                <!-- <div class="col-md-3">
                  <a href="#" class="link-box">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                      Location
                    </span>
                  </a>
                </div> -->
                <div class="col-md-5">
                  <a href="#" class="link-box">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                      Call +01 1234567890
                    </span>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="#" class="link-box">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                      demo@gmail.com
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5  col-lg-3 mx-auto">
            <div class="info_form ">
              <!-- <form action="#">
                <input type="email" placeholder="Enter Your Email" />
                <button>
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
              </form> -->
            </div>
          </div>
        </div>
        <div class="info_logo">
          <a class="navbar-brand" href="index.html">
            <span>
              Smart Cart
            </span>
          </a>
        </div>
        <div class="social-box">
          <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

<script>
      var myVar = setInterval(myTimer, 1000);
      var myVar1 = setInterval(myTimer1, 1000);
      var oldID="";
      clearInterval(myVar1);

      function myTimer() {
        var getID=document.getElementById("getUID").innerHTML;
        oldID=getID;
        if(getID!="") {
          myVar1 = setInterval(myTimer1, 500);
          showUser(getID);
          clearInterval(myVar);
        }
      }
      
      function myTimer1() {
        var getID=document.getElementById("getUID").innerHTML;
        if(oldID!=getID) {
          myVar = setInterval(myTimer, 500);
          clearInterval(myVar1);
        }
      }
      
      function showUser(str) {
        if (str == "") {
          document.getElementById("show_user_data").innerHTML = "";
          return;
        } else {
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("show_user_data").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","read tag user data.php?id="+str,true);
          xmlhttp.send();
        }
      }
      
      var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 750); 
    </script>


</body>

</html>