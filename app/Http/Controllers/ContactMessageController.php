<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;
use Validator;
use App\Services\Recaptcha;

class ContactMessageController extends Controller
{
    public function adminIndex($contactMessages = null)
    {
        if(!$contactMessages){
            $contactMessages = ContactMessage::orderBy('id', 'desc')->paginate(20);
        } else {
            $contactMessages = $contactMessages->paginate(20);
        }
        return view('admin.contactmessages.contactmessages', ['messages' => $contactMessages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.contact');
    }


    /**
     * Store the contact message.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recaptcha' => 'required|string',
            'title' => 'required|string|max:150',
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'email' => 'required|email',
            'body' => 'required|string|max:5000'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $recaptcha = new Recaptcha($ip, $request->recaptcha);
        $recaptchaValidate = $recaptcha->validate();

        if(!$recaptchaValidate){
            return back()->withErrors('Something went wrong with ReCAPTCHA, please try again');
        }

        $contactMessage = new ContactMessage();
        $contactMessage->title = $request->title;
        $contactMessage->sender_name = $request->first_name . ' ' . $request->last_name;
        $contactMessage->sender_email = $request->email;
        $contactMessage->sender_ip = $ip;
        $contactMessage->body = $request->body;
        $contactMessage->save();

        return back()->with('status', 'Thank you for contacting us! Our team is going to help you with your inquiry as soon as possible.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:40',
            'body' => 'required|string'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        } 

        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->title;
        $contactMessage->body = $request->body;
        $contactMessage->save();

        return redirect()->route('admin.index.contactmessages')->with('status', 'A new message has been created!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        return view('admin.contactmessages.show', ['message' => $contactMessage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function adminDestroy($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        $contactMessage->delete();
        return redirect()->route('admin.index.contactmessages')->with('status', 'A message has been deleted!');
    }


    /**
     * Search the ContactMessages for admins.
     *
     * @param  Request
     * @return \Illuminate\Http\Response
     */

    public function adminSearchContactMessages(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'integer|nullable',
            'title' => 'string|max:300|nullable'
        ]);

        if($validator->fails() || empty($request->all())){
            return back()->withErrors($validator)->withInput();
        }

        $title = $request->title;
        $id = $request->id;
        $whereArr = array();

        if($title){
            $title_where = ['title', 'LIKE', '%' . $title . '%'];
            array_push($whereArr, $name_where);
        } if ($id){
            $id_where = ['id', '=', $id];
            array_push($whereArr, $id_where);
        }
        $contactMessages = ContactMessage::where($whereArr);
        if(empty($contactMessages)){
            return $this->adminIndex();
        }
        return $this->adminIndex($contactMessages);
    }
}
