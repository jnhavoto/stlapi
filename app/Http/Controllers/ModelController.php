<?php

namespace App\Http\Controllers;

use App\Http\Controllers\classesAuxiliares\Auxiliar;
use App\Http\Controllers\interfaces\InterfaceController;
use Illuminate\Http\Request;


class  ModelController extends Controller implements InterfaceController
{


    protected $object;
    protected $objectName;
    protected $objectNames;
    protected $relactionships;


    public function __construct() {

    }


    public function getAll(Request $request) {

        if($request->exists('pagination') and ($request->get('complete') == true)){
            return Auxiliar::retornarDados($this->objectNames, $this->object->with($this->relactionships)->orderBy('id','desc')
                ->paginate($request->input('pagination')), 200);
        }

        if ($request->input('complete') == 'true'){
            return Auxiliar::retornarDados($this->objectNames, $this->object->with($this->relactionships)->orderBy('id','desc')->get(), 200);
        }


        if ($request->exists('pagination') and $request->get('pagination') > 0){
            return Auxiliar::retornarDados($this->objectNames, $this->object->orderBy('id','desc')
                ->paginate($request->input('pagination')), 200);
        }

        else
            return Auxiliar::retornarDados($this->objectNames, $this->object->with($this->relactionships)->orderBy('id','desc')->get
            (),
                200);
    }



    public function get($id)
    {
        if(!$id)
            return Auxiliar::retornarErros('id not found or undefined', 404);
        else{
            if(!$objectEncontrado = $this->object->with($this->relactionships)->find($id))
                return Auxiliar::retornarErros("object with id=$id does not exists", 404);
            else
                return Auxiliar::retornarDados($this->objectName, $objectEncontrado, 200);
        }
    }


    public function store(Request $request) {

        $var_object = $this->object->create($request->all());
        if($var_object)
            return Auxiliar::retornarDados($this->objectName, $var_object, 200);
        else
            return Auxiliar::retornarErros("was not possible to store $this->objectName", 404);
    }


    public function update(Request $object, $id) {
        $var_object = $this->object->find($id);
        if (!$var_object)
            return Auxiliar::retornarErros($this->objectName.' not found', 404);

        else {
            $var_object->update($object->all());
            return Auxiliar::retornarDados($this->objectName, $var_object, 200);
        }
    }

    public function search($id, Request $completo) {
        $var_objecto = $this->object->find($id);
        if (!$var_objecto)
            return Auxiliar::retornarErros($this->objectName.' not found', 404);
        else
            return Auxiliar::retornarDados($this->objectName, $var_objecto, 200);
    }

    public function destroy(Request $objecto, $id) {
        $var_objecto = $this->object->find($id);
        if (!$var_objecto)
            return Auxiliar::retornarErros($this->objectName.' not found', 404);
        else {
            $var_objecto->delete();
            return Auxiliar::retornarDados($this->objectName, $var_objecto, 200);
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
