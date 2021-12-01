<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    protected $repository;

    /**
     * ServicoController constructor.
     */
    public function __construct(Servico $servico)
    {
        $this->repository = $servico;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = $this->repository->paginate();
        return view('admin.pages.servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.servicos.create');
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

        return redirect()->route('servicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show($servico)
    {
        if (!$servico = $this->repository->find($servico))
            return redirect()->back();

        return view('admin.pages.servicos.show', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit($servico)
    {
        if (!$servico = $this->repository->find($servico))
            return redirect()->back();

        return view('admin.pages.servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $servico)
    {
        if (!$servico = $this->repository->find($servico))
            return redirect()->back();

        $servico->update($request->all());

        return redirect()->route('servicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy($servico)
    {
        if (!$servico = $this->repository->find($servico))
            return redirect()->back();

        $servico->delete();

        return redirect()->route('servicos.index');
    }
}
