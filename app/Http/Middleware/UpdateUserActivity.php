<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Result;

class UpdateUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Проверяем, аутентифицирован ли пользователь
        if (auth()->check()) {
            // Получаем ID текущего пользователя
            $userId = auth()->id();
            // Получаем активное время из запроса

            // Получаем данные из запроса
            $data = json_decode($request->getContent(), true);

            // Извлекаем активное время
            $activeTime = $data['active_time'] ?? null;
            
            // Result::create([
            //     'id_student' => $userId,
            //     'id_task' => 4,
            //     'solve_date' => now()->toDateString(),
            //     'mark' => $activeTime,
            //     'result' => true,
            // ]);

            // Сохраняем активность с указанием даты
            DB::table('user_activity')->updateOrInsert(
                ['user_id' => $userId, 'active_date' => now()->toDateString()],
                ['active_time' => DB::raw('active_time + ' . $activeTime)]
            );
        }

        // Возвращаем пустой ответ
        return response()->noContent(); // HTTP 204 No Content
        // return $next($request);
    }
    
}
