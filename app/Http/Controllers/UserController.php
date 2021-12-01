<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UploadTrait;

    protected $repository;

    /**
     * UserController constructor.
     */
    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    public function index()
    {
        //$this->authorize('usuarios');
        $usuarios = $this->repository->tenantUser()->paginate();
        return view('admin.pages.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        //$this->authorize('usuarios_create');
        return view('admin.pages.usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $tenant = auth()->user()->tenant;

        $data = $request->all();
        $data['tenant_id'] = $tenant->id;
        $data['password'] = bcrypt($data['password']);

        $this->repository->create($data);

        return redirect()->route('usuarios.index');
    }

    public function show($usuario)
    {
        //$this->authorize('usuarios_show');
        if (!$usuario = $this->repository->tenantUser()->where('uuid', $usuario)->first())
            return redirect()->back();

        return view('admin.pages.usuarios.show', compact('usuario'));
    }

    public function edit($usuario)
    {
        //$this->authorize('usuarios_edit');
        if (!$usuario = $this->repository->tenantUser()->where('uuid', $usuario)->first())
            return redirect()->back();

        return view('admin.pages.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $usuario)
    {
        if (!$usuario = $this->repository->tenantUser()->where('uuid', $usuario)->first())
            return redirect()->back();

        $data = $request->only(['name', 'email']);

        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $usuario->update($data);

        return redirect()->route('usuarios.index');
    }

    public function destroy($usuario)
    {
        //$this->authorize('usuarios_delete');

        if (!$usuario = $this->repository->tenantUser()->where('uuid', $usuario)->first())
            return redirect()->back();

        $usuario->delete();

        return redirect()->route('usuarios.index');

    }

    /**
     * Busca
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $filtros = $request->only('filtro');

        $usuarios = $this->repository->where(function ($query) use ($request){
            if ($request->filtro){
                $query->where('name', 'LIKE', "%{$request->filtro}%");
            }
        })
            ->latest()->paginate();

        return view('', compact('usuarios', 'filtros'));
    }

    public function perfil()
    {
        $usuario = auth()->user();
        return view('admin.pages.usuarios.perfil.perfil', compact('usuario'));
    }

    public function fotoPerfil(Request $request)
    {
        $usuario = auth()->user();

        request()->validate([
            'foto' => 'required|image'
        ]);



        if ($request->hasFile('foto')){
            if (Storage::exists('public/' . $usuario->foto)){
                Storage::delete('public/' . $usuario->foto);
            }

            $foto =  $this->imageUpload($request->file('foto'), null, 'perfis');
            $usuario->update(['foto' => $foto]);

            return response()->json([
                'success' => true,
                'foto' => $foto
            ]);
        }

        return response()->json([
            'success' => false,
            'foto' => ''
        ]);

    }
}
