<?php
    include("inc/config.php");
?>
<!doctype html>
<html>
    <head>
        <title>CPH Stories by Københavns Museum</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Kortet -->
        <header>
            <div class="content">
                <div class="logo">
                    <img src="img/logo.png" class="bounce" alt="Logo">
                </div>
                <div class="menu">
                    <ul>
                        <li><a class="menuPunkt" id="indsendStory">Indsend story</a></li>
                        <li><a class="menuPunkt" id="omOs">Om Os</a></li>
                        <li><a class="menuPunkt" id="voresApp">Vores App</a></li>
                        <li><a class="menuPunkt" id="kontaktOs">Kontakt Os</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div id="map"></div>

        <!-- Pop-up Modals -->
        <div class="modalBaggrund" id="indsendBoks" style="display: none;">
            <div class="modalBoks indsend">
                <div class="close" id="indsend_luk"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modalIndhold">
                    <form action="?indsend=1" method="POST">
                        <input class="input" type="text" name="fuldeNavn" placeholder="Fulde Navn..">
                        <input class="input" type="text" name="lokation" placeholder="Lokation..">
                        <input class="input" type="text" name="overskrift" placeholder="Overskrift..">
                        <input class="input" type="file" name="fil" accept="image/*">
                        <textarea class="input" name="beskrivelse" rows="6" placeholder="Beskrivelse.."></textarea>
                        <input class="button" type="submit" value="Indsend Story">
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modalBaggrund" id="omOsBoks" style="display: none;">
            <div class="modalBoks omOs">
                <div class="close" id="omOs_luk"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modalIndhold"><br>
                    Her på Københavns Museum, er vi meget interreserede i at høre <b>din</b> historie.<br><br>
                    Det er derfor vi har oprettet denne hjemmeside og en App, hvor det er muligt for jer at uploade jeres billeder eller videoer.<br>
                    Vær med til at dele alle dine bedste minder, med dine venner, familie og mange andre.<br><br>
                    Vi prøver at opnå bedst mulig kommunikation med vores kunder. Vores mål, udover at gøre vores kunder tilfredse, bestræber sig efter, at de skal føle sig, som en del af dette museum.<br><br>
                    Ved at kunne dele deres historier fra deres forskellige dele af hovedstaden, kan de opnå et større udbytte af vores udstillinger. De kan se om andre beskriver værker, som dem, og derved skabe ny kontakt og måske finde ud af, at deres interesser er bredere end hvad de troede.<br><br>
                    Vi vil gerne have vores kunder helt tæt på, og det håber vi, at de også selv synes efter de har fået større indflydelse på vores museum.
                </div>
            </div>
        </div>
        
        <div class="modalBaggrund" id="voresAppBoks" style="display: none;">
            <div class="modalBoks voresApp">
                <div class="close" id="voresApp_luk"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modalIndhold"><br>
                    <img src="img/app.png" style="margin-bottom: 10px;" align="right">
                    Nu kan du hente vores app til din smartphone og følge med på de forskellige stories som vores brugere deler.<br><br>
                    Dette er både en nemmere og hurtigere måde at få adgang til CPH Stories. Både til at se nye billeder, men også selv at kunne tilføje billeder.<br><br>
                    <a href='https://play.google.com/store/apps/details?id=dk.imanov.cphstories&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1' target='_blank'><img alt='Nu på Google Play' src='img/playstore.png' width='250'/></a>
                    <a href='javascript:void(0);'><img alt='Hent på App Store' src='img/appstore.svg' class="appDisable" width='250'/></a><br><br>
                    I kan også benytte jer af QR-Koden til at hente appen.<br>
                    <img src='https://chart.googleapis.com/chart?cht=qr&chl=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Ddk.imanov.cphstories%26pcampaignid%3DMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1&chs=180x180&choe=UTF-8&chld=L|2' rel='nofollow' alt='qr code'>
                </div>
            </div>
        </div>
        
        <div class="modalBaggrund" id="kontaktOsBoks" style="display: none;">
            <div class="modalBoks kontaktOs">
                <div class="close" id="kontaktOs_luk"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modalIndhold">
                    <form action="?kontakt=1" method="POST">
                        <input class="input" type="text" placeholder="Fulde Navn..">
                        <input class="input" type="email" placeholder="E-mail Adresse..">
                        <input class="input" type="text" placeholder="Emne..">
                        <textarea class="input" rows="6" placeholder="Besked.."></textarea>
                        <input class="button" type="submit" name="kontakt" value="Send Besked">
                    </form>
                </div>
            </div>
        </div>
        
        
        <!-- Laver modal bokse til hver story, dette er en simpel løsning, men meget belastende. I fremtiden kunne man f.eks. lave request med ajax, så den ikke oprettede et nyt div til hver story. -->
        <?php
            $hentStories = mysqli_query($con, "SELECT * FROM story ORDER BY id ASC");
            while($row = mysqli_fetch_array($hentStories)){
        ?>
        <div class="modalBaggrund" id="story_<?php echo $row["id"]; ?>" style="display: none;">
            <div class="modalBoks stories">
                <div class="close" id="story_luk_<?php echo $row["id"]; ?>"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modalIndhold">
                    <img src="uploads/<?php echo $row["billede"]; ?>" width="100%">
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=http://kbhmuseum.imanov.dk/%23story_<?php echo $row["id"]; ?>&chs=180x180&choe=UTF-8&chld=L|2" align="right" alt="Vis story på telefonen">
                    Indsendt af: <?php echo $row["bruger"]; ?><br><br>
                    <?php echo $row["beskrivelse"]; ?>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js" type="text/javascript"></script>
        <script type="text/javascript">
            $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyC4jgGZiJA_LS7hPMu3GRHca7A12YWJjhM&callback=initMap");

            function initMap() {
                /* Opsætter selve Google Maps modulet, og centrere kortet ved København */
                var kobenhavn = {lat: 55.691120, lng: 12.494473};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: kobenhavn
                });
                
                /* Indstiller modulet Geocoder, til at kunne konvertere adresse til coordinater */
                var geocoder = new google.maps.Geocoder();
                
                /* Popup med Story information */
                <?php
                    $hentStoryInfo = mysqli_query($con, "SELECT * FROM story ORDER BY id ASC");
                    while($hSI = mysqli_fetch_array($hentStoryInfo)){
                ?>
                $("#story_luk_<?php echo $hSI["id"]; ?>").click(function() {
                    $( "#story_<?php echo $hSI["id"]; ?>" ).fadeOut("slow");
                });

                $("#story_<?php echo $hSI["id"]; ?>").click(function(e) {
                    if (e.target === this) {
                        $( "#story_<?php echo $hSI["id"]; ?>" ).fadeOut("slow");
                    }
                });
                var lokation_<?php echo $hSI["id"]; ?> = "<?php echo $hSI["lokation"]; ?>, København";
                geocoder.geocode( { 'address': lokation_<?php echo $hSI["id"]; ?>}, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude_<?php echo $hSI["id"]; ?> = results[0].geometry.location.lat();
                    var longitude_<?php echo $hSI["id"]; ?> = results[0].geometry.location.lng();
                    var position_<?php echo $hSI["id"]; ?> = {lat: latitude_<?php echo $hSI["id"]; ?>, lng: longitude_<?php echo $hSI["id"]; ?>};
                    }
                                    
                    var storyMarker_<?php echo $hSI["id"]; ?> = new google.maps.Marker({
                      position: position_<?php echo $hSI["id"]; ?>,
                      map: map,
                      title: '<?php echo $hSI["title"]; ?>',
                      icon: 'http://kbhmuseum.imanov.dk/img/m1.png'
                    });
                    
                    storyMarker_<?php echo $hSI["id"]; ?>.addListener('click', function() {
                      $( "#story_<?php echo $hSI["id"]; ?>" ).fadeIn("slow");
                    });
                }); 
                <?php
                    }
                ?>
            }
        </script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>