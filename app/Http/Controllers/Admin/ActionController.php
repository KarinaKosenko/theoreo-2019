<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ActionRequest;
use App\Models\{
    Action, Tag
};
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActionController extends Controller
{

    protected $name = 'actions.';
    protected $folderPath = 'admin.pages.actions.';
    const QUERY_EXCEPTION_READABLE_MESSAGE = 2;

    public function index()
    {
        $actions = Action::orderBy('created_at', 'asc')->get();
        return view($this->folderPath . 'index', [
            'actions' => $actions,
        ]);
    }

    public function create()
    {
        return view($this->folderPath . 'create');
    }

    public function store(ActionRequest $request)
    {
        $tags = tags_from_string($request->tags);
        $request->merge(['code' => $request->title]);
        $request->merge(['rating' => '0']);
        /** @var Action $action */
        try {
            $action = Action::create($request->except('tags'));
            $action->tags()->attach($tags);
            $message = 'Добавление выполнено успешно!';
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }
        $request->session()->flash('message', $message);
        return Redirect::to(route($this->name . 'index'));
    }


    public function show($id)
    {
        $action = Action::findOrFail($id);
        return view($this->folderPath . 'show', ['action' => $action]);
    }


    public function edit($id)
    {
        $action = Action::findOrFail($id);
        $tags = tags_to_string($action->tags);
        return view($this->folderPath . 'edit', [
            'action' => $action, 'tags' => $tags,
        ]);
    }


    public function update(ActionRequest $request, $id)
    {
        $request->merge(['code' => $request->name]);
        $tags = tags_from_string($request->tags);
        /** @var Action $action */
        $action = Action::findOrFail($id);
        try {
            $action->update($request->except(['current_id','tags']));
            $action->tags()->sync($tags);
            $message = 'Обновление выполнено успешно!';
            $request->session()->flash('message', $message);
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }
        Session::flash('message', $message);
        return Redirect::to(route($this->name . 'index'));
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        /** @var Action $action */
        try {
            $action->tags()->detach();
            $action->delete();
            $message = 'Удаление выполнено успешно!';
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }
        Session::flash('message', $message);
        return Redirect::to(route($this->name . 'index'));
    }
}
