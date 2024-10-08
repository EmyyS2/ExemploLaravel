<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaIntegracaoTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_tarefa_api(){
        $response = $this->postJson('/api/tarefas', [
            'titulo' => 'Nova tarefa',
            'descricao' => 'Decrição da nova tarefa',
            'concluida' => false
        ]);

        $response->assertStatus(201)-> assertJson([
            'titulo' => 'Nova tarefa',
            'descricao' => 'Decrição da nova tarefa',
            'concluida' => false
        ]);
        
    }

    public function test_validar_tarefa_required(){
        $response = $this->postJson('/api/tarefas', [
            'descricao' => 'Descrição da nova tarefa',
            'concluida' => false
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['titulo']);
    }
}