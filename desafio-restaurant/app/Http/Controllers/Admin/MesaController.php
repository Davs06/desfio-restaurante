<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mesa;

class MesaController extends Controller
{

    protected $repository;

    public function __construct(Mesa $mesa)
    {
        $this->repository = $mesa;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesas = $this->repository->all();
        return view('admin.mesa.index', compact('mesas'));
    }
}
