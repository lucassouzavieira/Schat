<?php

namespace App\Http\Controllers;

use App\Events\MessageReceived;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(MessageRequest $request)
    {
        try {
            $message = new Message();
            $message->fill($request->except('_token', '_method'));
            $message->save();
            event(new MessageReceived($message->toArray()));
            return new JsonResponse($message->toArray(), JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            if (env('APP_DEBUG')) {
                throw $exception;
            }

            return new JsonResponse([
                'message' => 'Ooops.. algum erro ocorreu aqui no meu lado'
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
