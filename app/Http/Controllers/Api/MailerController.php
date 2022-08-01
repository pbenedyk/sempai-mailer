<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\MailerItems;
use Illuminate\Http\Request;
class MailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(MailerItems::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MailerItems $mailerItems)
    {
        $item = $mailerItems->createNew($request->send_to, $request->title, $request->content);
        if ($item) {
            SendEmail::dispatch($item);
            return response()->json(['status' => 1, 'item' => $item]);
        }
        return response()->json(['status' => 0, 'item' => []]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailerItems  $mailerItems
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MailerItems $mailerItems)
    {
        $item = $mailerItems->find($request->item);
        if ($item) {
            return response()->json(['status' => 1, 'item' => $item]);
        }
        return response()->json(['status' => 0, 'item' => []]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailerItems  $mailerItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailerItems $mailerItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailerItems  $mailerItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MailerItems $mailerItems)
    {
        $status = $mailerItems->where('id', $request->item)->delete();
        return response()->json(['id' => $request->item, 'status' => $status]);
    }
}
