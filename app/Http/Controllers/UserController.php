<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUpdateUserRequest;

class UserController extends Controller
{
    public function __construct(protected User $repository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->repository->paginate();

        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $user = $this->repository->create($data);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = $this->repository->find($id);
        // $user = $this->repository->where('id', '=', $id)->first();

        $user = $this->repository->findOrFail($id);

        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user = $this->repository->findOrFail($id);

        $user->update($data);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->repository->findOrFail($id);
        $user->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
