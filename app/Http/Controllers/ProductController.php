<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;

    //Injeção de Dependencias
    //Cria uma instancia de Request assim que o metodo construtor desta classe for acionado
    public function __construct(Request $request)
    {
        //Mostra na tela o conteudo da instancia de Request e para o programa
        //dd($request);

        //Atributo da classe resquest recebe a instancia de request criada, permitindo que esta instancia
        //seja utilizada em qualquer lugar da classe
        $this->request = $request;

        //Aplica o middleware auth para todos os metodos
        //$this->middleware('auth');

        //Aplica o middleware auth para metodos especificos
        /*$this->middleware('auth')->only([
            'create', 'store'
        ]);*/

        //Aplica o middleware auth para todos os metodos, exceto alguns especificos
        // $this->middleware('auth')->except([
        //     'index', 'show'
        // ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $teste2 = 12;
        $teste3 = [];
        $products = ['Tv', 'Geladeira', 'Forno', 'Sofá'];

        //Retorna a view de nome "test" contida em "resources/views"
        //[] - Passa como parametro um array, onde no indice "teste" contem o valor da variavel "$teste" Ex: ('test', ['teste' => $teste],)
        //compact - Forma simplificada de passar um parametro. Cria um array a partir apenas do nome da variavel que deseja enviar
        //OBS: Por estar no padrão, não é necessario especificar o caminho, nem a extensão ".blade.php"
        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Retorna o conteudo de todos os campos existentes no formulario
        // dd($request->all());

        //Retorna o conteudo dos campos "name" e "description"
        // dd($request->only(['name', 'description']));

        //Retorna o conteudo do campo "name"
        // dd($request->name);

        //Verifica se o campo "name" existe
        // dd($request->has('name'));

        //Retorna "Não existe" caso o campo não seja encontrado
        // dd($request->input('names', 'Não existe'));

        //Retorna todos os campos, exceto o campo "_token"
        // dd($request->except('_token'));

        //Verifica se "photo" é um arquivo valido
        if ($request->file('photo')->isValid()) {
            //Retorna as informações do arquivo contido em "photo"
            // dd($request->file('photo'));

            //Retorna a extensão do arquivo contido em "photo"
            // dd($request->photo->extension());

            //Retorna o nome original do arquivo contido em "photo"
            // dd($request->photo->getClientOriginalName());

            //Armazena o arquivo contido em "photo" em "storage/app/products"
            // dd($request->photo->store('products'));

            //Recebe o nome enviado pelo formulario e concatena com a extensão original do arquivo contido em "photo"
            $nameFile = $request->nameFile . '.' . $request->photo->extension();

            //Armazena o arquivo do arquivo contido em "photo" em "storage/app/products", utilizando como nome o valor envido pelo usuario, mantendo sua extensão original
            dd($request->photo->storeAs('products', $nameFile));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Detalhes do produto: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("Editando o produto {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
