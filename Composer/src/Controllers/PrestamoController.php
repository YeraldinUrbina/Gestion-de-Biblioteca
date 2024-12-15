<?php
require_once '../models/Prestamo.php';

class PrestamoController
{
    public function index()
    {
        $prestamos = Prestamo::getAll();
        require '../views/prestamos/index.php';
    }

    public function create()
    {
        $usuarios = Usuario::getAll();
        $libros = Libro::getAll();
        require '../views/prestamos/create.php';
    }

    public function store($data)
    {
        Prestamo::create($data);
        header('Location: index.php');
    }

    public function edit($id)
    {
        $prestamo = Prestamo::find($id);
        $usuarios = Usuario::getAll();
        $libros = Libro::getAll();
        require '../views/prestamos/edit.php';
    }

    public function update($id, $data)
    {
        Prestamo::update($id, $data);
        header('Location: index.php');
    }

    public function delete($id)
    {
        Prestamo::delete($id);
        header('Location: index.php');
    }

    public function show($id)
    {
        $prestamo = Prestamo::find($id);
        require '../views/prestamos/show.php';
    }
}