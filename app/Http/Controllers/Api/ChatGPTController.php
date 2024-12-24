<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Providers\OpenAIService;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\SiteDataController;
use App\Http\Requests\Site\Ask\AskRequest;
use App\Models\Dream;
use App\Models\ClientDetail;
use App\Http\Controllers\Web\DreamController;

class ChatGPTController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }


    public function askshow()
    {
        $sitedctrlr = new SiteDataController();
        $transarr = $sitedctrlr->FillTransData('ar');
        $defultlang = $transarr['langs']->first();
        return view('site.ask.ask-form', ['defultlang' => $defultlang, 'lang' => 'ar']);

    }
    public function senddream(AskRequest $request)
    {
        $question = $request->input('question');
        $gender = $request->input('gender');
        $martial = $request->input('martial');
        $age = $request->input('age');

        $response = $this->openAIService->askChatGPT($question, $gender, $martial, $age);
        $response = json_decode($response, true);
        //  $response = $question . '-' . $gender . '-' . $martial . '-' . $age;
        //store post
        $title = $response['title'];
        $newObj = new Dream;
        $newObj->title = $title;
        $newObj->content = $response['answer'];
        $newObj->question = $question;
        $newObj->status = 2;

        $newObj->gender = $gender;
        $newObj->martial = $martial;
        $newObj->age = $age;

        $postctrlr = new DreamController();
        $postctrlr->storedream($newObj);
        return response()->json(['response' => $response['answer']]);

    }

}
