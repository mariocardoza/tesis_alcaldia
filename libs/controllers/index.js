import { controllers } from '../config'

controllers.controller('ApplicationControllers', ['$scope', '$rootScope', 'NgMap', 'Restangular', require('./Application')])
controllers.controller('MapaControllers', ['$scope', 'NgMap', 'Restangular', require('./MapaControllers')])
