<?php

class ForumsController extends \BaseController {


    public function index()
    {
        if(Auth::check()){
            $id = Auth::user()->club_id;

            $groups = ForumGroup::with('categories', 'threads', 'comments', 'user')->where('club_id', 0)->get();
            $clubs = ForumGroup::with('categories', 'threads', 'comments', 'user')->where('club_id', $id)->get();

            return View::make('forum.index', ['groups' => $groups, 'clubs'=>$clubs]);
        }else{
            $groups = ForumGroup::with('categories', 'threads', 'comments', 'user')->where('club_id', 0)->get();
            return View::make('forum.index', ['groups' => $groups]);
        }

    }
    public function category($id)
    {
        $category = ForumCategory::find($id);
        $category->views++;
        $category->save();

        if($category->club_id == 0){
            $groups = ForumGroup::with('categories', 'threads', 'comments', 'user')->where('club_id', 0)->get();
            $threads = ForumThread::with('comments')->whereCategory_id($id)->orderBy('updated_at', 'desc')->paginate(20);
            return View::make('forum.category',compact('threads'),['category' => $category, 'groups'=>$groups]);

        }
        if($category->club_id > 0) {

            if (Auth::check()) {

                if (Auth::user()->club_id == $category->club_id) {
                    $groups = ForumGroup::with('categories', 'threads', 'comments', 'user')->where('club_id', Auth::user()->club_id)->get();
                    $threads = ForumThread::with('comments')->whereCategory_id($id)->orderBy('updated_at', 'desc')->paginate(20);
                    return View::make('forum.category', compact('threads'), ['category' => $category, 'groups'=>$groups]);
                }else{
                    return Redirect::to('/forum')->with('danger', 'Du har inte behörighet för detta');
                }
            } else {
                return Redirect::to('/forum')->with('danger', 'Du har inte behörighet för detta');
            }
        }
    }

    public function storeCategory()
    {
       /* $input = Input::all();
        $this->forumGroupValidation->validate($input); */
        $category = new ForumCategory;
        $category->title  = Input::get('title');
        if(!Input::get('subtitle') == '')
        {
            $category->subtitle = Input::get('subtitle');
        }
        $category->group_id = Input::get('id');
        $category->author_id = Auth::user()->id;
        $category->club_id = 0;
        $category->save();
        return Redirect::back()->with('success', 'Du har nu lagt till Kategorin "'. $category->title .'"');
    }

    public function updateCategory($id){

        $category = ForumCategory::find($id);

        $category->title = Input::get('title');
        $category->subtitle = Input::get('subtitle');

        $category->save();

        return Redirect::back()->with('success', 'Kategori ' . $category->title . ' uppdaterad');

    }

    public function deleteCategory($id)
    {
        $category = ForumCategory::find($id);
        if($category == null)
        {
            return Redirect::back()->with('headsup', 'Kategorin existerar inte.');
        }
        $threads = $category->threads();
        $comments = $category->comments();
        $thr = true;
        $com = true;
        if($threads->count() > 0)
        {
            $thr = $threads->delete();
        }
        if($comments->count() > 0)
        {
            $com = $comments->delete();
        }
        if($thr && $com && $category->delete())
        {
            return Redirect::to('/forum')->with('headsup', 'Kategorin har tagits bort.');
        }
        else
        {
            return Redirect::to('/forum')->with('danger', 'Något gick fel.');
        }
    }
    public function thread($id)
    {
        $thread = ForumThread::with('comments')->find($id);
        $thread->views++;
        $thread->save();
        $comments = ForumComment::whereThread_id($id)->paginate(15);
        return View::make('forum.thread', compact('comments'),['thread' => $thread] );
    }
    public function newThread($id)
    {
        $category = ForumCategory::find($id);
        if($category == null)
        {
            return Redirect::back()->with('headsup', 'Kategorin existerar inte.');
        }
        return View::make('forum.newThread', ['category' => $category]);
    }
    public function newThreadStore($id)
    {

        $category = ForumCategory::find($id);
        if($category == null)
        {
            return Redirect::back()->with('headsup', 'Det gick inte att skapa tråden. Kategorin har tagits bort.');
        }
       /*  $input = Input::all();
        $this->newThreadForm->validate($input); */
        $thread = new ForumThread;
        $thread->title = Input::get('title');
        $thread->body = Input::get('body');
        $thread->status = 1;
        $thread->category_id = $category->id;
        $thread->author_id = Auth::user()->id;
        $thread->group_id = $category->group_id;
        $thread->save();
        return Redirect::to('/forum/thread/'.$thread->id.'')->with('success', 'Tråd skapad!');
    }
    public function updateThread($id)
    {
        $thread = ForumThread::find($id);
        if($thread == null)
        {
            return Redirect::to('/forum')->with('headsup', 'Tråden existerar inte!');
        }
       # $input = Input::all();
      #  $this->newThreadForm->validate($input);
        $thread->title = Input::get('title');
        $thread->body = Input::get('body');
        $thread->save();
        return Redirect::to('/forum/thread/'.$thread->id)->with('success', 'Tråden har blivit uppdaterad');
    }
    public function editThread($id)
    {
        $thread = ForumThread::find($id);
        if($thread == null)
        {
            return Redirect::back()->with('headsup', 'Tråden kunde inte hittas');
        }
        return View::make('forum.editThread', ['thread' => $thread]);
    }

    public function lockThread($id){

        $thread = ForumThread::find($id);

        $thread->status = 0;
        $thread->save();

        return Redirect::back()->with('headsup', 'Tråden är nu låst');
    }

    public function deleteThread($id)
    {
        $thread = ForumThread::find($id);
        if($thread == null)
        {
            return Redirect::to('/forum')->with('headsup', 'Tråden existerar inte');
        }
        $comments = $thread->comments();
        $delCom = true;
        if($comments->count() > 0)
        {
            $delCom = $comments->delete();
        }
        if($delCom && $thread->delete())
        {
            return Redirect::to('/forum')->with('success', 'Tråden har tagits bort');
        }
        return Redirect::to('/forum')->with('danger', 'Något gick fel');
    }
    public function storeComment($id)
    {
        $thread = ForumThread::find($id);
        if($thread == null)
        {
            return Redirect::back()->with('headsup', 'Tråden existerar inte längre.');
        }
       /* $input = Input::all();
        $this->forumCommentForm->validate($input); */
        $comment = new ForumComment;
        $comment->body = Input::get('body');
        $comment->author_id = Auth::user()->id;
        $comment->group_id = $thread->group_id;
        $comment->thread_id = $thread->id;
        $comment->category_id = $thread->category_id;
        if($comment->save())
        {
            return Redirect::back()->with('success', 'Ditt inlägg är sparat!');
        }
    }

    public function editComment($id){

        $comment = ForumComment::find($id);
        $thread = ForumThread::where('id', $comment->thread_id)->firstOrFail();

        return View::make('forum.editComment', ['comment'=>$comment, 'thread'=>$thread]);

    }

    public function updateComment($id){

        $comment = ForumComment::find($id);

        $comment->body = Input::get('body');

        $comment->save();

        return Redirect::to('/forum/thread/' . $comment->thread_id . '')->with('success', 'Kommentar uppdaterad!');

    }

    public function deleteComment($id)
    {
        $comment = ForumComment::find($id);
        if($comment == null)
        {
            return Redirect::back()->with('headsup', 'Kommentaren existerar inte!');
        }
        if($comment->delete())
        {
            return Redirect::back()->with('success', 'Kommentaren har tagits bort.');
        }
        else
        {
            return Redirect::back()->with('danger', 'Något gick fel.');
        }
    }
    public function storeGroup()
    {
      /*   $input = Input::all();
        $this->forumGroupValidation->validate($input); */

        $group = new ForumGroup;
        $group->title = Input::get('title');
        $group->author_id = Auth::id();
        $group->club_id = 0;
        $group->save();
        return Redirect::back()->with('success', 'Du har nu lagt till gruppen: '. $group->title);
    }

    public function storeClubGroup()
    {
        /*   $input = Input::all();
          $this->forumGroupValidation->validate($input); */
        $group = new ForumCategory;
        $group->title = Input::get('title');
        $group->subtitle = Input::get('subtitle');
        $group->group_id = Input::get('id');
        $group->author_id = Auth::id();
        $group->club_id = Auth::user()->club_id;
        $group->save();

        return Redirect::back()->with('success', 'Du har lagt till gruppen '. $group->title);
    }


    public function deleteGroup()
    {

        $id = Input::get('id');

        $group = ForumGroup::find($id);
        if($group == null)
        {
            return Redirect::back()->with('headsup', 'Denna grupp existerar inte!');
        }
        $categories = $group->categories();
        $threads = $group->threads();
        $comments = $group->comments();
        $delCa = true;
        $delTh = true;
        $delCo = true;
        if($categories->count() > 0)
        {
            $delCa = $categories->delete();
        }
        if($threads->count() > 0)
        {
            $delTh = $threads->delete();
        }
        if($comments->count() > 0)
        {
            $delCo = $comments->delete();
        }
        if($delCa && $delCo && $delTh && $group->delete())
        {
            return Redirect::back()->with('success', 'Gruppen har nu tagits bort.');
        }
    }
}
