<?php
//author:Loke Choon Keat
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\xslTrans;
use SimpleXMLElement;

class xmlController extends Controller
{
    public function index()
    {
        
    }

    public function readXml()
    {
        // return $contentX = new XSLTTransformation("../app/public/xml/parcelContent.xml","../app/resources/views/order/content.xsl");
        $xmlString = file_get_contents(public_path('xml/parcelContent.xml'));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 

        // dd($phpArray);
        // return view('order.showContent',compact('contentX'));
        return view('order.showContent',compact('xmlObject'));
    }
    //testing here
}
