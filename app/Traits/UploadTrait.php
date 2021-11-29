<?php


namespace App\Traits;


trait UploadTrait
{

    /**
     * @param $imagens = imagem ou array de imagens
     * @param $imagemColumn = Nome do campo no banco de dados
     * @param $pasta = Pasta em que deve ser salvo
     */
    private function imageUpload($imagens, $imagemColumn = null, $pasta = null){

        $uploadImagens = [];

        $tenant = auth()->user()->tenant;

        if (is_array($imagens)){
            foreach ($imagens as $imagem){
                $uploadImagens[] = [$imagemColumn => $imagem->store("tenants/{$tenant->uuid}/produtos", 'public')];
            }
        } else {
            $uploadImagens = $imagens->store("tenants/{$tenant->uuid}/{$pasta}", 'public');
        }

        return $uploadImagens;

    }

}
