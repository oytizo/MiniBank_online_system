<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\accountModel;
use App\Models\User;

class accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = accountModel::where('user_id', Auth::user()->id)->get();
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
        $adddeposite = accountModel::where('user_id', Auth::user()->id)->get();
        // dd($adddeposite);
        if ($adddeposite->count() > 0) {
            foreach ($adddeposite as $depo) {

                $temp = $depo->balance + $request->deposite;
                $depo->balance = $temp;
                $depo->update();
                $account = accountModel::where('user_id', Auth::user()->id)->get();
                return view('frontend.show', compact('account'));
                //  return view('frontend.deposite');
            }
        }
    }

    public function fundtransfer(Request $request)
    {
        // dd($request);
        $code = User::where('personal_code', $request->pcode)->get();
        if ($code->count() > 0) {

            foreach ($code as $demo) {
                // dd($demo->id);
                $transfer = accountModel::where('user_id', $demo->id)->get();

                if ($transfer->count() > 0) {
                    foreach ($transfer as $temp) {

                        if ($temp->balance) {
                            $temp->balance = $temp->balance + $request->ftransfer;
                            // dd( $temp->balance );

                            $temp->update();

                            $subdoner = accountModel::where('user_id', Auth::user()->id)->get();
                            if($subdoner->count() > 0) {
                                foreach($subdoner as $sub){
                                    if($sub->balance){
                                        if($sub->balance>=$request->ftransfer)
                                        $sub->balance = $sub->balance - $request->ftransfer;
                                        $sub->update();
                                        return back();
                                    }
                                    else{
                                        return back();
                                    }

                                }
                            }

                            return view('frontend.fundtransfer');
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
