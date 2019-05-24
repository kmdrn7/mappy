<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div id="map"></div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kaWthaG1hZHIiLCJhIjoiY2p3MHdjdWVuMGZueTQzcGtxMXY3ZjEzaCJ9.aVBeWNqmgnORcxXVumdUFw';
    let map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [-74.50, 40], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });
</script>