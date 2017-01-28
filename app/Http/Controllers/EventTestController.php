<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\EventTestModel as EventTest;
use Milon\Barcode\Facades\DNS1DFacade;
use Milon\Barcode\Facades\DNS2DFacade;
use Barryvdh\DomPDF\Facade as PDF;

class EventTestController extends Controller
{
    public function __construct()
    {
    }
    
    public function index(){

        $events = EventTest::get();
//        dd($events);
        return view('event_test.index', ['events' => $events]);
    }

    public function show($id){

        $events = EventTest::find($id);
        $qr_code = 'data:image/png;base64,' . DNS2DFacade::getBarcodePNG($events->event_code, "QRCODE", 9, 9);
        $br_code = 'data:image/png;base64,' . DNS1DFacade::getBarcodePNG($events->event_code, "C39", 3, 33);
//        return view('event.partials.invoice', ['events' => $events,'barcode' => $brcode, 'qrcode' => $qrcode]);

        $pdf = PDF::loadView('event_test.partials.invoice', ['events' => $events, 'barcode' => $br_code, 'qrcode' => $qr_code]);
        return $pdf->stream('invoice.pdf');
    }

    public function EventTestingDataForWidget(Request $request, $id){
        $event = array(
            'id' => $id,
            'title' => 'Event 1',
            'image' => 'Event Image'
        );
        return response()->json(["testing"=>$event])->setCallback($request->input('callback'));
    }
}
