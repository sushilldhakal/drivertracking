<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteResource;
use App\Http\Requests\StoreResource;
use App\Http\Requests\UpdateResource;
use App\Interfaces\ResourceModel;

class ResourceController extends Controller
{
    public function view($resourceType, $resourceAction = 'index', ResourceModel $model = null)
    {
        $view = [$resourceType];

        if ($model) {
            array_push($view, 'single');
        } else {
            array_push($view, $resourceAction);
        }

        return view(implode('.', $view))->with($resourceType, $model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResource $request, ResourceModel $model)
    {
        abort_if(! $model->fillable, 500, 'Add fillable property in model:'.$model->class_alias);

        $model->user_id = auth()->id();

        $model->fill($request->only($model->fillable));

        $model->save();

        if ($request->has('redirect_url')) {
            return redirect($request->get('redirect_url'));
        }

        return back()->with('success', 'Resource has been created.');
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
