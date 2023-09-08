<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imageUrl = asset('images/' . $imageName);

                return $this->sendSuccess(["imageUrl" => $imageUrl], "Image uploaded successfully");
            }

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());

        }

    }


}
