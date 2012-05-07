<head>

    <script>  
        jQuery(window).ready(function(){
            // attempt to get user location
            navigator.geolocation.getCurrentPosition(handle_geolocation_query,handle_errors); 
        });  
 
  
        function handle_errors(error)  
        {  
            switch(error.code)  
            {  
                case error.PERMISSION_DENIED: alert("user did not share geolocation data");  
                    break;  
  
                case error.POSITION_UNAVAILABLE: alert("could not detect current position");  
                    break;  
  
                case error.TIMEOUT: alert("retrieving location timed out");  
                    break;  
  
                default: alert("unknown error retreiving location");  
                    break;  
            }  
        }  
        
        /*
         * Update map with users current location.
         */
        function handle_geolocation_query(position){  
            // construct new latlng variable from the passed lat and lng cordinates
            var latlng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
           
            // get reference to google map
            var googleMap = $('#userMap').gmap3({action:'get', name:'map'});
           
            // center google map on the users current lat/lng cordinates
            googleMap.setCenter(latlng);
               
            // construct and add new marker representing the users current position   
            var marker = new google.maps.Marker({               
                position:latlng,
                title:"You are here!",
                options:{
                    animation: google.maps.Animation.DROP
                },
                map: googleMap
            });
             
            $.get("http://www.toponimo.org/toponimo/place/index", {"lat": position.coords.latitude, "lng": position.coords.longitude });     
            $("#placeresults").html();
            $.fn.yiiListView.update('placeView');
           
           
            /*
            $('#userMap').gmap3({action:'get', name:'map'})({
                action : 'addMarker',
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                callback: function(marker){
                        $this.gmap3({
                            action:'panTo',
                            args:[marker.position]
                        });
             */   
           
            
            
            // var marker = new google.maps.Marker({position: userLatLng, map:map, title: "You are here"});
            //  $.post("http://www.toponimo.org/toponimo/place/updateAjaxMap", {"lat": position.coords.latitude, "lng": position.coords.longitude });
           
        } 
        
    </script>
</head>


<?php
/*
  $this->breadcrumbs=array(
  'Places',
  );
 */


$this->menu = array(
    array('label' => 'Create Place', 'url' => array('create')),
    array('label' => 'Manage Place', 'url' => array('admin')),
);
?>

<!--
<form method="get">
    <input type="search" placeholder="search" name="q" value="<?= isset($_GET['q']) ? CHtml::encode($_GET['q']) : ''; ?>" />
    <input type="submit" value="search" />
</form>

<form method="get">
    <input type="search" placeholder="lat" name="lat" value="<?= isset($_GET['lat']) ? CHtml::encode($_GET['lat']) : ''; ?>" />
    <input type="search" placeholder="lng" name="lng" value="<?= isset($_GET['lng']) ? CHtml::encode($_GET['lng']) : ''; ?>" />
    <input type="submit" value="search" />
</form>
-->

<div id="mapcontainer">
    <!-- <?php $this->renderPartial('_ajaxMap'); ?> -->
    <?php
    /**
     * Google Map Setup and Display
     */
    Yii::import('ext.jquery-gmap.*');
    $gmap = new EGmap3Widget();
    $gmap->id = 'userMap';
    $gmap->setSize(910, 400);
    $options = new EGmap3MapOptions();
    $options->scaleControl = false;
    $options->streetViewControl = false;
    $options->mapTypeControl = false;
    $options->zoom = 6;
    $options->mapTypeId = EGmap3MapTypeId::ROADMAP;
    $zoomOptions = new EGmap3ZoomControlOptions();
    $zoomOptions->style = EGmap3ZoomControlStyle::SMALL;
    $zoomOptions->position = EGmap3ControlPosition::LEFT_TOP;
    $options->zoomControlOptions = $zoomOptions;

    //$marker = new EGmap3Marker(array('title' => "You are here!"));
    //$marker->latLng = array($lat, $lng);
    //center the map on the marker
    //$marker->centerOnMap();
    //$gmap->add($marker);
    $gmap->setOptions($options);
    $gmap->renderMap();
    ?>

</div>

<!--

<?php
//  $this->renderPartial('_placeResults', array(
//  'dataProvider' => $dataProvider));
?>


-->


<div id="placeresults">
    <?php
    // $dp = (isset($_GET['lat'] && isset($_GET['lng] ? 
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'id' => 'placeView',
        'enablePagination' => true,
        'summaryText' => ' Page {page} of {pages}',
        'enableSorting' => true,
        'sorterHeader' => 'Order by:',

    ));
    ?>
</div>





