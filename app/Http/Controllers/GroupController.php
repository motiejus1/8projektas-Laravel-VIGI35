<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('groups.index',['groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $group = new Group;
        $group->title = $request->group_title;
        $group->description = $request->group_description;
        $group->teacher = $request->group_teacher;

        $group->save();

        return redirect()->route('groups.index')->with('success_message', 'Grupe buvo sukurta sekmingai.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->title = $request->group_title;
        $group->description = $request->group_description;
        $group->teacher = $request->group_teacher;

        $group->save();

        return redirect()->route('groups.index')->with('success_message', 'Grupe buvo atnaujinta sekmingai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //Kokiomis salygomis as galiu istrinti grupe?

        // 1. Jeigu norime istrinti grupe, pries tai reikia istrinti visus studentus. Neleisti trinti tol kol yra studentu
        // 2. trinant grupe, kartu triname iskart visus studentus

        $students_count=$group->groupStudents->count();

        if ($students_count>0) {
            return redirect()->route('groups.index')->with('danger_message', 'Negalima istrinti grupes, nes ji turi studentu');
        }

        $group->delete();

        return redirect()->route('groups.index')->with('success_message', 'Grupe sekmingai istrinta');
    }
}
