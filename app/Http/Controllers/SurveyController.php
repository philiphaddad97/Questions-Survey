<?php

namespace App\Http\Controllers;

use App\Http\Requests\Survey\DeleteSurveyIdsRequest;
use App\Http\Requests\Survey\SurveyRequest;
use App\Services\SurveyService;
class SurveyController extends Controller
{

    public function __construct(SurveyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $surveys = $this->service->index(5);

        return view('surveys.index', compact('surveys'));

    }

    public function create()
    {
        return view('surveys.create');
    }


    public function store(SurveyRequest $request)
    {
        $this->service->store($request->title,$request->email, $request->questions);
        return $this->response('success');

    }


    public function delete(DeleteSurveyIdsRequest $request)
    {
        $this->service->delete($request->ids);
        return redirect()->route('survey.index');
    }




}
