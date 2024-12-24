<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
class OpenAIService extends ServiceProvider
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function askChatGPT($question, $gender, $martial, $age)
    {
        $admin_content = ' اريدك ان تقرا كتاب تفسير الاحلام ل ابن سيرين وبناء عليه اريدك ان تفسر لي الحلم المرسل من قبل المستخدم تفسير معاصر.وبالتفصيل مع ذكر الدلالات وبدون كتابة المرجع في الاجابة، ';
        $admin_content = $admin_content . ' ' . 'مع الاخذ بعين الاعتبار بيانات المستخدم التالية:';
        $admin_content = $admin_content . ' ' . 'الجنس:' . ' ' . $gender;
        $admin_content = $admin_content . ' - ' . 'الوضع العائلي:' . ' ' . $martial;
        $admin_content = $admin_content . ' - ' . ' العمر بالسنوات:' . ' ' . $age . '.';

        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-4o', // gpt-4 أو gpt-3.5-turbo بناءً على ما تحتاجه
                'messages' => [
                    ['role' => 'system', 'content' => 'اريدك ان تقرا كتاب تفسير الاحلام ل ابن سيرين وبناء عليه اريدك ان تفسر لي الحلم المرسل من قبل المستخدم بما لا يتجاوز 3 اسطر.'],
                    ['role' => 'user', 'content' => $question],
                ],
                "response_format" => [
                    "type" => "json_schema",
                    "json_schema" => [
                        "name" => "answer_schema",
                        "schema" => [
                            "type" => "object",
                            "properties" => [
                                "title" => [
                                    "description" => "عنوان مناسب للحلم الذي ارسله المستخدم بما لايتجاوز السطر",
                                    "type" => "string"
                                ],
                                "answer" => [
                                    "description" => "نص تفسير الحلم",
                                    "type" => "string"
                                ]
                            ],
                            "additionalProperties" => false
                        ]
                    ]
                ],

                'max_tokens' => 256,
                'temperature' => 0.7,
                "top_p" => 1
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['choices'][0]['message']['content'] ?? 'No response from ChatGPT.';

        // return  $admin_content;
    }
}
