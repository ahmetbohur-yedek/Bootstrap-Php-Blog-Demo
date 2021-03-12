<?PHP
header("Content-type: text/css");
require_once '../../config/config.php';
?>
.back-to-top {
position: fixed;
bottom: 25px;
right: 25px;
display: none;
}

html,body{
background-image: url("<?PHP echo $bgImageLocation; ?>");
}


.carousel-bg-primary{
background-color: rgba(0,123,255,0.8);

}
.carousel-bg-secondary{
background-color: rgba(108, 117, 125,0.8);

}
.carousel-bg-success{
background-color: rgba(40, 167, 69,0.8);

}
.carousel-bg-danger{
background-color: rgba(220, 53, 69,0.8);

}
.carousel-bg-warning{
background-color: rgba(255, 193, 7, 0.8);

}
.carousel-bg-info{
background-color: rgba(23, 162, 184,0.8);

}
.carousel-bg-light{
background-color: rgba(248, 249, 250,0.8);

}
.carousel-bg-dark{
background-color: rgba(52, 58, 64,0.8);

}
.carousel-bg-white{
background-color: rgba(255,255,255,0.8);

}
