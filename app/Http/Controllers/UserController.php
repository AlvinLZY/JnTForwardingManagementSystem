<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use XMLWriter;
use DOMDocument;
use XSLTProcessor;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $xml = new XMLWriter();
        $xml->openURI('xml/Users.xml');
        $xml->setIndent(true);
        $xml->setIndentString('    ');
        $xml->startDocument('1.0', 'UTF-8');
            $xml->startElement('Users');
                    foreach($users as $user){
                        $xml->startElement('User');
                            $xml->writeElement('id', $user->id);
                            $xml->writeElement('username', $user->username);
                            $xml->writeElement('firstName', $user->firstName);
                            $xml->writeElement('lastName', $user->lastName);
                            $xml->writeElement('contactNo', $user->contactNo);
                            $xml->writeElement('email', $user->email);
                        $xml->endElement();
                    }
            $xml->endElement();
        $xml->endDocument();
        $xml->flush();
        unset($xml);
        
        $xml = simplexml_load_file('xml/Users.xml');
        return view ('User.index',compact('xml'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('User/edit',compact('users','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'contactNo' => 'required|numeric|regex:/^(01)[0-9]{7,8}$/',
            'email' => 'required|unique:customers,email|email',
        ]);  
        $User = User::find($id);
        $User ->firstName = $request ->get('firstName');
        $User ->lastName = $request ->get('lastName');
        $User ->contactNo = $request ->get('contactNo');
        $User ->email = $request ->get('email');
        $User ->save();
        return redirect('User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect('User')->with('success','Information has been deleted');
    }
    
    public function showXML()
    {
        
        $xsl = new DOMDocument();
        $xsl->load('../public/xsl/user.xsl');

        $xml = new DOMDocument();
        $xml->load('../public/xml/Users.xml');

        $p = new XSLTProcessor;
        $p->importStylesheet($xsl);

        $xml = $p->transformToXml($xml);

        echo $xml;
    }
}
