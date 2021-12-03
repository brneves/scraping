<?php

namespace App\Http\Controllers;

use App\Models\Marcacao;
use App\Models\Provedor;
use App\Models\Servico;
use App\Models\TipoMarcacao;
use Goutte\Client;
use Illuminate\Http\Request;

class MarcacaoController extends Controller
{
    protected $provedor;
    protected $repository;
    private $results = [];

    /**
     * MarcacaoController constructor.
     */
    public function __construct(Marcacao $marcacao, Provedor $provedor)
    {
        $this->repository = $marcacao;
        $this->provedor = $provedor;
    }

    public function scraper()
    {
        $client = new Client();

        $url = 'https://www.wikitelecom.com.br/#internet';
        $page = $client->request('GET', $url);


        echo "<pre>";
        echo $page->filter('.vc_custom_1587612532783')->text();
        echo "</pre>";

        $page->filter('.pix_pricing')->each(function ($item){
            $this->results[$item->filter('h2')->text()] = $item->filter('p.text-small')->text();
        });

        //return $this->results;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provedor)
    {
        if(!$provedor = $this->provedor->find($provedor))
            return  redirect()->back();

        return view('admin.pages.provedores.marcacao.index', compact('provedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($provedor)
    {
        if(!$provedor = $this->provedor->find($provedor))
            return  redirect()->back();

        $servicos = Servico::orderBy('servico')->get();
        $tiposMarcacao = TipoMarcacao::orderBy('tipo')->get();

        return view('admin.pages.provedores.marcacao.create', compact('provedor', 'servicos', 'tiposMarcacao'));
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
    public function show($marcacao, $provedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marcacao  $marcacao
     * @return \Illuminate\Http\Response
     */
    public function edit($marcacao, $provedor)
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
    public function destroy($marcacao, $provedor)
    {
        //
    }
}
