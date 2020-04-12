<?php

namespace App\Http\Controllers\Quotes;

use App\Http\Controllers\Controller;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quotes.index', [
            'quotes' => Quote::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'source' => 'required',
            'body' => 'required|max:280',
        ]);


        if ($validator->fails()) {

            alert('Aaaah...nah', $validator->messages()->all(), 'error');

            return back();
        }

        auth()->user()->quotes()->create([
            'source' => request('source'),
            'body' => request('body'),
        ]);

        return redirect(route('quotes'))
            ->with('success', 'Your quote has been published');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        return view('quotes.edit', compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        $attributes = request()->validate([
            'source' => 'required',
            'body' => 'required',
        ]);

        $quote->update($attributes);

        return redirect(route('quotes'))
            ->with('success', 'Quote was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect(route('quotes'))
            ->with('success', 'The quote was deleted');
    }
}
