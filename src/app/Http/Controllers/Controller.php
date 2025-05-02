<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * フラッシュメッセージをセット
     *
     * @param string $name
     * @param string $message
     * @return void
     */
    protected function setFlashMessage(string $name, string $message): void
    {
        session()->flash($name, $message);
    }

    protected function apiResponse(array $data = [], int $status = 200, array $headers = [])
    {
        return response()->json($data, $status, $headers);
    }
}
