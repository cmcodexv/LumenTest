<?php

declare(strict_types=1);

namespace Src\BoundedContext\Service\Application;

use Illuminate\Http\Request;

use Src\BoundedContext\Service\Domain\Contracts\ServiceRepositoryContract;

final class GetServiceUseCase
{
    private $repository;

    public function __construct(ServiceRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(Request $request)
    {

        $lang = $request->lang;
        //lenguaje por defecto
        $selectName = "service.name_en";
        if (is_null($lang) || empty($lang)) {
            return response()->json(['error' => 'Please specify the language!'], 400);
        } else {

            //suponiendo que el parámetro se enviará desde un combobox con 2 opciones (es_en)
            if ($lang === "es") {
                $selectName = "service.name_es";
            }

            $service = $this->repository->get($selectName);

            return $service;
        }
    }
}
