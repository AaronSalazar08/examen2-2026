<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente(): void
    {
        $categoria = Categoria::factory()->create();

        $payload = [
            'codigo'        => 10001,
            'unidad_medida' => 'kg',
            'descripcion'   => 'Material de prueba',
            'ubicacion'     => 'Bodega A',
            'categoria_id'  => $categoria->id,
        ];

        $response = $this->postJson('/api/insert-material', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment(['descripcion' => 'Material de prueba'])
                 ->assertJsonFragment(['nombre' => $categoria->nombre]);

        $this->assertDatabaseHas('materials', [
            'codigo'       => 10001,
            'descripcion'  => 'Material de prueba',
            'categoria_id' => $categoria->id,
        ]);
    }
}
