<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\AIAssistant\AIAssistantController;

Route::controller(AIAssistantController::class)->prefix('ai-assistant')->group(function () {
    Route::post('ask', 'ask')->name('admin.ai_assistant.ask');
});
