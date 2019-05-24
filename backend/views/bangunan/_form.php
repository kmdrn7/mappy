<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use AprSoft\Dropify\Dropify;

/* @var $this yii\web\View */
/* @var $model app\models\Bangunan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bangunan-form">

    <style>
        .geocoder {
            position:absolute;
            z-index:1;
            width:50%;
            left:50%;
            margin-left:-25%;
            top:10px;
        }

        .coordinates {
            background: rgba(0,0,0,0.5);
            color: #fff;
            position: absolute;
            bottom: 10px;
            left: 10px;
            padding:5px 10px;
            margin: 0;
            font-size: 11px;
            line-height: 18px;
            border-radius: 3px;
            display: none;
        }

        .mapboxgl-ctrl-geocoder { min-width:100%; }
    </style>

    <?php $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'bangunan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?php
        if ($model->gambar){
            $options = [
                'data-default-file' => '/images/bangunan/'.$model->gambar
            ];
        } else {
            $options = [
                'data-default-file' => '/images/bangunan.png'
            ];
        }
    ?>


    <?= $form->field($model, 'gambar')->widget(Dropify::className(), [
        'options' => $options
    ]) ?>

    <div class="form-group">
        <button type="button" class="btn btn-success btn-set-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; LOKASI SAAT INI</button>
    </div>

    <div class="form-group" style="position: relative">
        <div id="map" style="height: 300px; width: 100%"></div>
        <pre id='coordinates' class='coordinates'></pre>
        <div id='geocoder' class='geocoder'></div>
    </div>

    <?= $form->field($model, 'lat', [
        'options' => [
            'id' => 'lat',
            'name' => 'lat'
        ]
    ])->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'long', [
        'options' => [
            'id' => 'long',
            'name' => 'long'
        ]
    ])->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
        let storeLat = "<?= $model->lat ?>";
        let storeLong = "<?= $model->long ?>";
        let marker, map, coordinates, lati, longi, prov;

        if ( storeLat != "" && storeLong != "" ){
            lati = storeLat;
            longi = storeLong;
        } else {
            lati = -7.4446608;
            longi = 112.7275175;
        }

        function initGeolocation()
        {
            if( navigator.geolocation ){
                // Call getCurrentPosition with success and failure callbacks
                navigator.geolocation.getCurrentPosition( success, fail );
            } else {
                alert("Maaf, browser yang anda gunakan tidak mendukung untuk pencarian lokasi otomatis");
            }
        }

        function success(position){
            lati = position.coords.latitude;
            longi = position.coords.longitude;
        }
        function fail(err)
        {
            alert('Terjadi kesalahan ketika mengambil lokasi anda')
        }

        try {
            initGeolocation()
        } catch (error) { }

        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kaWthaG1hZHIiLCJhIjoiY2p3MHdjdWVuMGZueTQzcGtxMXY3ZjEzaCJ9.aVBeWNqmgnORcxXVumdUFw';
        coordinates = document.getElementById('coordinates');
        map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: [longi, lati],
            zoom: 12
        });

        marker = new mapboxgl.Marker({
            draggable: true
        }).setLngLat([longi, lati]).addTo(map);

        $('#bangunan-lat').val(marker.getLngLat().lat)
        $('#bangunan-long').val(marker.getLngLat().lng)

        if (!navigator.geolocation) {
            geolocate.innerHTML = 'Geolocation is not available';
        } else {
            navigator.geolocation.getCurrentPosition(showPosition);
        }

        function showPosition(position) {
            let msg = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
            console.log(msg);
        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            $('#bangunan-lat').val(lngLat.lat)
            $('#bangunan-long').val(lngLat.lng)
        }

        function mapDragEnd() {
            // marker.setLngLat(map.getCenter())
        }

        function mapDrag() {
            marker.setLngLat(map.getCenter())
            let lngLat = marker.getLngLat();
            $('#bangunan-lat').val(lngLat.lat)
            $('#bangunan-long').val(lngLat.lng)
        }

        marker.on('dragend', onDragEnd);
        map.on('dragend', mapDragEnd);
        map.on('drag', mapDrag);
        map.addControl(new mapboxgl.NavigationControl());
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken
        });
        geocoder.on('result', function(e){
            marker.setLngLat(e.result.center)
            console.log(e.result.center)
            $('#bangunan-lat').val(e.result.center[1])
            $('#bangunan-long').val(e.result.center[0])
        })

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

        $(document).on('click', '.btn-set-location', function(){
            marker.setLngLat([
                longi, lati
            ])
            map.flyTo({
                center: [
                    longi, lati
                ]
            })
        })
    </script>

</div>
