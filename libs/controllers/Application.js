import * as mapa from './mapa.config.js'
import swal from 'sweetalert'

module.exports = function($scope, $rootScope, NgMap, Restangular) {
  $scope.googleMapsUrl="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhvC3rIiMvEM4JUPAl4fG1xNPRKoRnoTg&libraries=geometry"
  $scope.vm = this;
  $scope.position  = {}
  $scope.positions = [];

  $scope.$watch('position', function(newValue, oldValue) {
    if(newValue){
      $scope.positions[0] = newValue
    }
  });

  let array = window.location.href.split('/');
  NgMap.getMap().then((map) => {
    $scope.vm = map;
    let styledMap = new google.maps.StyledMapType(mapa.default, {name: "Styled Map"});
    $scope.vm.mapTypes.set('map_style', styledMap);
    $scope.vm.setMapTypeId('map_style');
  });
  
  $scope.addMarker = (event) => {
    if($scope.positions[0].lat == 0 && $scope.positions[0].lng == 0){
      addMarkerFunction(event);
      return;
    }

    swal({
      title: "Modificar",
      text: "¿Esta seguro que desea modificar la ubicacion de este negocio?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Se actualizo con exito la nueva ubicacion", {
          icon: "success",
        });
        addMarkerFunction(event)
      }
    });
  }

  function addMarkerFunction (event) {
    var ll = event.latLng;
    if(ll){
      Restangular.all('create').customPOST({
        id: $scope.position.id, 
        lat:ll.lat(), 
        lng: ll.lng()
      }, '').then((response) => {
        let array = $scope.positions;
        if(array.length == 0){
          $scope.positions.push({ 'lat': response.lat, 'lng': response.lng })
        }else{
          $scope.positions[0] =  {
            'lat': response.lat,
            'lng' : response.lng
          }
        }
      }, (error) => {
        toastr.success(error.data.message, 'Error!')
      })
    }
  }
}