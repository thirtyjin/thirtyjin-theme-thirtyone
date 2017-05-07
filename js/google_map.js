function initialize() {
  var myLatlng = new google.maps.LatLng(40.050954,116.300801);
  var mapOptions = {
    zoom: 16,
    disableDoubleClickZoom: false,
    scrollwheel: false,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'ThirtyJin.com!'
  });
}
google.maps.event.addDomListener(window, 'load', initialize);