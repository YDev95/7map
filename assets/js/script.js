

document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');

var defaultloc = [29.575,52.526];
var map = L.map('map').setView([29.575,52.526], 13);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    tileLayer: 512,
    
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// map.on('dblclick',function(e){

//     // get the location that had db clicked and save it to server DB

//    L.marker([e.latlng.lat,e.latlng.lng]).addTo(map);

// })

var current_location,current_accuracy;

map.on('locationfound',function(e){

    if(current_location){
        map.removeLayer(current_location);
        map.removeLayer(current_accuracy);

    }

    var radius = e.accuracy/2;
    current_location = L.marker(e.latlng).bindPopup('دقت تقریبی'+radius+'متر').addTo(map).openPopup();
    current_accuracy = L.circle(e.latlng,radius).addTo(map);
   

});
map.on('locationerror',function(e){
    alert(e.message);

});

function locate(){
    
    map.locate({setView: true , maxZoom: 18});
    
}


// AJAX & Jquery functions

$(document).ready(function(e){



$('#location').submit(function(e){

    var form = $(this);
    e.preventDefault();


    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: form.serialize(),
        success: function(response){

            
            $('.ajaxResult').html(response);
        }

    })


});





})




map.on('dblclick',function(e){
// 1: add marker in clicked position
L.marker(e.latlng).addTo(map);
// 2: open modal form
$('#modal-overlay').fadeIn(700);
// 3: fill the form and submit location data to server

$('#lat').val(e.latlng.lat);
$('#lng').val(e.latlng.lng);

// Empty form
$('#title').val('');
$('#locationType').val(0);




// 4: save location in database( status : pending review)

// 5: review locations and verify if ok

})


$('.currentLoc').click(function(e){


    locate();

})


// Search result

$('#search').keyup(function(e){

    var result = $('.search-results');
    var searchInput =  $(this).val()

    $.ajax({
        method: 'POST',
        url: '../process/search.php',
        data: {keyword: searchInput},
        success: function(response){
            result.html(response);
            result.slideDown();

        }
    })
    



})