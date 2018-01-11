/*!
 * Personalisation JavaScript
 */

// carte Google Map
function initMap() {
var hotel = {lat: 43.600, lng: 1.433};
var map = new google.maps.Map(document.getElementById('carte'), {
  zoom: 14,
  center: hotel
});
var marker = new google.maps.Marker({
  position: hotel,
  map: map
});
}

// Scroll animé via JQuery
$(function() {
  $('a[href*=\\#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});