<?php


namespace App\Services;


use App\Models\Plano;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantService
{

    private $plano, $data = [], $repository;

    /**
     * TenantService constructor.
     */
    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTenants(int $perPage)
    {
        return $this->repository->getAllTenants($perPage);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->repository->getTenantByUuid($uuid);
    }

    public function make(Plano $plano, array $data)
    {
        $this->plano = $plano;
        $this->data = $data;

        $tenant = $this->storeTenant();

        $user = $this->storeUser($tenant);
        return $user;
    }

    public function storeTenant()
    {
        return $this->plano->tenants()->create([
            'cpf_cnpj' => $this->data['cpf_cnpj'],
            'nome' => $this->data['nome'],
            'email' => $this->data['email'],
            'data_inscricao' => now(),
            'data_expiracao' => now()->addDays(7)
        ]);
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password'])
        ]);

        return $user;
    }

}
