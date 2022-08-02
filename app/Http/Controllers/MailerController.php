<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\MailSender;
use Illuminate\Http\Request;
use App\Models\MailerItems;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MailerController extends Controller
{

    private $mailerItems;

    public function __construct()
    {
        $this->mailerItems = new MailerItems();
    }


    /**
     * Get and render list of mailing items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mailerItems = $this->mailerItems->orderBy('id', 'DESC')->get();
        return view('mailer.list')->with(['mailerItems' => $mailerItems]);
    }

    /**
     * Save item to database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'send_to' => 'required|email',
            'content' => 'required',
        ]);

        $item = $this->mailerItems->createNew($request->send_to, $request->title, $request->content);
        if ($item) {
            SendEmail::dispatch($item);
            return redirect()->route('mailerList')->with(['success' => 'Dodano pomyślnie']);
        }
    }

    /**
     *  Get and render one item 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        if ($request->id) {
            $mailerItem =  $this->mailerItems->find($request->id);
            if ($mailerItem) {
                return view('mailer.show')->with(['mailerItem' => $mailerItem]);
            }
        }
        return view('mailer.notFound');
    }


    /**
     * Delete item from database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function delete(Request $request)
    {
        if ($request->item_id && $request->item_id > 0) {
            $status = $this->mailerItems->deleteItem($request->item_id);
            return redirect()->route('mailerList')->with('success', 'Usunięto pomyślnie');
        }
        return redirect()->route('mailerList')->with('error', 'Wystąpił błąd');
    }

    /**
     * Generate API Token
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function generateAPIToken()
    {
        $user = User::find(Auth::id());
        $token = $user->createToken('auth_token')->plainTextToken;
        return view('auth.generateApiToken')->with(['token' => $token]);
    }
}
