<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use app\Notifications\Edit;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        $id = $request->input('id');
      $userUnreadNotification = auth()->user()
                                 ->unreadNotifications
                                 ->where('id', $id)
                                 ->first();
    
      if($userUnreadNotification) {
          $userUnreadNotification->markAsRead();
      }
    
      return response()->json(['success' => 'Уведомление отмечено как прочитанное.']); 
    }
}
