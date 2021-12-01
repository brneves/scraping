<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use Illuminate\Http\Request;

class ProvedorController extends Controller
{
    protected $repository;

    /**
     * ProvedorController constructor.
     */
    public function __construct(Provedor $provedor)
    {
        $this->repository = $provedor;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores = $this->repository->paginate();
        return view('admin.pages.provedores.index', compact('provedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.provedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('provedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function show($provedor)
    {
        if (!$provedor = $this->repository->find($provedor))
            return redirect()->back();

        return view('admin.pages.provedores.show', compact('provedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function edit($provedor)
    {
        if (!$provedor = $this->repository->find($provedor))
            return redirect()->back();

        return view('admin.pages.provedores.edit', compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $provedor)
    {
        if (!$provedor = $this->repository->find($provedor))
            return redirect()->back();

        $provedor->update($request->all());

        return redirect()->route('provedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($provedor)
    {
        if (!$provedor = $this->repository->find($provedor))
            return redirect()->back();

        $provedor->delete();

        return redirect()->route('provedores.index');
    }
}
