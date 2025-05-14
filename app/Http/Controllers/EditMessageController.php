<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class EditMessageController extends Controller
{
    public function edit($id)
    {
        // Fetch the message by ID, or show 404 if not found
        $message = ContactMessage::findOrFail($id);
        
        // Return the view with the message data
        return view('edit_message', compact('message'));
    }

    public function update(Request $request, $id)
    {
        // Find the message to update
        $message = ContactMessage::findOrFail($id);
        
        // Update the message fields
        $message->update($request->all());
        
        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Pesan berhasil diperbarui.');
    }
}


