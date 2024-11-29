<?php

namespace Test\Feature;

use App\Models\Alumno;
use App\Http\Controllers\AlumnoController;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AlumnoControllerUnitTest extends TestCase
{
    public function probar_validacion_falla_para_crear_Alumnos()
    {
        $controller = new AlumnoController();
        $request = Request::create('/alumnos', 'POST', [
            'name' => '',
            'apellido' => '',
            'email' => '',
            'edad' => ''
        ]);
        $this->expectException(ValidationException::class);

        $controller->store($request);
    }
    public function probar_validacion_validacion_correcta_para_crear_Alumnos()
    {
        $controller = new AlumnoController();
        $request = Request::create('/alumnos', 'POST', [
            'name' => 'Kevin',
            'apellido' => 'Calix',
            'email' => 'KCalix@unicah.edu',
            'edad' => '20'
        ]);
        $response=$controller->store($request);
        $this->assertTrue($response->isRedirect(route('alumnos.index')));
    }
}
