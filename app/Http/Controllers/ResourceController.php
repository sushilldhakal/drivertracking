<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteResource;
use App\Http\Requests\GetResource;
use App\Http\Requests\ListResource;
use App\Http\Requests\StoreResource;
use App\Http\Requests\UpdateResource;
use App\Interfaces\ResourceModel;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListResource $request, ResourceModel $model)
    {
        return $model->where(['user_id' => auth()->id()])->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResource $request, ResourceModel $model)
    {
        $model->user_id = auth()->id();
        
        $model->fill($request->only($model->fillable));

        if($request->has('image')) {
            $model->image_id = $model->storeImage($request->get('image'));
        }
       
        $model->save();

        auth()->logout();

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetResource $request, ResourceModel $model)
    {
        return $model;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResource $request, ResourceModel $model)
    {
        $model->update($request->validated());

        $model->attachTags($request->get('add_tags', []));

        $model->detachTags($request->get('remove_tags', []));

        return ['message' => 'Resource updated successfully', 'resource' => $model];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteResource $request, ResourceModel $model)
    {
        $model->delete();

        return ['message' => 'Resource deleted successfully'];
    }
}
