<?php

namespace App\Http\Controllers;

use App\Models\TipoMarcacao;
use Illuminate\Http\Request;

class TipoMarcacaoController extends Controller
{
    protected $repository;

    public function __construct(TipoMarcacao $tipoMarcacao)
    {
        $this->repository = $tipoMarcacao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = $this->repository->paginate();
        return view('admin.pages.tipo-marcacao.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tipo-marcacao.create');
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

        return redirect()->route('tipos-marcacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMarcacao  $tipoMarcacao
     * @return \Illuminate\Http\Response
     */
    public function show($tipoMarcacao)
    {
        if (!$tipo = $this->repository->find($tipoMarcacao))
            return redirect()->back();

        return view('admin.pages.tipo-marcacao.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMarcacao  $tipoMarcacao
     * @return \Illuminate\Http\Response
     */
    public function edit($tipoMarcacao)
    {
        if (!$tipo = $this->repository->find($tipoMarcacao))
            return redirect()->back();

        return view('admin.pages.tipo-marcacao.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMarcacao  $tipoMarcacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipoMarcacao)
    {
        if (!$tipo = $this->repository->find($tipoMarcacao))
            return redirect()->back();

        $tipo->update($request->all());

        return redirect()->route('tipos-marcacao.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMarcacao  $tipoMarcacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipoMarcacao)
    {
        if (!$tipo = $this->repository->find($tipoMarcacao))
            return redirect()->back();

        $tipo->delete();

        return redirect()->route('tipos-marcacao.index');
    }
}
