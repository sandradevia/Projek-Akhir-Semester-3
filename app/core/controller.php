<?php

class Controller{
	//method memuat tampilan
	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}

	//method memuat model
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}

	//method menangani redirect
	public function redirect($url)
	{
		header('Location: ' . $url);
	}
}