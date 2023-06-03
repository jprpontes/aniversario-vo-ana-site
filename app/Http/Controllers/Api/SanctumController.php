<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanctumSignUpRequest;
use App\Http\Requests\SanctumTokenRequest;
use App\Http\Resources\SignInUserResource;
use App\Models\User;

class SanctumController extends Controller
{
    public function signUp(SanctumSignUpRequest $request)
    {
        $user = User::where('nickname', $request->nickname)->first();

        if ($user) {
            return $this->sendError('Apelido já cadastrado.');
        }

        $user = User::create([
            'name'          => $request->name,
            'nickname'      => $request->nickname,
            'date_of_birth' => $request->date_of_birth,
            'email'         => \Str::uuid(),
            'password'      => \Str::uuid(),
        ]);

        return $this->sendResponse('Usuário criado com sucesso!', [
            'token' => $user->createToken(\Str::uuid())->plainTextToken,
            'user'  => SignInUserResource::make($user)
        ]);
    }

    public function token(SanctumTokenRequest $request)
    {
        $user = User::where('nickname', $request->nickname)->first();

        if (!$user || $request->date_of_birth != $user->date_of_birth) {
            return $this->sendError('As credenciais estão incorretas.', null, 'UNAUTHORIZED');
        }

        return $this->sendResponse('Token gerado com sucesso!', [
            'token' => $user->createToken(\Str::uuid())->plainTextToken,
            'user'  => SignInUserResource::make($user)
        ]);
    }

    public function destroy()
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->sendResponse('Token removido com sucesso!');
    }
}
