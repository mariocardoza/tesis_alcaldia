import * as mapa from './mapa.config.js'

module.exports = function($scope, NgMap, Restangular) {
    $scope.googleMapsUrl="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhvC3rIiMvEM4JUPAl4fG1xNPRKoRnoTg&libraries=geometry"
    $scope.vm = this;
    $scope.positions = [];

    NgMap.getMap().then((map) => {
        $scope.vm = map;
        let styledMap = new google.maps.StyledMapType(mapa.default, {name: "Styled Map"});
        $scope.vm.mapTypes.set('map_style', styledMap);
        $scope.vm.setMapTypeId('map_style');

        Restangular.all('mapa').customPOST({}, 'all')
        .then(json => {

        	let markets = json.map( i => ({
                'lat': parseFloat(i.lat),
                'lng' : parseFloat(i.lng),
                data: i
        	}));
        	$scope.vm.item = markets[0];
        	$scope.positions = markets
        })
    });

    $scope.showInform = (e, position) => {
    	$scope.vm.item = position.data
    	$scope.vm.showInfoWindow(event, 'foo-iw');
    }
}