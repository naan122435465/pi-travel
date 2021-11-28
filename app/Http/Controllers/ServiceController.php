<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Repositories\RepositoryInterfaces\ServiceInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceRe;
    public function __construct(ServiceInterface $serviceRe)
    {
        $this->serviceRe = $serviceRe;
    }

    public function createService(ServiceRequest $request)
    {
        $input = $request->all();
        $result = $this->serviceRe->create($input);
        return($result);
    }

    public function showService()
    {
        $result = $this->serviceRe->getAll();
        return $result;
    }

    public function updateService(ServiceRequest $request, $id)
    {
        $input = $request->all();
        $result = $this->serviceRe->update($input, $id);
        return $result;
    }

    public function deleteService($id)
    {
        $result = $this->serviceRe->delete($id);
        return $result;
    }
    // public function createService(ServiceRequest $request){
    //     $input = $request->all();
    //     $service = new Service();
    //     $service->name = $input['name'];
    //     $service->save();
    // }
    // public function showService(){
    //     $list = Service::all();
    //     return $list;
    // }
    // public function updateService(ServiceRequest $request, $id){
    //     $input = $request->all();
    //     $service = Service::find($id);
    //     if(isset($input['name'])){
    //         $service->name = $input['name'];
    //     }
    //     $service->update();
    // }
    // public function deleteService($id){
    //     $service = Service::find($id);
    //     $service->delete();
    // }
}
