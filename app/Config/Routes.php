<?php

namespace Config;

//Controllers used in routes
use App\Controllers\Carrito;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultNamespace('');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//rutas que no necesitan autenticación de usuario
$routes->group('/', static function($routes) {
    $routes->get('', 'PaginasController::principal');
    $routes->get('quienes-somos', 'PaginasController::quienes_somos');
    $routes->get('comercializacion', 'PaginasController::comercializacion');
    $routes->get('terminos-usos', 'PaginasController::terminos_usos');
    $routes->group('productos', static function($routes) {
        $routes->get('', 'ProductosController::index');
        $routes->get('mostrar-categoria/(:num)', 'ProductosController::mostrarCategoria/$1');
    });
    $routes->group('contacto', static function($routes) {
        $routes->get('', 'ContactoController::index');
        $routes->post('enviar-contacto', 'ContactoController::registrarContacto');
    });
    $routes->group('login', static function($routes) {
        $routes->get('', 'LoginController::index');
        $routes->post('validacion', 'LoginController::validacion');
        $routes->post('logout', 'LoginController::logout');
    });
    $routes->group('registro', static function($routes){
        $routes->get('', 'RegisterController::index');
        $routes->post('save', 'RegisterController::save');
        
    });
});

//rutas que necesitan autenticación de usuario tipo cliente
$routes->group('/', ['filter' => 'auth'], static function($routes) {
    $routes->group('carrito-compras',  static function($routes) {
        $routes->get('', 'CarritoController::index');
        $routes->get('vaciar-carrito', 'CarritoController::vaciarCarrito');
        $routes->post('agregar-carrito', 'CarritoController::agregarAlCarrito');
        $routes->post('eliminar-carrito', 'CarritoController::eliminarDelCarrito');
        $routes->post('actualizar-carrito', 'CarritoController::actualizarCarrito');
    });
    $routes->group('consulta', static function($routes) {
        $routes->get('', 'ConsultaController::index');
        $routes->post('realizar-consulta', 'ConsultaController::registrarConsulta');
    });

    $routes->group('mi-cuenta', static function($routes) {
        $routes->get('', 'UserPanelController::index');
        $routes->get('mis-datos', 'UserPanelController::index');
        $routes->get('mis-compras', 'UserPanelController::index');
    });

    $routes->group('ventas', static function($routes) {
        $routes->get('comprar', 'VentasController::grabarCompra');
    });
});

//rutas que necesitan autenticación de usuario tipo administrador
$routes->group('admin', ['filter' => 'adminfilter'], static function($routes) {
    $routes->group('productos', static function($routes) {
        $routes->get('', 'AdminControllers/ProductosAdmin::index');
        $routes->post('agregar-producto', 'AdminControllers/ProductosAdmin::agregarProducto');
        $routes->post('editar-producto', 'AdminControllers/ProductosAdmin::editarProducto');
        $routes->post('eliminar-producto', 'AdminControllers/ProductosAdmin::eliminarProducto');
        $routes->post('habilitar-producto', 'AdminControllers/ProductosAdmin::altaProducto');

        $routes->get('alta-producto', 'AdminControllers/ProductosAdmin::altaProductoVista');
        $routes->get('lista-productos', 'AdminControllers/ProductosAdmin::index');
    });
    $routes->group('usuarios', static function($routes) {
        $routes->get('', 'AdminControllers\UsuariosAdmin::index');
        $routes->post('eliminar-usuario', 'AdminControllers\UsuariosAdmin::eliminarUsuario');
        $routes->post('alta-usuario', 'AdminControllers\UsuariosAdmin::altaUsuario');
    });
    $routes->group('consultas', static function($routes) {
        $routes->get('', 'AdminControllers\ConsultasAdmin::index');
        $routes->post('resolver', 'AdminControllers\ConsultasAdmin::consultaResuelta');
        $routes->post('deshacer-resuelta', 'AdminControllers\ConsultasAdmin::consultaNoResuelta');
    });
    $routes->group('contactos', static function($routes) {
        $routes->get('', 'AdminControllers\ContactosAdmin::index');
        $routes->post('resolver', 'AdminControllers\ContactosAdmin::contactoResuelto');
        $routes->post('deshacer-resuelto', 'AdminControllers\ContactosAdmin::contactoNoResuelto');
    });
    $routes->group('facturas', static function($routes) {
        $routes->get('', 'AdminControllers\FacturasAdmin::index');
    });
    $routes->group('categorias', static function($routes) {
        $routes->get('', 'AdminControllers\CategoriasAdmin::index');
        $routes->post('agregar-categoria', 'AdminControllers\CategoriasAdmin::agregarCategoria');
        $routes->post('eliminar-categoria', 'AdminControllers\CategoriasAdmin::eliminarCategoria');
        $routes->post('habilitar-categoria', 'AdminControllers\CategoriasAdmin::habilitarCategoria');
    });
    $routes->get('dashboard', 'AdminControllers\DashboardAdmin');
});


//rutas que llevan directo al controlador

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

