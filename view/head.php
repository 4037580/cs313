<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Felipe</title>
  <link rel="icon" type="image/png" href="/images/favicon.png"/>
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
  <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>
  <script src="//unslider.com/unslider.min.js"></script>
  <script type="text/javascript">
        $(function() {
            // create the image rotator
            setInterval("rotateImages()", 3000);
        });

        function rotateImages() {
            var oCurPhoto = $('#hero div.current');
            var oNxtPhoto = oCurPhoto.next();
            if (oNxtPhoto.length == 0)
                oNxtPhoto = $('#hero div:first');

            oCurPhoto.removeClass('current').addClass('previous');
            oNxtPhoto.css({ opacity: 0.0 }).addClass('current')
                    .animate({ opacity: 1.0 }, 1000,
                                function() {
                                    oCurPhoto.removeClass('previous');
                                });
        }
    </script>
  <style>
    header  { background-color: #EF6C00;}
    nav,.fixed .nav-inner-most { background-color: #FB8C00;}
    footer  { border-top: 1px solid #FB8C00;}
  </style>
</head>
<body>
