<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PessoaController extends Controller
{
    public function index(Request $request)
    {
        $query = Pessoa::query();
    
        if ($request->has('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%')
                  ->orWhere('cpf', 'like', '%' . $request->search . '%');
        }
    
        $pessoas = $query->paginate(10); 
        return view('pessoas.index', compact('pessoas'));
    }
    
    public function create()
    {
        return view('pessoas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pessoas,cpf',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:pessoas,email',
            'telefone' => 'required|string|max:15',
            'logradouro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        Pessoa::create($validated);
        return redirect()->route('pessoas.index')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function show($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.show', compact('pessoa'));
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pessoas,cpf,' . $id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:pessoas,email,' . $id,
            'telefone' => 'required|string|max:15',
            'logradouro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($validated);
        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa excluída com sucesso!');
    }

    public function getEstados()
    {
        try {
            $path = storage_path('app/json/estados-cidades.json'); 
            $data = json_decode(file_get_contents($path), true);
    

            $estados = [];
            foreach ($data['states'] as $id => $nome) {
                $estados[] = [
                    'id' => $id,
                    'nome' => $nome
                ];
            }
    
            return response()->json($estados); 
        } catch (\Exception $e) {
            \Log::error('Erro ao carregar estados: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao carregar estados'], 500);
        }
    }
    

    public function getCidades($estadoId)
    {
        try {
            $path = storage_path('app/json/estados-cidades.json');
            $data = json_decode(file_get_contents($path), true);
    
  
            $municipios = array_filter($data['cities'], function ($cidade) use ($estadoId) {
                return $cidade['state_id'] == $estadoId;
            });
    

            return response()->json(array_values($municipios));
        } catch (\Exception $e) {
            \Log::error('Erro ao carregar cidades: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao carregar cidades'], 500);
        }
    }
}    