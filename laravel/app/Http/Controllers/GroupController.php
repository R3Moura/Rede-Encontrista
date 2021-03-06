<?php

namespace App\Http\Controllers;

use App\Group;
use App\Grupo;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
//TODO valores obrigtorios não defeidos e resolvidos

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Group::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return self::update($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrfail($id);
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if (is_null($id))
            $group = new Group();
        else
            $group = Group::findOrfail($id);

        $group->designation = Input::get('designation');
        $group->localization = Input::get('localization');
        $group->creation_date = Input::get('creation_date');
        $group->inactivation_date = Input::get('inactivation_date');


        $group->save();

        $years = Input::get('team_coordinator.years');
        if (!is_null($years))
            foreach ($years as $year)
                foreach (['coordinator' => 'Coordenador', 'secretary' => 'Secretario', 'treasurer' => 'Tesoureiro'] as $key => $value)
                    $group->setRole(Role::role($value), $group->id, $year, (int)Input::get('team_coordinator.' . $year . '.' . $key . '.encontrista.id'));


        return response()->json([
            'message' => is_null($id) ? 'Successfully created Group!' : 'Successfully updated Group!',
            'group' => $group
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::findOrfail($id)->delete();
        return response()->json(['message' => 'Successfully deleted the Group!']);
    }
}
