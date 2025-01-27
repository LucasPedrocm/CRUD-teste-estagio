<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PessoaTest extends TestCase
{

    public function testListagemDePessoas()
    {
        $response = $this->get('/pessoas');
        $response->assertStatus(200);
        $response->assertSee('Lista de Pessoas');
    }
    
    public function testCadastroDePessoa()
    {
        $response = $this->post('/pessoas', [
            'nome' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'email' => 'joao@email.com',
            'telefone' => '11999999999',
            'logradouro' => 'Rua Teste',
            'estado' => '11',
            'cidade' => '1100015',
        ]);
    
        $response->assertRedirect('/pessoas');
        $this->assertDatabaseHas('pessoas', ['nome' => 'João Silva']);
    }
}