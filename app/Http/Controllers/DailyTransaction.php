<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DailyTransactions;

class DailyTransaction extends Controller
{
    protected $dailyTransactionModel;

    public function __construct(DailyTransactions $dailyTransactionModel) {
        $this->dailyTransactionModel = $dailyTransactionModel;
    }

    public function store(Request $request)
    {
        $transactionData = $request->except('_token');
        $transactionData['total'] = $transactionData['total_item']*$transactionData['price'];

        $this->dailyTransactionModel->create($transactionData);

        return redirect('home')->with('success', 'Data telah berhasil di input!');
    }


    public function show(Request $request)
    {
        $request->user()->authorizeRoles(['direksi', 'super_admin']);
        $transactionData = $this->dailyTransactionModel->get();
        
        return view('report.show', compact('transactionData'));
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['direksi', 'super_admin']);
        $transactionData = $this->dailyTransactionModel->whereId($id)->get();

        return view('report.edit', compact('transactionData', 'id'));
    }

    public function update(Request $request, $id)
    {
        $transactionData = $request->except(['_token']);
        $transactionData['total'] = $transactionData['total_item']*$transactionData['price'];

        if($user = $this->dailyTransactionModel->whereId($id)->first()) {
            $user->update($transactionData);
        }

        return redirect('report');  
    }

    public function destroy($id)
    {
        $user = $this->dailyTransactionModel->find($id);
        if($user) {
            $user->delete();
            return redirect()->back();
        }
    }
}
