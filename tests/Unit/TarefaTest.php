<?php

namespace Tests\Unit;

use App\Models\Tarefa;
use Tests\TestCase;

class TarefaTest extends TestCase
{
    public function test_criar_tarefa(){
        $tarefa = Tarefa::create([
            'titulo' => 'Tarefa teste',
            'descricao' => 'Criando tarefa teste',
            'concluida' => false
        ]);

        $this->assertEquals('Tarefa teste', $tarefa->titulo);
        $this->assertEquals('Criando tarefa teste', $tarefa->descricao);
        $this->assertFalse($tarefa->concluida);
    }
}
