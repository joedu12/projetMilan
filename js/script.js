/*!
 * Personalisation JavaScript
 */

// carte Google Map
function initMap() {
var hotel = {lat: 42.687095, lng: 3.034329};
var map = new google.maps.Map(document.getElementById('carte'), {
  zoom: 16,
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

// Gestion du menu vertical
function ouvrirMenu(){
	document.getElementById("menu-vertical").style.width = '240px';
	document.getElementsByClassName("logo")[0].style.marginLeft = '200px';
}
function fermerMenu(){
	document.getElementById("menu-vertical").style.width = '0';
	document.getElementsByClassName("logo")[0].style.marginLeft = '0';
}
