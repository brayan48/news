var app = angular.module('myApp', [
	'ui.router',
	'ui.bootstrap',
	'oc.lazyLoad'
	//,
	//'angularFileUpload'
	
])

app.config(['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider', 'JS_REQUIRES', function($stateProvider, $urlRouterProvider, $ocLazyLoadProvider, jsRequires){
	
	// LAZY MODULES
    $ocLazyLoadProvider.config({
        debug: false,
        events: true,
        modules: jsRequires.modules
    });
	
	$urlRouterProvider.otherwise("/Pedidos");
	
	$stateProvider
		.state('Home', {
			url: '/Inicio',
			templateUrl: 'modulos/home/home.php'
		})
		.state('Categorias', {
			url: '/config/Categorias',
			templateUrl: 'modulos/categorias/categorias.php'
		})
        .state('Mercados', {
            url: '/config/Mercados',
            templateUrl: 'modulos/mercados/mercados.php'
        })
        .state('Unidades', {
            url: '/config/Unidades',
            templateUrl: 'modulos/unidades/unidades.php'
        })
         .state('Sectores', {
            url: '/config/Sectores',
            templateUrl: 'modulos/sectores/sectores.php'
        })
        .state('Productos', {
            url: '/config/Productos',
            templateUrl: 'modulos/productos/productos.php'
        })
        .state('ListaPrecios', {
            url: '/ListaPrecios',
            templateUrl: 'modulos/productos/listaprecios.php'
        })
         .state('Ofertas', {
            url: '/config/Ofertas',
            templateUrl: 'modulos/ofertas/ofertas.php'
        })
         .state('Proveedores', {
            url: '/config/Proveedores',
            templateUrl: 'modulos/proveedor/proveedor.php'
        })
         .state('Inventario', {
            url: '/config/Inventario',
            templateUrl: 'modulos/inventario/inventario.php'
        })
         .state('Pedidos', {
            url: '/Pedidos?Idcategoria&Nomcategoria',
            templateUrl: 'modulos/pedidos/pedidos.php',
            controller: function($scope, $stateParams) {
                 $('#idcategoria').val($stateParams.Idcategoria); 
                 $('#gadcategoria').html($stateParams.Nomcategoria)                
            }
        })
        .state('Pendientes', {
            url: '/Ordenes?Idestado&Lista',
            templateUrl: 'modulos/pedidos/pendientes.php',
            controller: function($scope, $stateParams) {
                 $('#idestado').val($stateParams.Idestado);
                 $('#idlista').val($stateParams.Lista); 
                 CRUDPEDIDOS('PEDIDOS','');                 
            }
        })
         .state('Informes', {
            url: '/Informes?Informe&Tituloinforme',
            templateUrl: 'modulos/informes/informes.php',
            controller: function($scope, $stateParams) {
                 $('#tipoinforme').val($stateParams.Informe);  
                 $('#tituloinforme').html($stateParams.Tituloinforme);              
                 CRUDINFORMES($stateParams.Informe);                 
            }
        })
		.state('Usuarios', {
			url: '/secure/Usuarios?Conf',
			templateUrl: 'modulos/usuarios/usuarios.php',
            controller:function($scope, $stateParams){
                if($stateParams.Conf==1){
                    CRUDUSUARIOS('LISTACONFIRMAR','','2');
                    $('#litodosdomiciliarios').addClass('active');
                    $('#litodosusuarios').removeClass('active');
                }
                else
                {
                    CRUDUSUARIOS('LISTAUSUARIOS','','Todos');
                    $('#litodosdomiciliarios').removeClass('active');
                    $('#litodosusuarios').addClass('active');
                }
            }          
		})		
		.state('Perfiles', {
			url: '/secure/Perfiles',
			templateUrl: 'modulos/perfiles/perfiles.php'
		})		
		.state('cambiocontrasena', {
			url: '/InformacionPerfil',
			templateUrl: 'modulos/cambiarcontrasena/cambiocontrasena.php'
		})		
		.state('Festivos', {
			url: '/Festivos',
			templateUrl: 'modulos/festivos/calendario.php'
		})	
        .state('Ajustes', {
            url: '/acount/Ajustes?Op',
            templateUrl: 'modulos/cuenta/ajuste.php',
            controller: function($scope, $stateParams) {
                var $op = $stateParams.Op;
                if($op=="Cue")
                {
                    console.log($op);
                    $('#licuenta').addClass('active');
                    $('#lidireccion').removeClass('active');
                    CRUDCUENTA('AJUSTECUENTA','')
                }
                else //if($op=="Dir")
                {
                    console.log($op);
                    $('#licuenta').removeClass('active');
                    $('#lidireccion').addClass('active');
                    CRUDPEDIDOS('NUEVADIRECCION','');
                }               
            }
        }) 
        .state('Pqr', {
            url: '/acount/PQR',
            templateUrl: 'modulos/pqr/pqr.php'
        })
         .state('Domiciliario', {
            url: '/shipping/Registro',
            templateUrl: 'modulos/cuenta/domiciliario.php'
        })
        .state('Ventas', {
            url: '/Ventas',
            templateUrl: 'modulos/ventas/ventas.php'
        })
        .state('Cobrar', {
            url: '/Cobrar',
            templateUrl: 'modulos/cobrar/cobrar.php'
        })
		;

		// Generates a resolve object previously configured in constant.JS_REQUIRES (config.constant.js)
        function loadSequence() {
            var _args = arguments;
            return {
                deps: ['$ocLazyLoad', '$q',
                    function ($ocLL, $q) {
                        var promise = $q.when(1);
                        for (var i = 0, len = _args.length; i < len; i++) {
                            promise = promiseThen(_args[i]);
                        }
                        return promise;

                        function promiseThen(_arg) {
                            if (typeof _arg == 'function')
                                return promise.then(_arg);
                            else
                                return promise.then(function () {
                                    var nowLoad = requiredData(_arg);
                                    if (!nowLoad)
                                        return $.error('Route resolve: Bad resource name [' + _arg + ']');
                                    return $ocLL.load(nowLoad);
                                });
                        }

                        function requiredData(name) {
                            if (jsRequires.modules)
                                for (var m in jsRequires.modules)
                                    if (jsRequires.modules[m].name && jsRequires.modules[m].name === name)
                                        return jsRequires.modules[m];
                            return jsRequires.scripts && jsRequires.scripts[name];
                        }
                    }]
            };
        }
}]);

app.constant('JS_REQUIRES', {
    //*** Scripts
    scripts: {
        //*** Javascript Plugins
        /*'multiselect': [
        	'dist/js/prettify.js',
        	'dist/css/bootstrap-multiselect.css',
        	'dist/js/bootstrap-multiselect.js',
        	'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'],*/
        /*'multiselect': ['dist/css/checklist/jquery.multiselect.css',
        'dist/css/checklist/jquery.multiselect.filter.css',
        'dist/css/checklist/styleselect.css',
        'dist/css/checklist/prettify.css',
        'dist/css/checklist/jquery-ui.css',
        'http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js',
        'dist/js/checklist/jquery.multiselect.js',
        'dist/js/checklist/jquery.multiselect.filter.js',
        'dist/js/checklist/prettify.js']*/
    }
});

app.controller('TabsDemoCtrl', function ($scope, $window) {
  $scope.tabs = [
    { title:'Dynamic Title 1', content:'Dynamic content 1' },
    { title:'Dynamic Title 2', content:'Dynamic content 2', disabled: true }
  ];
	$scope.alertSector = function(g) {
	setTimeout(function() {
		CRUDSECTOR('',g,'');
	});
	};
});
/*
 app.controller('AppController', ['$scope', 'FileUploader', function($scope, FileUploader) {
        var uploader = $scope.uploader = new FileUploader({
            url: 'modulos/actividades/upload.php'
        });

        // FILTERS

        uploader.filters.push({
            name: 'customFilter',
            fn: function(item , options) {
                return this.queue.length < 10;
            }
        });

        // CALLBACKS

        uploader.onWhenAddingFileFailed = function(item , filter, options) {
            console.info('onWhenAddingFileFailed', item, filter, options);
			$
        };
        uploader.onAfterAddingFile = function(fileItem) {
            console.info('onAfterAddingFile', fileItem);
			
        };
        uploader.onAfterAddingAll = function(addedFileItems) {
            console.info('onAfterAddingAll', addedFileItems);
			
        };
        uploader.onBeforeUploadItem = function(item) {
            console.info('onBeforeUploadItem', item);
			
        };
        uploader.onProgressItem = function(fileItem, progress) {
            console.info('onProgressItem', fileItem, progress);
			
        };
        uploader.onProgressAll = function(progress) {
            console.info('onProgressAll', progress);
			
        };
        uploader.onSuccessItem = function(fileItem, response, status, headers) {
            console.info('onSuccessItem', fileItem,response, status, headers);
			$('#archivo').replaceWith( $('#archivo').val('').clone( true ) );
        };
        uploader.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
			
        };
        uploader.onCancelItem = function(fileItem, response, status, headers) {
            console.info('onCancelItem', fileItem, response, status, headers);
			$('file').replaceWith( $('file').val('').clone( true ) );
        };
        uploader.onCompleteItem = function(fileItem, response, status, headers) {
            console.info('onCompleteItem', fileItem, response, status, headers);
			$('file').replaceWith( $('file').val('').clone( true ) );
        };
        uploader.onCompleteAll = function() {
            console.info('onCompleteAll');
			$('file').replaceWith( $('file').val('').clone( true ) );
        };

        console.info('uploader', uploader);
    }]);
*/	
	
	
	
	app.controller('ProgressCtrl', function ($scope) {
  
  	$scope.max = 100;

 	 $scope.cargar = function(v) {
    var value = v;// Math.floor(Math.random() * 100 + 1);
    var type;

    if (value < 25) {
      type = 'success';
    } else if (value < 50) {
      type = 'info';
    } else if (value < 75) {
      type = 'warning';
    } else {
      type = 'danger';
    }

    $scope.showWarning = type === 'danger' || type === 'warning';

    $scope.dynamic = value;
    $scope.type = type;
  };
  

});
	
	



