<?php
namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null) //sirve para validar la peticion antes de que esta se ejecute, validamos login antes de realizar el login realmente
	{
		if(!session()->get('logueado')){ //comprobamos si el valor de 'logueado' => FALSE (este valor se setea en la session en Controllers/Login)
			return redirect()->to('/');  //si no esta logueado, lo mandamos a la pagina de inicio
		}
	}
 
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// Do something here
	}
}