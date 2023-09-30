<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css<?= "?v=" . rand(10000, 99999) ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body>
    <div class="main">

        <div class="modalOverlay" id="modal-overlay" style="display: none;">
            <div class="location-modal">
                <a href="#" class="close-modal"><b>X</b></a>
                <form id="location" action="<?=site_url('process/add-location.php')?>" method="POST">
                    <div class="locRow" style="position: absolute; top: 201px; right: 680px;">
                    <label class="form-label">مختصات</label>
                    </div>
                    <input type="text" style="width: 200px; margin-right: 100px;" name="lat" class="form-control-plaintext" id="lat" readonly placeholder="-">


                    <input type="text" style="width: 200px; margin-right: 100px;" name="lng" class="form-control-plaintext" id="lng" readonly placeholder="-">

                    <div class="input-group">
                        <span class="input-group-text" style="margin-bottom: 10px; margin-top: 10px;">توضیحات</span>
                        <textarea id="title" class="form-control" name="title" required="required" placeholder="مثال: شرکت تعوانی صنعت" aria-label="With textarea"></textarea>
                    </div>
                    <select class="form-select " style="margin-bottom: 10px; margin-top: 10px;" name="type" id="locationType">
                    
                    <?php foreach (locationTypes as $key => $value):?>
                        <option value=<?=$key?>><?=$value?></option>
                    
                        <?php endforeach; ?>
                    </select>
                    <button class="form-submit" type="submit">ثبت</button>
                </form>

                <div class="ajaxResult"></div>
            </div>
        </div>


        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا میگردی؟">
            <div class="search-results" style="display: none;">
        <div class="result-item" data-lat='111' data-lng='222'>
            <span class="loc-type">رستوران</span>
            <span class="loc-title">رستوران و قوه خانه سنتی سون لرن</span>
        </div>
        
        </div>
        </div>
        <div class="map-container">
            <div id="map"></div>
            <img src="assets/img/current.png" class="currentLoc">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="assets/js/script.js<?= "?v=" . rand(10000, 99999) ?>" ;></script>


<script>

    $(document).ready(function(e){
        
        $('.close-modal').click(function(){
            
            $('#modal-overlay').fadeOut(700);
        })


    })
</script>
<script>
    <?php if($location):?>
       
        L.marker([<?=$location->lat?>,<?=$location->lng?>]).bindPopup('sasa').openPopup().addTo(map);
        map.setView([<?=$location->lat?>,<?=$location->lng?>], 13)

    <?php endif;?>
</script>

</body>

</html>