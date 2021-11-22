<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function createService(ServiceRequest $request){
        $input = $request->all();
        $service = new Service();
        $service->name = $input['name'];
        $service->save();
    }
    public function showService(){
        $list = Service::all();
        return $list;
    }
    public function updateService(ServiceRequest $request, $id){
        $input = $request->all();
        $service = Service::find($id);
        if(isset($input['name'])){
            $service->name = $input['name'];
        }
        $service->update();
    }
    public function deleteService($id){
        $service = Service::find($id);
        $service->delete();
    }
}
