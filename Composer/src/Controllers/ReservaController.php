<?php
require_once '../models/Reserva.php';

class ReservaController
{
    public function index()
    {
        $reservas = Reserva::getAll();
        require '../views/reservas/index.php';
    }

    public function create()
    {
        $usuarios = Usuario::getAll();
        $libros = Libro::getAll();
        require '../views/reservas/create.php';
    }

    public function store($data)
    {
        Reserva::create($data);
        header('Location: index.php');
    }

    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $usuarios = Usuario::getAll();
        $libros = Libro::getAll();
        require '../views/reservas/edit.php';
    }

    public function update($id, $data)
    {
        Reserva::update($id, $data);
        header('Location: index.php');
    }

    public function delete($id)
    {
        Reserva::delete($id);
        header('Location: index.php');
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        require '../views/reservas/show.php';
    }
}