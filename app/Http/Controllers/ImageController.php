<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{

    public $users = [
        [
            "id" => "1",
            "firstName" => "Alex",
            "lastName" => "The Boss",
            "email" => "alex.the.boss@gmail.com",
            "phone" => "123-456-1234"
        ],
        [
            "id" => "2",
            "firstName" => "Ass",
            "lastName" => "Malick",
            "email" => "ass.malick@gmail.com",
            "phone" => "094-044-1234"
        ],
        [
            "id" => "3",
            "firstName" => "Jean",
            "lastName" => "claude",
            "email" => "jean.claude@gmail.com",
            "phone" => "1343-044-1234"
        ],
        [
            "id" => "4",
            "firstName" => "Bruce",
            "lastName" => "lee",
            "email" => "bruce.lee@gmail.com",
            "phone" => "0324-044-1234"
        ],
        [
            "id" => "5",
            "firstName" => "John",
            "lastName" => "Wick",
            "email" => "john.Wick@gmail.com",
            "phone" => "1324-044-1234"
        ],
        [
            "id" => "6",
            "firstName" => "Dony",
            "lastName" => "lee",
            "email" => "dony.lee@gmail.com",
            "phone" => "293-044-1234"
        ],
    ];
    /**
     * Generate Image View
     *
     * @return void
     */
    public function generateImageText(Request $request, $id)
    {
        $user = null;
        foreach ($this->users as $u) {
            if ($u["id"] == $id) {
                $user = $u;
            }
        }

        if ($user != null) {
            return view('index', compact('user'));
        }

        return redirect()->route('list');
    }


    public function index()
    {
        //  dd();
        $users = $this->users;
        return view('list', compact("users"));
    }

    /**
     * Store Generate Image
     *
     * @return void
     */
    public function generateImageTextStore(Request $request)
    {

        $text = "Hello world!"; ///;$request->input('text');

        // if ($request->file('name') != "") {

        $file = "test"; //$request->file('name');

        $file_name = time() . '_' . $file; //.->getClientOriginalName();

        $img = Image::make($file);

        dd($img);
        $img->text($text, 500, 220, function ($font) {
            $font->file(public_path("Open_Sans/OpenSans-Italic-VariableFont_wdth,wght.ttf"));
            $font->size(40);
            $font->color("#FFF");
            $font->align("center");
            $font->valign("top");
        });

        $img->save(public_path($file_name));
        dd($img->response("jpg"));
        return $img->response("jpg");
        //}

        return back();
    }
}
