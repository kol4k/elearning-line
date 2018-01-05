<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\GetMessageRequest;
use App\Http\Services\GetMessageService;
use Symfony\Component\HttpFoundation\Request;

class LineMessageController extends Controller
{
    /**
     * @var GetMessageService
     */
    private $messageService;

    /**
     * GetMessageController constructor.
     * @param GetMessageService $messageService
     */
    public function __construct(GetMessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function getMessage(GetMessageRequest $request)
    {
        //logger("request : ", $request->all());
        $this->messageService->replySend($request->json()->all());
    }
}
