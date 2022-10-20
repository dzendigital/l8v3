<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel based app run by @dzendigital</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    <div id="app">
        <div class="uk-position-top-center uk-margin-top">
            <div id="form"></div>
        </div>

        <div id="modal-center" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" style="width: max-content;">

                <button class="uk-modal-close-default" type="button" uk-close></button>

                <p>Данные сохранены.</p>

            </div>
        </div>
    </div>
    <script src="/public/js/app.js?v=1.<?=time()  ?>"></script>
</body>
</html>