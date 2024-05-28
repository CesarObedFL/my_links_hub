<?php

namespace App\Http\Controllers;

//use App\Exceptions\InvalidArgumentException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Link;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;


class LinkController extends Controller
{

    public static function save(Request $request)
    {
        if (Str::isUrl($request->get('url'), ['http', 'https'])) {

            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', $request->get('url'));
            
            $page_title = $crawler->filter('title')->text();

            $protocol =  Str::substr($request->get('url'), 0, Str::position($request->get('url'), '://') + 3);
            $url = Str::substr($request->get('url'), Str::position($request->get('url'), '://') + 3, Str::length($request->get('url')));
            
            if ( Str::of($url)->contains('medium.com') ){
                $domain = 'medium.com';
            } else {
                $domain = Str::substr($url, 0, Str::position($url, '/'));
            }

            $platform = $protocol . $domain;

            switch( $domain ) {
                case 'cerebrodigital.net':

                    //$alt_image = $crawler->filter('.wp-block-post-featured-image')->filter('img')->attr('alt');
                    //$image = $crawler->selectImage($alt_image)->image();

                    try {
                        $src_image = $crawler->filter('.wp-block-post-featured-image')->filter('img')->attr('srcset');
                    } catch (\InvalidArgumentException $e) {
                        $src_image = $crawler->filter('.wp-block-image')->filter('img')->attr('srcset');
                    } catch(\Exception $e) {
                        $src_image = 'no_hay_imagen.jpg';
                    }

                    $src_image = Str::substr($src_image, 0, Str::position($src_image, ','));
                    $src_image = Str::of($src_image)->replace(' ', '%');

                    $image_name = Str::reverse($src_image);
                    $image_name = Str::substr($image_name, 0, Str::position($image_name, '/'));
                    $image_name = Str::reverse($image_name);
                    $image_name = Str::substr($image_name, 0, Str::position($image_name, '?'));
        
                    

                    break;
                case 'www.xataka.com.mx':
                    $alt_image = $crawler->filter('picture')->filter('img')->attr('alt');
                    $image = $crawler->selectImage($alt_image)->image();
                    break;
                case 'medium.com':
                    $alt_image = $crawler->filter('picture')->filter('img')->attr('alt');
                    $image = $crawler->selectImage($alt_image)->image();
                    break;
                case 'app.daily.dev':
                    $image = $crawler->selectImage('Post cover image')->image();
                    break;
                default:
                    $image = $crawler->filter('picture')->filter('img')->attr('src');
                    break;
            }

            //Storage::disk('public_thumbnails')->put($image_name, file_get_contents($src_image));
            //Storage::disk('local')->delete('path/to/store/'.$filename);

            dd(['page_title' => $page_title, 'platform' => $platform, 'src_image' => $src_image, 'image_name' => $image_name]);

        }
    }

    public function list()
    {

    }
}
