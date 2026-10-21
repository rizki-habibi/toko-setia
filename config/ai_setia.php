<?php

return [
    'base_url' => env('AI_SETIA_BASE_URL', 'https://api.openai.com/v1'),
    'key' => env('AI_SETIA_API_KEY'),
    'model' => env('AI_SETIA_MODEL', 'gpt-4o-mini'),
];
