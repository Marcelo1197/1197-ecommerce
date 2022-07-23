<?php
namespace App\Controllers;
use App\Models\UsersModel;

class DashboardController extends BaseController{
	public function index(){
		$session = session();
		//echo "Welcome back, ".$session->get('user_name');
		$data['title'] = 'Dashboard';
		return view('/front/dashboard', $data);
	}
}