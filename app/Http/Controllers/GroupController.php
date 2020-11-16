<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Services\Contracts\GroupServiceInterface;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $service;

    public function __construct(GroupServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Group $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $grupo)
    {
        //
    }
}
