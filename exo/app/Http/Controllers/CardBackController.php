<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardBackController extends Controller
{

    private $card_types = [
        "Actions",
        "Asteroids",
        "Dwarf Planets",
        "Habitable Worlds",
        "Lifeforms",
        "Moons",
        "Planets",
        "Stars",
        "Trade Ships"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('card_back.index', ["card_types" => $this->card_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('card_back.show', ['card_type'=>$this->card_types[$id-1]]);
    }

    // TODO...this is copypasta from SavableAsPng since Cardbacks arent real models...either make them into models or find another way to not repeat this code
    public function save_all_as_png(){
        $width = 825;
        $height = 1125;
        $crop_margin = 35;

        $card_count = count($this->card_types);
        $row_count = ceil($card_count / 16);
        $sheet = imagecreatetruecolor(4096, $row_count * 358);
        for($i=1;$i<=$card_count;$i++){
            echo "<br>Saving a card back...<br>";
            $filename = "/var/www/exo/public/img/cards/card-backs/" . $i . ".png";
            $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size={$width},{$height} http://192.168.33.10/card-back/" . $i;
            $output = "";
            $return_var = 0;
            exec(escapeshellcmd($cmd), $output, $return_var);
            print_r($output);
            print_r($return_var);

            // Reduce brightness for printing
            $image = imagecreatefrompng($filename);
            if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
                imagepng($image, "/var/www/exo/public/img/print-cards/card-backs/" . $i . ".png");
            }

            // Crop for samples/playtesting platforms
            $cropped_width = $width - 2*$crop_margin;
            $cropped_height = $height - 2*$crop_margin;
            $image = imagecrop($image, [
                'x' => $crop_margin,
                'y' => $crop_margin,
                'width' => $cropped_width,
                'height' => $cropped_height
            ]);
            if($image) {
                // Save high quality png
                imagepng($image, $filename);

                // Save lower-res jpeg
                $filename = str_replace('.png', '.jpg', $filename);
                $filename = str_replace('/cards/', '/cards-jpeg/', $filename);
                $new_width = round($cropped_width * (256/755));
                $new_height = round($cropped_height * (256/755));
                $image_new = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $cropped_width, $cropped_height);
                imagejpeg($image_new, $filename, 90);
                $image = imagecreatefromjpeg($filename);
                imagecopymerge($sheet, $image, ($i-1)*256, floor(($i-1)/16)*358, 0, 0, 256, 358, 100);
                imagedestroy($image);
            }
        }
        imagejpeg($sheet, "/var/www/exo/public/img/screentop/card-backs-16x{$row_count}-{$card_count}.jpg", 80);
        imagedestroy($sheet);
        return "<br>Done<br>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
