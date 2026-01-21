<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Folder; // নিশ্চিত করুন যে আপনি Folder মডেলটি ইম্পোর্ট করেছেন
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function store(Request $request)
{
    // ১. ডেটা ভ্যালিডেশন
    $validator = Validator::make($request->all(), [
        // একই ব্যবহারকারীর জন্য ফোল্ডারের নাম ইউনিক হবে
        'name' => 'required|string|max:100|unique:folders,name,NULL,id,user_id,' . Auth::id(), 
    ], [
        'name.required' => 'ফোল্ডারের নাম আবশ্যক।',
        'name.unique' => 'এই নামে আপনার একটি ফোল্ডার ইতিমধ্যেই আছে।',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
        ], 422); // 422 Unprocessable Entity
    }

    // ভ্যালিডেটেড ডেটা নেওয়া হলো
    $validatedData = $validator->validated();
    
    // Auth::id() ব্যবহার করে user_id যুক্ত করা হলো
    $validatedData['user_id'] = Auth::id();
    
    // ২. ফোল্ডার তৈরি
    try {
        $folder = Folder::create($validatedData);

        // ৩. JSON রেসপন্স রিটার্ন
        return response()->json([
            'success' => true,
            'message' => 'Folder created successfully.',
            // ✅ নতুন অ্যালার্ট মেসেজ যুক্ত করা হলো
            'alert_message' => 'Folder "' . $folder->name . '" has been created successfully!', 
            'folder' => $folder 
        ]);

    } catch (\Exception $e) {
        // ত্রুটি হলে JSON রেসপন্স রিটার্ন
        return response()->json([
            'success' => false,
            'message' => 'Server error occurred.',
            'error_detail' => $e->getMessage()
        ], 500);
    }
}


    // public function store(Request $request)
    // {
       
    //     $validator = Validator::make($request->all(), [
            
    //         'name' => 'required|string|max:100|unique:folders,name,NULL,id,user_id,' . Auth::id(), 
    //     ], [
    //         'name.required' => 'ফোল্ডারের নাম আবশ্যক।',
    //         'name.unique' => 'এই নামে আপনার একটি ফোল্ডার ইতিমধ্যেই আছে।',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'errors' => $validator->errors()->toArray()
    //         ], 422); // 422 Unprocessable Entity
    //     }

       
    //     $validatedData = $validator->validated();
        
     
    //     $validatedData['user_id'] = Auth::id();
        
       
    //     try {
           
    //         $folder = Folder::create($validatedData);

           
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Folder created successfully.',
    //             'folder' => $folder 
    //         ]);

    //     } catch (\Exception $e) {
           
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Server error occurred.',
    //             'error_detail' => $e->getMessage()
    //         ], 500);
    //     }
    // }



   public function index()
    {
       
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $userId = Auth::id();

        
        $folders = Folder::where('user_id', $userId)
            ->select('id', 'name') 
            ->orderBy('created_at', 'desc')
            ->get();
        
      
        return response()->json([
            'success' => true,
            'folders' => $folders
        ]);
    }





}