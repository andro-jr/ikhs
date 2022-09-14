<?php
   /**
    * The main template file
    * Template Name: Map template
   */
   
   get_header(); 
   ?>

<style>
        /*  <span class="metadata-marker" style="display: none;" data-region_tag="css"></span>       Set the size of the div element that contains the map */
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
    <script>
        var map;
        var InforObj = [];
        var centerCords = {
            lat: 52.3508,
            lng: 5.2647
        };
        var markersOnMap = [{
                placeName: "Websitebooster",
                url: 'https://staging.ikhouvanshoppen.nl/store/sample-store-1/',
                logo: 'https://staging.ikhouvanshoppen.nl/wp-content/uploads/2021/04/tt.png',
                dir: 'https://www.google.com/maps/dir/34.1030032,-118.4104684/34.059808,-118.368152/@34.0808914,-118.4255989,13z/data=!3m1!4b1',
                LatLng: [{
                    lat: 52.355510,
                    lng: 5.166380
                }]
            },
            {
                placeName: "Colombian taste",
                url: 'https://staging.ikhouvanshoppen.nl/store/sample-store-2/',
                logo: 'https://staging.ikhouvanshoppen.nl/wp-content/uploads/2021/04/tt.png',
                dir: 'https://www.google.com/maps/dir/34.1030032,-118.4104684/34.059808,-118.368152/@34.0808914,-118.4255989,13z/data=!3m1!4b1',
                LatLng: [{
                    lat: 52.151700,
                    lng: 6.045980
                }]
            }
      
        ];

        window.onload = function () {
            initMap();
        };

        function addMarkerInfo() {
            for (var i = 0; i < markersOnMap.length; i++) {
                var temp= markersOnMap[i].url;
                var tempdir= markersOnMap[i].dir;
                var contentString = 
                '<div class="wcfm_map_info_wrapper">' + 
                '<br>'+
                    '<a class="wcfm_map_info_logo" target="_blank"><img width="80" src=\"https://staging.ikhouvanshoppen.nl/wp-content/uploads/2021/04/tt.png" /></a>' + 
                    
                    '<div class="wcfm_map_info_content">' +  
                    '<a class="wcfm_map_info_store" target="_blank">' + markersOnMap[i].placeName + '</a>' +
                    '<a href= '+ temp +' target="_blank">'+ '<p class="wcfm_map_info_addr"> Go to store </p>' + '</a>'+ 
                    '<br><br>'+
                    '<a href= '+ tempdir +' target="_blank">'+ '<p class="wcfm_map_info_addr"> Get Direction </p>' + '</a>'+ 
                    '</div>' +
                    
                '</div>';


                    var icon = {
                                    url: "https://staging.ikhouvanshoppen.nl/wp-content/uploads/2021/05/wcfmmp_map_icon.png", // url
                                    scaledSize: new google.maps.Size(35, 50), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                              
                                };
                const marker = new google.maps.Marker({
                    position: markersOnMap[i].LatLng[0],
                    map: map, 
                    icon: icon
                });

                

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 200
                });

                marker.addListener('click', function () {
                    closeOtherInfo();
                    infowindow.open(marker.get('map'), marker);
                    InforObj[0] = infowindow;



                  // Getting users location
                  if( navigator.geolocation )
                    {
                      navigator.geolocation.getCurrentPosition(Pos);
                    }
                  else
                    {
                     console.log("browser issue");
                    }
                    function Pos(pos){
                      const lat = pos.coords.latitude;
                      const long = pos.coords.longitude;
                      console.log('User current location latitude = '+lat +' longitude = '+long);
                    }


                });
                // marker.addListener('mouseover', function () {
                //     closeOtherInfo();
                //     infowindow.open(marker.get('map'), marker);
                //     InforObj[0] = infowindow;
                // });
                // marker.addListener('mouseout', function () {
                //     closeOtherInfo();
                //     infowindow.close();
                //     InforObj[0] = infowindow;
                // });
            }
        }

        function closeOtherInfo() {
            if (InforObj.length > 0) {
                /* detach the info-window from the marker ... undocumented in the API docs */
                InforObj[0].set("marker", null);
                /* and close it */
                InforObj[0].close();
                /* blank the array */
                InforObj.length = 0;
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: centerCords,
                
            });
            map.setOptions({styles: styles['hide']});
            addMarkerInfo();
        }

        var styles = {
        hide: [
          {
            featureType: 'poi.business',
            stylers: [{visibility: 'off'}]
          },
          {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
            { "visibility": "off" }
            ]
        }
        ]
      };

      if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Here you are.'
      });

      map.setCenter(pos);
    });
  }




    </script>
</head>

<body>
    <!--The div element for the map -->
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2YeMKniOp8PvU2qPj99m7LTedKOEGYUM"></script>

    <?php the_content( ); ?>

</body>

<br><br><br><br><br><br><br><br><br><br>
<?php
get_footer();