<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('layout\admin_layout');
	}



}
