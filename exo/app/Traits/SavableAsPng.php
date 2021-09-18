<?php
namespace App\Traits;

trait SavableAsPng {

    public function save_as_png($jumbo = false){
        $width = $jumbo ? 1725 : 825;
        $height = 1125;
        $crop_margin = 35;

        // Render
        $class = str_replace("app\\", '', strtolower(static::class));
        $filename = "/var/www/exo/public/img/cards/{$class}s/" . str_replace(" ", "_", strtolower($this->name)) . ".png";
        $cmd = "google-chrome --headless --disable-gpu --screenshot=$filename --window-size={$width},{$height} http://192.168.33.10/{$class}/" . $this->id;
        $output = "";
        $return_var = 0;
        exec(escapeshellcmd($cmd), $output, $return_var);

        // Reduce brightness for printing
        $image = imagecreatefrompng($filename);
        if($image && imagefilter($image, IMG_FILTER_BRIGHTNESS, 20)){
            imagepng($image, "/var/www/exo/public/img/print-cards/{$class}s/" . str_replace(" ", "_", strtolower($this->name)) . ".png");
        }

        // Crop for samples
        $cropped = imagecrop($image, [
            'x' => $crop_margin,
            'y' => $crop_margin,
            'width' => $width - 2*$crop_margin,
            'height' => $height - 2*$crop_margin
        ]);
        if($image) {        
            imagepng($cropped, $filename);
            imagedestroy($image);
            imagedestroy($cropped);
        }

        return(array($output, $return_var));
    }
}

?>