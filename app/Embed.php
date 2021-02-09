<?php 
use Cohensive\Embed\Facades\Embed;

class EmbedVideo extends Model
{

    public function getVideoHtmlAttribute($url)
    {
        $embed = Embed::make($url)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 400]);
        return $embed->getHtml();
    }

}

 ?>