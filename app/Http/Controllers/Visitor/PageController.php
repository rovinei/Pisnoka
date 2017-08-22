<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Partner;
use App\Models\Milestone;
use App\Models\Content;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Page;
use Session;

class PageController extends Controller
{

    /**
     * Return index page
     *
     */
    public function homePage(Request $Request){
        $projects = Project::where('is_featured', 1)
                           ->where('status', 'PUBLISHED')
                           ->get();

        $services = Service::where('is_featured', 1)
                           ->latest()
                           ->take(6)
                           ->get();

        $sliders = Slider::where('is_featured', 1)
                            ->latest()
                            ->take(3)
                            ->get();

        $teams = Team::where([
                            ['is_featured', 1],
                            ['is_director_msg', 0]
                        ])
                        ->latest()
                        ->take(4)
                        ->get();

        $partners = Partner::where('is_featured', 1)
                            ->get();

        $why_us = Content::where([
                            ['status', 'PUBLISHED'],
                            ['is_featured', 1],
                            ['section', 'WHYUS']
                        ])
                        ->orderBy('order','asc')
                        ->get();
        $director_msg = Team::where([
                            ['is_featured', 1],
                            ['is_director_msg', 1]
                        ])
                        ->first();
        return view('visitor.pages.index')->with([
            'projects' => $projects,
            'services' => $services,
            'sliders' => $sliders,
            'teams' => $teams,
            'partners' => $partners,
            'why_us' => $why_us,
            'director_msg' => $director_msg
        ]);
    }

    /**
     * Return about us page
     *
     */
    public function aboutUsPage(Request $Request){
        $who_we_are = Content::where([
            ['status', 'PUBLISHED'],
            ['is_featured', 1],
            ['section', 'WHOWEARE']
        ])->first();

        $company_visions = Content::where([
            ['status', 'PUBLISHED'],
            ['is_featured', 1],
            ['section', 'VISION']
        ])->get();

        $teams = Team::where([
                            ['is_featured', 1],
                            ['is_director_msg', 0]
                        ])
                        ->latest()
                        ->take(4)
                        ->get();

        $partners = Partner::where('is_featured', 1)
                            ->get();
        return view('visitor.pages.about_us')->with([
            'teams' => $teams,
            'partners' => $partners,
            'who_we_are' => $who_we_are,
            'company_visions' => $company_visions

        ]);
    }

    public function historyPage(Request $request){
        $teams = Team::where('is_featured', 1)
                            ->where('is_director_msg', 0)
                            ->latest()
                            ->take(4)
                            ->get();
        $milestones = Milestone::where('is_featured', 1)
                                ->orderBy('year', 'asc')
                                ->get();
        $history_content = Content::where([
            ['status', 'PUBLISHED'],
            ['is_featured', 1],
            ['section', 'HISTORY']
        ])->first();

        return view('visitor.pages.history')->with([
            'history_content' => $history_content,
            'teams' => $teams,
            'milestones' => $milestones
        ]);
    }


    public function contactPage(Request $request){

        return view('visitor.pages.contact');

    }

    public function projectPage(Request $request){

        $projects = Project::where('status', 'PUBLISHED')
                            ->whereNull('deleted_at')
                            ->with('categories')
                            ->orderBy('created_at', 'desc')
                            ->get();
        $categories = Category::where('model_type', 'PROJECT')->get();

        return view('visitor.pages.project')->with([
            'projects' => $projects,
            'categories' => $categories,
        ]);
    }

    public function projectDetail(Request $request, $slug){

        try {

            $project = Project::where([
                ['slug', $slug],
                ['status', 'PUBLISHED']
            ])->firstOrFail();

        } catch (ModelNotFoundException $e) {
            return view('visitor.error.404')->with([
                'error' => 'Oop! cannot find what you are looking for.'
            ]);
        } catch (Exception $e) {
            return view('visitor.error.404')->with([
                'error' => 'Oop! something went wrong, please try again.'
            ]);
        }


        $related_projects = Project::whereNotIn('id', [$project->id])
                                    ->where('status', 'PUBLISHED')
                                    ->latest()
                                    ->take(6)
                                    ->get();

        return view('visitor.pages.project_detail')->with([
            'project' => $project,
            'related_projects' => $related_projects,
        ]);

    }

    public function servicePage(Request $request){
        $services = Service::orderBy('created_at', 'desc')
                            ->get();

        return view('visitor.pages.service')->with([
            'services' => $services,
        ]);
    }

    public function serviceDetail(Request $request, $slug){

        try {

            $service = Service::where('slug', $slug)
                            ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            return view('visitor.error.404')->with([
                'error' => 'Oop! cannot find what you are looking for.'
            ]);
        } catch (Exception $e) {
            return view('visitor.error.404')->with([
                'error' => 'Oop! something went wrong, please try again.'
            ]);
        }


        $partners = Partner::where('is_featured', 1)
                            ->get();

        return view('visitor.pages.service_detail')->with([
            'service' => $service,
            'partners' => $partners,
        ]);
    }

    public function blogPage(Request $request){

        $blog_posts = Post::where('status', 'PUBLISHED')
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'desc')
                        ->paginate(4);

        $post_tags = Post::existingTags();
        $recent_posts = null;
        if(count($blog_posts) > 0){
            $recent_posts = Post::whereNotIn('id', $blog_posts->pluck('id')->toArray())
                        ->where('status', 'PUBLISHED')
                        ->whereNull('deleted_at')
                        ->latest()
                        ->take(5)
                        ->get();
        }

        return view('visitor.pages.blog')->with([
            'blog_posts' => $blog_posts,
            'post_tags' => $post_tags,
            'recent_posts' => $recent_posts
        ]);

    }

    public function blogDetail(Request $request, $slug){
        try {

            $blog_post = Post::where([
                ['status', 'PUBLISHED'],
                ['slug', $slug],
            ])
            ->whereNull('deleted_at')
            ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            return view('visitor.error.404')->with([
                'error' => 'Oop! cannot find what you are looking for.'
            ]);
        } catch (Exception $e) {
            return view('visitor.error.404')->with([
                'error' => 'Oop! something went wrong, please try again.'
            ]);
        }

        $post_tags = Post::existingTags();
        $recent_posts = null;

        $recent_posts = Post::whereNotIn('id', [$blog_post->id])
                        ->where('status', 'PUBLISHED')
                        ->whereNull('deleted_at')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('visitor.pages.blog_detail')->with([
            'blog_post' => $blog_post,
            'post_tags' => $post_tags,
            'recent_posts' => $recent_posts
        ]);

    }

    public function searchTag(Request $request){
        $tagname = $request->input('tagname') ? : '';

        if($tagname == ""){
            return view('visitor.error.404')->with([
                'error' => 'Oop! please type the tag name to search.'
            ]);
        }

        $blog_posts = Post::where('status', 'PUBLISHED')
                        ->whereNull('deleted_at')
                        ->withAnyTag([$tagname])
                        ->get();

        return view('visitor.pages.search')->with([
            'blog_posts' => $blog_posts,
            'tagname' => $tagname
        ]);
    }

    public function sendmail(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        if(trim($name) == "" || trim($email) == "" || trim($message) == ""){
            Session::flash('mail_fail', 'All fields cannot be blank!');
            return redirect()->back();
        }

        Mail::to(env('MAIL_FROM_ADDRESS', 'vineiisgood@gmail.com'))
                    ->send(new ContactMail($name, $email, $message));

        Session::flash('mail_success', 'Thank you for contacting us, We will reply to you soon vis email you provided us. Please keep in touch.');
        return view('visitor.thank_you');
    }

    public function thankyou(){
        return view('visitor.thank_you');
    }
}
