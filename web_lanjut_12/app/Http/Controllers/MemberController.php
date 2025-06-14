<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'telp' => 'required|integer',
        ]);

        Member::create($request->all());

        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan');
    }

    public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama' => 'required|string',
            'telp' => 'required|integer',
        ]);

        $member->update($request->all());

        return redirect()->route('member.index')->with('success', 'Member berhasil diperbarui');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index')->with('success', 'Member berhasil dihapus');
    }
}
