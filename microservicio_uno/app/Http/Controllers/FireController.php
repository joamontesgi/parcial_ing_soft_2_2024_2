<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fire;

/**
 * @OA\Info(title="API de Incendios", version="1.0.0")
 *
 * @OA\Components(
 *     @OA\Schema(
 *         schema="Fire",
 *         type="object",
 *         required={"city_id", "cause", "area", "quantity", "risk"},
 *         @OA\Property(property="city_id", type="integer", description="ID de la ciudad"),
 *         @OA\Property(property="cause", type="string", description="Causa del incendio"),
 *         @OA\Property(property="area", type="number", format="float", description="Área afectada en hectáreas"),
 *         @OA\Property(property="quantity", type="integer", description="Cantidad de incendios"),
 *         @OA\Property(property="risk", type="string", description="Nivel de riesgo")
 *     )
 * )
 */
class FireController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/fires",
     *     summary="Obtener todos los incendios",
     *     description="Retorna una lista de todos los incendios registrados.",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de incendios",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Fire"))
     *     )
     * )
     */
    public function index()
    {
        $fires = Fire::all();
        return $fires;
    }

    /**
     * @OA\Post(
     *     path="/api/fires",
     *     summary="Registrar un nuevo incendio",
     *     description="Crea un nuevo registro de incendio.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"city_id", "cause", "area", "quantity", "risk"},
     *             @OA\Property(property="city_id", type="integer", description="ID de la ciudad"),
     *             @OA\Property(property="cause", type="string", description="Causa del incendio"),
     *             @OA\Property(property="area", type="number", format="float", description="Área afectada en hectáreas"),
     *             @OA\Property(property="quantity", type="integer", description="Cantidad de incendios"),
     *             @OA\Property(property="risk", type="string", description="Nivel de riesgo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Incendio registrado exitosamente"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $fire = new Fire();
        $fire->city_id = $request->city_id;
        $fire->cause = $request->cause;
        $fire->area = $request->area;
        $fire->quantity = $request->quantity;
        $fire->risk = $request->risk;
        $fire->save();
    }

    /**
     * @OA\Get(
     *     path="/api/fires/{id}",
     *     summary="Mostrar un incendio específico",
     *     description="Obtiene los detalles de un incendio por su ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles del incendio",
     *         @OA\JsonContent(ref="#/components/schemas/Fire")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Incendio no encontrado"
     *     )
     * )
     */
    public function show(string $id)
    {
        $fire = Fire::find($id);
        return $fire;
    }

    /**
     * @OA\Put(
     *     path="/api/fires/{id}",
     *     summary="Actualizar un incendio",
     *     description="Actualiza los detalles de un incendio.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"city_id", "cause", "area", "quantity", "risk"},
     *             @OA\Property(property="city_id", type="integer", description="ID de la ciudad"),
     *             @OA\Property(property="cause", type="string", description="Causa del incendio"),
     *             @OA\Property(property="area", type="number", format="float", description="Área afectada en hectáreas"),
     *             @OA\Property(property="quantity", type="integer", description="Cantidad de incendios"),
     *             @OA\Property(property="risk", type="string", description="Nivel de riesgo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Incendio actualizado exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Incendio no encontrado"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $fire = Fire::find($id);
        $fire->city_id = $request->city_id;
        $fire->cause = $request->cause;
        $fire->area = $request->area;
        $fire->quantity = $request->quantity;
        $fire->risk = $request->risk;
        $fire->save();
    }

    /**
     * @OA\Delete(
     *     path="/api/fires/{id}",
     *     summary="Eliminar un incendio",
     *     description="Elimina un incendio por su ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Incendio eliminado exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Incendio no encontrado"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $fire = Fire::find($id);
        $fire->delete();
    }

    /**
     * @OA\Get(
     *     path="/api/fires/query",
     *     summary="Consultar área máxima de incendio",
     *     description="Devuelve el área máxima de incendio registrada.",
     *     @OA\Response(
     *         response=200,
     *         description="Área máxima de incendio",
     *         @OA\JsonContent(type="number", format="float")
     *     )
     * )
     */
    public function query()
    {
        $data = Fire::all()->max('area');
        return $data;
    }
}
