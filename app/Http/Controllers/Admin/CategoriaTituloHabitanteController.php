<?php

    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use App\Models\CategoriaTituloHabitante;
    use App\Models\Logger;
    use Illuminate\Http\Request;
   

class CategoriaTituloHabitanteController extends Controller
{


    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['categoria_titulo_habitantes']=CategoriaTituloHabitante::all();
        $this->loggerData("Listou Categoria Titulo Habitantes");

        return view('admin.categoria_titulo_habitante.index', $data);

    }



    public function create(){
        return view('admin.categoria_titulo_habitante.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        $request->validate([
            'vc_nome'=>'required',
        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',


        ]);
        //dd($request);
        try{
            $categoria_titulo_habitante=CategoriaTituloHabitante::create([
                'vc_nome'=>$request->vc_nome,


            ]);

             $this->loggerData(" Cadastrou a categoria_titulo_habitante " . $request->vc_nome);

            return redirect()->back()->with('categoria_titulo_habitante.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('categoria_titulo_habitante.create.error',1);
        }


     }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        //
        $data["categoria_titulo_habitante"] = CategoriaTituloHabitante::find($id);

        return view('admin.categoria_titulo_habitante.edit.index',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



     public function update(Request $request, int $id)
     {
        $request->validate([
            'vc_nome'=>'required',
        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',

        ]);
          try {
             //code...
             $categoria_titulo_habitante = CategoriaTituloHabitante::find($id);

             $c =CategoriaTituloHabitante::findOrFail($id)->update([
                'vc_nome'=>$request->vc_nome,

             ]);
            $this->loggerData("Editou a categoria_titulo_habitante que possui o id $categoria_titulo_habitante->id  e nome  $categoria_titulo_habitante->vc_nome");
             return redirect()->back()->with('categoria_titulo_habitante.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('categoria_titulo_habitante.update.error',1);
          }
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        try {
            //code...
            $categoria_titulo_habitante =CategoriaTituloHabitante::findOrFail( $id);

            CategoriaTituloHabitante::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o categoria_titulo_habitante , ($categoria_titulo_habitante->vc_nome)");
            return redirect()->back()->with('categoria_titulo_habitante.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_titulo_habitante.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $categoria_titulo_habitante = CategoriaTituloHabitante::findOrFail($id);
            CategoriaTituloHabitante::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a categoria_titulo_habitante  ($categoria_titulo_habitante->vc_nome)");
            return redirect()->back()->with('categoria_titulo_habitante.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_titulo_habitante.purge.error',1);
        }
    }

   


}
