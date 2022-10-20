<?php

namespace App\Observers;

use App\Models\UserData;

class UserDataObserver
{
    public function created(UserData $userdata)
    {
        $html = "
            <p>
                Имя: {$userdata->name}
            </p>
            <p>
                Фамилия: {$userdata->sname}
            </p>
            <p>
                Почта: {$userdata->email}
            </p>
            <p>
                Дата: {$userdata->date_at}
            </p>
            <p>
                Тип: {$userdata->select}
            </p>
        ";
        // $is_send = \Mail::raw('welcome.', function ($message) use ($html) {
        //     $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        //     $message->to("dzendigitalru@yandex.ru");
        //     $message->subject('Form data for user.');
        //     $message->setBody($html, 'text/html');
        // });
        $is_send = \Mail::send([], [], function ($message) use ($html) {
            $message->to("dzendigitalru@yandex.ru")
                    ->subject('Form data for user')
                    ->from(env('MAIL_FROM_ADDRESS'))
                    ->setBody($html, 'text/html');
            });
    }
}
