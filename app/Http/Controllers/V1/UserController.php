<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\User\Concretes\UserService;
use Illuminate\Http\JsonResponse;

/**
 * UserController
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Return list of users
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->userService->all();

        return response()->json($users);
    }
}
