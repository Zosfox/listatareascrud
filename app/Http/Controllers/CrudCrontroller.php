<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudCrontroller extends Controller
{
    public function index()
    {

        $datos = DB::select(" select * from tareas ");

        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert(" insert into tareas(tituloTarea, idTarea, descripcionTarea, estadoTarea, fechacreacionTarea, fechaactualizacionTarea) values(?,?,?,?,?,?) ", [
                $request->txttitulo,
                $request->txtid,
                $request->txtdescripcion,
                $request->txtestado,
                $request->now(),
                $request->now()

            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Tarea registrada correctamente");
        } else {
            return back()->with("incorrecto", "Error al crear tarea");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update(" update tareas set tituloTarea=?, descripcionTarea=?, estadoTarea=?, fechaactualizacionTarea=? where idTarea=? ", [
                $request->txttitulo,
                $request->txtdescripcion,
                $request->txtestado,
                $request->now(),
                $request->txtid,

            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Tarea editada correctamente");
        } else {
            return back()->with("incorrecto", "Error al editar tarea");
        }
    }

    public function delete($id)
    {
        try {
            $sql = DB::delete(" delete from tareas where idTarea=$id ");
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Tarea eliminada correctamente");
        } else {
            return back()->with("incorrecto", "Error al eliminar tarea");
        }
    }
}
