<?php
namespace App\Traits;

trait SavableAsPng {

    public function save_as_png($type = 'poker'){
        $width = 825;
        $height = 1125;
        $rotate = false;
        switch ($type) {
            case 'jumbo':
                $width = 1725;
                $rotate = true;
                break;
            case 'small-chit':
                $width = 225;
                $height = 225;
                break;
            case 'medium-chit':
                $width = 300;
                $height = 300;
                break;
        }
        $crop_margin = 35;

        // Render
        $class = str_replace("app\\", '', strtolower(static::class));
        if ($class === 'dwarfplanet') {
            $class = 'dwarf-planet';
        } else if ($class === 'habitableworld') {
            $class = 'habitable-world';
        } else if ($class === 'referencecard') {
            $class = 'reference-card';
        }
        $name = str_replace(" ", "_", strtolower($this->name));
        $filename = "/var/www/exo/public/img/cards/{$class}s/{$name}.png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size={$width},{$height} http://192.168.33.10/{$class}/" . $this->id;
        // Can be added to allow js requests to finish --run-all-compositor-stages-before-draw --virtual-time-budget=10000
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);

        // Reduce brightness for printing
        $image = imagecreatefrompng($filename);
        if($image){
            imagefilter($image, IMG_FILTER_BRIGHTNESS, 20);
            if ($rotate){
                $image = imagerotate($image, 90, 0);
            }
            imagepng($image, "/var/www/exo/public/img/print-cards/{$class}s/{$name}.png");
        }

        // Crop for samples
        if ($rotate){
            $image = imagerotate($image, -90, 0);
        }
        $cropped_width = $width - 2*$crop_margin;
        $cropped_height = $height - 2*$crop_margin;
        $image = imagecrop($image, [
            'x' => $crop_margin,
            'y' => $crop_margin,
            'width' => $cropped_width,
            'height' => $cropped_height
        ]);
        if($image) {
            // Save high quality pngs
            imagepng($image, $filename);
            if ($class == 'action' && $this->quantity > 1) {
                // Make extra copies for tts deckbuilding purposes
                for($i=2;$i<=$this->quantity;$i++){
                    $copy_filename = str_replace($name, $name . $i, $filename);
                    imagepng($image, $copy_filename);
                }
            }

            // Save lower-res jpegs
            $filename = str_replace('.png', '.jpg', $filename);
            $filename = str_replace('/cards/', '/cards-jpeg/', $filename);
            $new_width = round($cropped_width * (256/755));
            $new_height = round($cropped_height * (256/755));
            $image_new = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $cropped_width, $cropped_height);
            imagejpeg($image_new, $filename, 90);

            if ($class == 'action' && $this->quantity > 1) {
                // Make extra copies for screentop deckbuilding purposes
                for($i=2;$i<=$this->quantity;$i++){
                    $copy_filename = str_replace($name, $name . $i, $filename);
                    imagejpeg($image, $copy_filename);
                }
            }
            imagedestroy($image);
        }

        return(array($output, $return_var));
    }
}

?>