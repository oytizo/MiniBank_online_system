<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use App\Models\Frontend\User;
use Illuminate\Support\Facades\Auth;
use App\Models\frontend\transectionModel;
use App\Models\frontend\transectionhistoryModel;

class accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = User::where('id', Auth::user()->id)->get();
        return view('frontend.show', compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deposite()
    {
        return view('frontend.deposite');
    }

    public function adddeposite(Request $request)
    {
        $adddeposite = User::where('id', Auth::user()->id)->get();
        // dd($adddeposite);
        if ($adddeposite->count() > 0) {
            foreach ($adddeposite as $depo) {

                $temp = $depo->balance + $request->deposite;
                $depo->balance = $temp;
                $depo->update();
                $account = User::where('id', Auth::user()->id)->get();
                return view('frontend.show', compact('account'));
                //  return view('frontend.deposite');
            }
        }
    }

    public function fundtransfer(Request $request)
    {
        // dd($request);
        $sender = '';
        $receiver = '';
        $receiver_id = '';

        $code = User::where('personal_code', $request->pcode)->get();
        if ($code->count() > 0) {

            foreach ($code as $demo) {
                // dd($demo->id);
                $transfer = User::where('id', $demo->id)->get();

                if ($transfer->count() > 0) {
                    foreach ($transfer as $temp) {

                        $subdoner = User::where('id', Auth::user()->id)->get();
                        if ($subdoner->count() > 0) {
                            foreach ($subdoner as $sub) {
                                if ($sub->balance) {
                                    if ($sub->balance >= $request->ftransfer) {
                                        $sub->balance1 = $sub->balance - $request->ftransfer;
                                        $GLOBALS['sender'] = $sub->balance1;
                                        $GLOBALS['amount'] = $request->ftransfer;


                                        // $sub->update();
                                    }
                                    if ($temp->id) {
                                        $GLOBALS['receiver_id'] = $temp->id;
                                    }

                                    if ($temp->balance) {
                                        $temp->balance1 = $temp->balance + $request->ftransfer;
                                        $GLOBALS['receiver'] = $temp->balance1;

                                        // dd( $temp->balance );
                                        // $temp->update();
                                        $code1 = User::where('personal_code', $request->pcode)->get();
                                        if ($code1->count() > 0) {
                                            foreach ($code1 as $list) {

                                                DB::transaction(function () {
                                                    // DB::update('update users set balance = $sub->balance');
                                                    $sender_id = Auth::user()->id;


                                                    DB::update("update users set balance ='" . $GLOBALS['sender'] . "' where id ='$sender_id'");
                                                    DB::update("update users set balance ='" . $GLOBALS['receiver'] . "' where id ='" . $GLOBALS['receiver_id'] . "'");

                                                    $sender_user_id = Auth::user()->id;
                                                    $receiver_user_id = $GLOBALS['receiver_id'];
                                                    $amount = $GLOBALS['amount'];

                                                    DB::insert("insert into transectionhistory_models(sender_user_id,receiver_user_id,amount) values('$sender_id','$receiver_user_id','$amount')");


                                                    // DB::delete('delete from posts');
                                                });

                                            }
                                        }






                                        return view('frontend.fundtransfer');
                                    }
                                } else {
                                    return back();
                                }
                            }
                        }
                    }
                }
            }
        } else {

            return view('frontend.fundtransfer');
        }

        return view('frontend.deposite');
    }
    public function transfer()
    {

        return view('frontend.fundtransfer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function transectionhistory()
    {
        $user_id=Auth::user()->id;
        $user_name=User::where('id',$user_id)->get();
        foreach($user_name as $name){
            if($name->name){
                $username=$name->name;
            }
        }
        $user_sender_info=transectionhistoryModel::where('sender_user_id',$user_id)->get();
        $user_receiver_info=transectionhistoryModel::where('receiver_user_id',$user_id)->get();
        $allhistory=User::all();
        
        return view('frontend.transectionhistory',compact('user_sender_info','user_receiver_info','username','allhistory'));
    }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
