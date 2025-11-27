<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class FAQController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Faq::with('service');

        if ($request->has('service_id') && $request->service_id) {
            $query->where('service_id', $request->service_id);
        }

        if ($request->has('is_active') && $request->is_active !== '') {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->boolean('active_only')) {
            $query->active();
        }

        if ($request->boolean('general_only')) {
            $query->general();
        }

        $faqs = $query->latest()->get();
        $services = Service::get();

        return view('admin.faq.index', compact('faqs', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::get();
        return view('admin.faq.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'nullable|exists:services,id',
            'question' => 'required|string|max:1000',
            'answer' => 'required|string|max:5000',
            'is_active' => 'boolean'
        ]);

        try {
            Faq::create($validated);

            return redirect()->route('faq.index')
                ->with('success', 'FAQ created successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create FAQ: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return view('admin.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $services = Service::get();
        return view('admin.faq.edit', compact('faq', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'service_id' => 'nullable|exists:services,id',
            'question' => 'required|string|max:1000',
            'answer' => 'required|string|max:5000',
            'is_active' => 'boolean'
        ]);

        try {
            $faq->update($validated);

            return redirect()->route('faq.index')
                ->with('success', 'FAQ updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update FAQ: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();

            return redirect()->route('faq.index')
                ->with('success', 'FAQ deleted successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete FAQ: ' . $e->getMessage());
        }
    }

    /**
     * Toggle FAQ status
     */
    public function toggleStatus(Faq $faq)
    {
        try {
            $faq->update(['is_active' => !$faq->is_active]);

            $status = $faq->is_active ? 'activated' : 'deactivated';
            return redirect()->back()
                ->with('success', "FAQ {$status} successfully");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to change FAQ status: ' . $e->getMessage());
        }
    }
}