<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryRequest;
use App\Http\Resources\LibraryResource;
use App\Models\Library;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LibraryResource::collection(
            Library::orderBy('name', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryRequest $request)
    {
        $library = Library::create($request->validated());
        return new LibraryResource($library);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        return new LibraryResource($library);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(LibraryRequest $request, Library $library)
    {
        $library->update($request->validated());

        return new LibraryResource($library);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $library->delete();
        return response()->noContent();
    }

    public function search($name) {

        return LibraryResource::collection(
            Library::where('name', 'like', '%' . $name . '%')
                    ->orderBy('name', 'ASC')
                    ->get()
        );

    }

}
