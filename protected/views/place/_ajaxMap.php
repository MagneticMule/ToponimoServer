
<?php

    /**
    * Google Map Setup and Display
    */
    Yii::import('ext.jquery-gmap.*');
    $gmap = new EGmap3Widget();
    $gmap->setSize(749, 250);
    $options = new EGmap3MapOptions();
    $options->scaleControl = false;
    $options->streetViewControl = false;
    $options->zoom = 17;
    $options->mapTypeId = EGmap3MapTypeId::ROADMAP;
    $zoomOptions = new EGmap3ZoomControlOptions();
    $zoomOptions->style = EGmap3ZoomControlStyle::SMALL;
    $zoomOptions->position = EGmap3ControlPosition::LEFT_TOP;
    $options->zoomControlOptions = $zoomOptions;
    $marker = new EGmap3Marker(array('title' => $model->name));
    $marker->latLng = array($lat, $lng);
    // center the map on the marker
    $marker->centerOnMap();
    $gmap->add($marker);
    $gmap->setOptions($options);
    $gmap->renderMap();
    
    
    echo 'LAT:' . $lat . '<br/>';
    echo 'LNG:' . $lng . '<br/>';
?>
