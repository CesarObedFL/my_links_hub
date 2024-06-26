<?php

namespace App\Livewire\Links;

use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Validate;
use App\Http\Livewire\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Link;
use App\Models\LinkList;
use App\Models\Tag;
use App\Models\Taggings;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class SaveLink extends ModalComponent
{
    use LivewireAlert;

    #[Validate('required', message: 'The url is required!')] 
    public $url;

    #[Validate('required', message: 'You must choose one list')] 
    public $link_list_id;

    public $tag = '';
    public $tags = [];

    protected $listeners = [ 
        'list_created' => 'create_list_alert', 
        'link_saved' => 'render', 
        'refreshComponent' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.links.save-link', [ "link_list" => LinkList::all(), 'tag_list' => Tag::all() ]);
    }

    public function save()
    {
        $this->validate();

        if ( Str::isUrl($this->url, ['http', 'https']) ) {

            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', $this->url);
            
            $page_title = $crawler->filter('title')->text();

            $protocol =  Str::substr($this->url, 0, Str::position($this->url, '://') + 3);
            $url = Str::substr($this->url, Str::position($this->url, '://') + 3, Str::length($this->url));
            
            if ( Str::of($this->url)->contains('medium.com') ){
                $domain = 'medium.com';
            } elseif ( Str::of($this->url)->contains('youtu') ){
                $domain = 'youtube.com';
            } elseif ( Str::of($this->url)->contains('mercadolibre.com') ){
                $domain = 'mercadolibre.com';
            } else {
                $domain = Str::substr($url, 0, Str::position($url, '/'));
            }

            $platform = $protocol . $domain;
            $src_image = null;
            $image_name = null;

            switch( $domain ) {
                case 'cerebrodigital.net':
                    try {
                        $src_image = $crawler->filter('.wp-block-post-featured-image')->filter('img')->attr('srcset');
                    } catch (\InvalidArgumentException $e) {
                        $src_image = $crawler->filter('.wp-block-image')->filter('img')->attr('srcset');
                    } catch(\Exception $e) {
                        $src_image = null;
                    }

                    if ( $src_image ) {
                        $src_image = Str::substr($src_image, 0, Str::position($src_image, ','));
                        $src_image = Str::of($src_image)->replace(' ', '%');
                        $image_name = Str::reverse($src_image);
                        $image_name = Str::substr($image_name, 0, Str::position($image_name, '/'));
                        $image_name = Str::reverse($image_name);
                        $image_name = Str::substr($image_name, 0, Str::position($image_name, '?'));
                    }
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

                case 'mercadolibre.com':
                    try {
                        $src_image = $crawler->filter('.ui-pdp-gallery__figure')->filter('img')->attr('src');
                    } catch (\InvalidArgumentException $e) {
                        $src_image = null;
                    } catch(\Exception $e) {
                        $src_image = null;
                    }

                    if ( $src_image ) {
                        $image_name = Str::reverse($src_image);
                        $image_name = Str::substr($image_name, 0, Str::position($image_name, '/'));
                        $image_name = Str::reverse($image_name);
                    }

                    if ( Str::length($this->url) > 254 ) {
                        $pos_reco_id = Str::position($this->url, 'reco_id=');
                        $reco_id = Str::substr($this->url, $pos_reco_id, Str::length($this->url));
                        $reco_id = Str::substr($reco_id, 0, Str::position($reco_id, '&'));
                        $this->url = Str::substr($this->url, 0, Str::position($this->url, '#'));
                        $this->url .= '#' . $reco_id;
                    }
                    
                    break;

                case 'youtube.com':
                    $image_name = Str::substr($this->url, Str::position($this->url, 'v='), Str::length($this->url));
                    if (  Str::of($image_name)->contains('&') ) {
                        $image_name = Str::substr($image_name, Str::position($image_name, 'v=') + 2, Str::position($image_name, '&') - 2);
                    } else {
                        $image_name = Str::substr($image_name, Str::position($image_name, 'v=') + 2, Str::length($image_name));
                    }
                    $src_image = "http://img.youtube.com/vi/{$image_name}/mqdefault.jpg";
                    break;

                default:
                    $src_image = null;
                    $image_name = null;
                    break;
            }

            //dd([ 'url' => $this->url, 'page_title' => $page_title, 'platform' => $platform, 'src_image' => $src_image, 'image_name' => $image_name, 'link_list_id' => $this->link_list_id ]);

            if ( $image_name ) {
                Storage::disk('public_thumbnails')->put($image_name, file_get_contents($src_image));
            }

            $link = Link::create([
                'url' => $this->url, 
                'title' => $page_title, 
                'platform' => $platform, 
                'thumbnail' => $image_name, 
                'link_list_id' => $this->link_list_id
            ]);

            if ( count($this->tags) > 0 ) {
                foreach( $this->tags as $tag ) {
                    Taggings::create([ 'saved_link_id' => $link->id, 'tag_id' => $tag->id ]);
                }
            }

            $this->dispatch('link_saved');
            $this->close();
            $this->alert('success', 'Link saved successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);

        } else {
            $this->close();
            $this->alert('error', 'Link can\'t be saved successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
        }
        
    }

    public function reset_fields()
    {
        $this->reset('url');
        $this->reset('link_list_id');
        $this->reset('tag');
        $this->reset('tags');
    }

    public function close()
    {
        $this->reset_fields();
        $this->closeModal();
    }

    public function add_tag()
    {
        $t = Tag::findOrFail($this->tag);
        $this->tags[] = $t;
        $this->reset('tag');
        $this->dispatch('refreshComponent');
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function create_list_alert()
    {
        $this->alert('success', 'List created successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }
}
