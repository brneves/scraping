<?php

namespace App\Http\Controllers;

use App\Models\Marcacao;
use Goutte\Client;
use Illuminate\Http\Request;

class MarcacaoController extends Controller
{
    protected $repository;
    private $results = [];

    /**
     * MarcacaoController constructor.
     */
    public function __construct(Marcacao $marcacao)
    {
        $this->repository = $marcacao;
    }

    public function scraper()
    {
        $client = new Client();

        $url = 'https://www.wikitelecom.com.br/#internet';
        $page = $client->request('GET', $url);
        dd($page);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Marcacao  $marcacao
     * @return \Illuminate\Http\Response
     */
    public function show($marcacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marcacao  $marcacao
     * @return \Illuminate\Http\Response
     */
    public function edit($marcacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marcacao  $marcacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $marcacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcacao  $marcacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($marcacao)
    {
        //
    }
}
