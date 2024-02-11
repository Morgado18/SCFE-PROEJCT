<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Tarefa;

    class TarefaController extends Controller
    {
        public function dash(){
            $tarefas = Tarefa::orderBy('id','desc')->get();
            $search = request('search');
            if($search){
                $tarefas = Tarefa::where([
                    ['nome','like','%'.$search.'%']
                ])->get();
                return view('admin.tarefa.dash', ['tarefas' => $tarefas, 'search' => $search]);
            }else{
                return view('admin.tarefa.dash', ['tarefas' => $tarefas]);
            }
        }

        public function home(){
            return view('admin.tarefa.home');
        }

        public function store(Request $request){
            $tarefa = new Tarefa;
            $tarefa->nome = $request->nome;
            $tarefa->save();
            return redirect('/tarefa/dash')->with('tarefaCadastrada','cadastrada');
        }

        public function destroy($id){
            Tarefa::findOrFail($id)->delete();
            return redirect('/tarefa/dash')->with('tarefaEliminada','eliminada');
        }

        public function purge($id){
            $tarefa = Tarefa::findOrFail($id);
            $tarefa->delete();
            return redirect('/tarefa/dash')->with('tarefaPurgada','purgada');
        }

        public function update(Request $request){
            Tarefa::findOrFail($request->id)->update(request()->all());
            return redirect('/tarefa/dash')->with('tarefaEditada','editada');
        }

    }
