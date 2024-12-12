<?php

namespace App\Http\Controllers;

use App\Models\Admin\Mesa;
use App\Models\Admin\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    protected $repository;

    function __construct(Reserva $reserva)
    {
        $this->repository = $reserva;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = $this->repository->where('user_id', Auth::id())->get();

        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mesas = Mesa::all();

        return view('reservas.create', compact('mesas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'inicio_reserva' => 'required|date|after:17:59|before:23:59',
            'fim_reserva' => 'required|date|after:inicio_reserva|before:23:59',
        ]);

        // Validar conflitos
        $conflito = Reserva::where('mesa_id', $request->mesa_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('inicio_reserva', [$request->inicio_reserva, $request->fim_reserva])
                    ->orWhereBetween('fim_reserva', [$request->inicio_reserva, $request->fim_reserva]);
            })
            ->exists();

        if ($conflito) {
            return back()->withErrors('A mesa já está reservada para o horário selecionado.');
        }

        //Verificação aos domingos
        $inicio = Carbon::parse($request->inicio_reserva);

        if ($inicio->isSunday()) {
            return back()->withErrors('Reservas não são permitidas aos domingos.');
        }

        $this->repository->create([
            'mesa_id' => $request->mesa_id,
            'inicio_reserva' => $request->inicio_reserva,
            'fim_reserva' => $request->fim_reserva,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('reserva.index')->with('success', 'Reserva criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$reservas = $this->repository->find($id)) {
            return redirect()->back();
        };

        $mesas = Mesa::all();

        return view('reservas.edit', compact('reservas', 'mesas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservas = $this->repository->where('id', $id);

        if (!$reservas) {
            return redirect()->back()->with('fail', 'Reserva nao encontrada.');
        }

        $request->validate(['mesa_id' => 'required|exists:mesas,id',
            'inicio_reserva' => 'required|date|after:17:59|before:23:59',
            'fim_reserva' => 'required|date|after:inicio_reserva|before:23:59',]);

        $conflito = Reserva::where('mesa_id', $request->mesa_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('inicio_reserva', [$request->inicio_reserva, $request->fim_reserva])
                    ->orWhereBetween('fim_reserva', [$request->inicio_reserva, $request->fim_reserva]);
            })
            ->exists();

        if ($conflito) {
            return back()->withErrors('A mesa já está reservada para o horário selecionado.');
        }

        $reservas->update([
            'mesa_id' => $request->mesa_id,
            'inicio_reserva' => $request->inicio_reserva,
            'fim_reserva' => $request->fim_reserva,
            'user_id' => Auth::id(),
            ]);
        return redirect()->route('reserva.index')->with('success', 'Reserva atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservas = $this->repository->where('id', $id);

        if (!$reservas) {
            return redirect()->back()->with('fail', 'Reserva nao encontrada.');
        }
        $reservas->delete();

        return redirect()->route('reserva.index')->with('success', 'Reserva removida com sucesso.');
    }
}
