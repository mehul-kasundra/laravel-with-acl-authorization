<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\TicketOrderModel;
use App\Models\TransactionModel;
use App\User;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    
    
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function getTicketStatusByTicketCode(Request $request)
    {
        //return 'hellooo dilip kumar chaudhary';
        $ticket_code = $request->input('ticket_code');
        //return $ticket_code;
        $ticker_order=TicketOrderModel::where('ticket_code',$ticket_code)->first();
        //return $ticker_order;
        $msg_type='invalid';
        $msg='doesn\'t exist';

         if($ticker_order){
            if($ticker_order->status==1)
            {
                if($ticker_order->used==0){
                     $msg_type='valid';
                     $msg='ticket is valid';
                       }
                else{
                        $msg_type='invalid';
                        $msg='used';
                     }
            }
          }

        $response = Response()->json(['msg_type'=>$msg_type,'msg'=>$msg]);
        $response->header('Content-Type', 'application/json');
        return $response;

    }

      /**
     * @param Request $request
     * @return mixed
     */
    public function searchByNameEmailOrTicket(Request $request)
    {
        $search_by=$request->search_by;
        $search_text=$request->search_text;
       
       if($search_by=='name_email'){
          $ticket_users=TransactionModel::where('first_name','LIKE',"%{$search_text}%")
                         ->orWhere('last_name','LIKE',"%{$search_text}%")
                         ->orWhere('email','LIKE',"%{$search_text}%")
                         ->select('first_name'
                          , 'last_name','email')->distinct()->get();
          
          $response = Response()->json(['ticket_users'=>$ticket_users]);
          $response->header('Content-Type', 'application/json');
          return $response;
       } 
       elseif($search_by=='ticket'){
          $tickets=TicketOrderModel::where('ticket_code','LIKE',"%{$search_text}%")
            ->pluck('ticket_order.ticket_code')
            ->toArray();
          $response = Response()->json(['tickets'=>$tickets]);
          $response->header('Content-Type', 'application/json');
          return $response;
       }
    }


    public function getTicketUserDetailByEmailOrTicket(Request $request){
          $search_by=$request->search_by;
          if($search_by=='ticket')
             $ticket_code=$request->ticket_code;
          else
            {
             $email=$request->email;  
             $event_id=$request->event_id;
            }   
          
         if($search_by=='ticket')  {
             $ticket_detail=TicketOrderModel::where('ticket_code',$ticket_code)
                       ->join('transaction','ticket_order.transaction_id','transaction.id')
                       ->select('transaction.first_name'
                        , 'transaction.last_name','transaction.email','ticket_order.ticket_code', 'ticket_order.used','ticket_order.status')->first();
            $response = Response()->json($ticket_detail);
            $response->header('Content-Type', 'application/json');
            return $response;
         }
         elseif($search_by=='name_email'){
            $user_detail=TransactionModel::where('email',$email)
             ->select('transaction.first_name'
                        , 'transaction.last_name','transaction.email')->first();
            
            $tickets=TransactionModel::where('email',$email)
                  ->join('ticket_order','transaction.id','ticket_order.transaction_id')
                  ->where('transaction.event_id', $event_id)
                  ->where('ticket_order.used',0)
                  ->where('ticket_order.status',1)
                  ->pluck('ticket_order.ticket_code')->toArray();
                 
            $response = Response()->json(['ticket_user'=>$user_detail,'tickets'=> $tickets]);
            $response->header('Content-Type', 'application/json');
            return $response;
          }
    }

    public function checkedIn(Request $request){
      // $ticket_code =array();
       $ticket_code=$request->ticket_code;
       //return  $ticket_code[0];
       //return  gettype($ticket_code);
       $msg_type='fail';
       $msg='please try again later.';
       DB::beginTransaction();
       try {
             
            foreach($ticket_code as $tcode){
              $ticket_order=TicketOrderModel::where('ticket_code',$tcode)->first();
              $ticket_order->update([
                  'used'   =>1,
              ]);
            }
            DB::commit();
            $msg_type='success';
            $msg='ticket is checked in successfully.';

          $response = Response()->json(['msg_type'=>$msg_type,'msg'=>$msg]);
          $response->header('Content-Type', 'application/json');
          return $response;

        } catch (\Exception $e) {
          DB::rollback();
          $response = Response()->json(['msg_type'=>$msg_type,'msg'=>$msg]);
          $response->header('Content-Type', 'application/json');
          return $response;
        }
    }

}
