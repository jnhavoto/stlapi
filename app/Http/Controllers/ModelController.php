<?php

namespace App\Http\Controllers;

use App\Http\Controllers\classesAuxiliares\Auxiliar;
use App\Http\Controllers\interfaces\InterfaceController;
use Illuminate\Http\Request;


class  ModelController extends Controller implements InterfaceController
{


    protected $objecto;
    protected $nomeObjecto;
    protected $nomeObjectos;
    protected $relacionados;


    public function __construct() {

    }


    public function getAll(Request $completo) {

        if($completo->exists('paginacao') and ($completo->get('completo') == true)){
            return Auxiliar::retornarDados($this->nomeObjectos, $this->objecto->with($this->relacionados)->orderBy('id','desc')
                ->paginate($completo->input('paginacao')), 200);
        }

        if ($completo->input('completo') == 'true'){
            return Auxiliar::retornarDados($this->nomeObjectos, $this->objecto->with($this->relacionados)->orderBy('id','desc')->get(), 200);
        }


        if ($completo->exists('paginacao') and $completo->get('paginacao') > 0){
            return Auxiliar::retornarDados($this->nomeObjectos, $this->objecto->orderBy('id','desc')
                ->paginate($completo->input('paginacao')), 200);
        }

        else
            return Auxiliar::retornarDados($this->nomeObjectos, $this->objecto->orderBy('id','desc')->get(), 200);
    }



    public function get($id)
    {
        if(!$id)
            return Auxiliar::retornarErros('ID invalido ou nao encontrado', 404);
        else{
            if(!$objectEncontrado = $this->objecto->find($id))
                return Auxiliar::retornarErros($this->nomeObjecto.' Nao encontrado(a)', 404);
            else
                return Auxiliar::retornarDados($this->nomeObjecto, $objectEncontrado, 200);
        }
    }


    public function store(Request $request) {

        $var_objecto = $this->objecto->create($request->all());
        if($var_objecto)
            return Auxiliar::retornarDados($this->nomeObjecto, $var_objecto, 200);
        else
            return Auxiliar::retornarErros('Nao foi possivel salvar o '.$this->nomeObjecto, 404);
    }


    public function update(Request $objecto, $id) {
        $var_objecto = $this->objecto->find($id);
        if (!$var_objecto)
            return Auxiliar::retornarErros($this->nomeObjecto.' nao encontrado', 404);

        else {
            $var_objecto->update($objecto->all());
            return Auxiliar::retornarDados($this->nomeObjecto, $var_objecto, 200);
        }
    }

    public function search($id, Request $completo) {
        $var_objecto = $this->objecto->find($id);
        if (!$var_objecto)
            return Auxiliar::retornarErros($this->nomeObjecto.' nao foi encontrado', 404);
        else
            return Auxiliar::retornarDados($this->nomeObjecto, $var_objecto, 200);
    }

    public function destroy(Request $objecto, $id) {
        $var_objecto = $this->objecto->find($id);
        if (!$var_objecto)
            return Auxiliar::retornarErros($this->nomeObjecto.' nao encontrado', 404);
        else {
            $var_objecto->delete();
            return Auxiliar::retornarDados($this->nomeObjecto, $var_objecto, 200);
        }
    }


    public function saveTransactions(Request $objectos) {

    }

    public function searchMany(...$atributos) {
        // TODO: Implement pesquisarMuitos() method.
    }

    public function getLast() {
        // TODO: Implement buscarUltimo() method.
    }



}
