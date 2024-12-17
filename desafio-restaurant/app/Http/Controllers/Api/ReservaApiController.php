<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ReservaApiController extends Controller
{
    use HttpResponses;

    protected $repository;

    public function __construct(Reserva $reserva)
    {
        $this->repository = $reserva;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repository->with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'mesa_id' => 'required|exists:mesas,id',
            'user_id' => 'required|exists:users,id',
            'inicio_reserva' => 'required|date',
            'fim_reserva' => 'required|date',
        ]);

        if ($validator->fails()) {
            $this->error('Data Invald', 422, $validator->errors());
        }

        $created = $this->repository->create($validator->validated());

        if (!$created) {
            $this->error('Erro ao criar reserva', 400);
        }

        return $this->response('Reserva criada com sucesso', 200, $created);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $reserva = $this->repository->with('user')->find($id);

        if (!$reserva) {
            return $this->error('Nao foi possivel encontrar reserva', 400);
        }

        return $this->response('Reserva encontrada com sucesso', 200, $reserva);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'mesa_id' => 'required|exists:mesas,id',
            'user_id' => 'required|exists:users,id',
            'inicio_reserva' => 'required|date',
            'fim_reserva' => 'required|date',
        ]);

        if ($validator->fails()) {
            return $this->error('Data Invald', 422, $validator->errors());
        }

        $validated = $validator->validated();

        $updated = $this->repository->where('id', $id)->update($validated);

        if (!$updated) {
            return $this->error('Erro ao atualizar reserva', 400);
        }

        return $this->response('Reserva atualizada com sucesso', 200, $validated);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = $this->repository->where('id', $id)->delete();

        if (!$delete) {
            return $this->error('Erro ao remover reserva', 400);
        }
        return $this->response('Reserva removida com sucesso', 200);
    }
}
