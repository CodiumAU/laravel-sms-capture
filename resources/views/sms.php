<!DOCTYPE html>

<head>
    <title>SMS Capture</title>

    <style>
        div.page::-webkit-scrollbar {
            width: 0 !important;
        }

        @font-face {
            font-family: 'Droid Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Droid Sans'), local('DroidSans'), url(https://fonts.gstatic.com/s/droidsans/v6/s-BiyweUPV0v-yRb-cjciL3hpw3pgy2gAi-Ip7WPMi0.woff) format('woff');
        }

        @font-face {
            font-family: 'Droid Sans';
            font-style: normal;
            font-weight: 700;
            src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(https://fonts.gstatic.com/s/droidsans/v6/EFpQQyG9GqCrobXxL-KRMXbFhgvWbfSbdVg11QabG8w.woff) format('woff');
        }


        #body>header div.system-bar {
            line-height: 1.5rem;
            font-size: 0.75rem;
            width: 100%;
            font-family: 'Droid Sans';
            font-weight: 400;
            padding-bottom: 2pt;
            overflow: auto;
            color: #aaa;
        }

        .left span,
        .right span {
            font-size: 1.5rem;
            line-height: 1pt;
        }

        #body>header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 42px;
            line-height: 42px;
            background-color: #fff;
            padding: 4pt 8pt 16pt 8pt;
            color: #222;
            overflow: hidden;
        }

        #body>footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 24px;
            line-height: 24px;
            background-color: #fff;
            padding: 8pt 8pt 8pt 8pt;
            color: #222;
        }

        #body>div.page {
            position: absolute;
            display: flex;
            flex-direction: column;
            top: 44pt;
            bottom: 34pt;
            left: 0;
            right: 0;
            overflow: auto;
            padding: 8pt;
            line-height: 1.5;
        }

        #body * {
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Chrome/Safari/Opera */
            -khtml-user-select: none;
            /* Konqueror */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            /* Non-prefixed version, currently
                                  not supported by any browser */
        }

        #body {
            width: 100%;
            height: 800px;
            background-color: #fefefe;
            border-radius: 12px;
            border: 1px solid #999;
            position: relative;
            text-align: left;
            overflow: hidden;
            font-family: 'Droid Sans';
            font-size: 9pt;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            color: #333;
        }

        body {
            text-align: center;
            padding: 0;
            margin: 0;
            background: #efefef;
            font-family: 'Droid Sans';
            color: #f0f0f0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body>header,
        body>footer {
            padding: 1em 0 1em 0;
        }

        body>header>h1 {
            padding: 0;
            margin: 0;
            font-size: 12pt;
        }

        body>header>p {
            font-size: 10pt;
            margin: 0;
            padding: 0.5em 0 0.5em 0;
        }

        div#app {
            position: relative;
            box-shadow: 0 16pt 24pt rgba(0, 0, 0, 0.25);
            border: 1px solid #ccc;
            border-radius: 12px;
            background-color: #484e57;
            overflow: hidden;
            width: 480px;
            padding: 8pt;
            margin: 0 auto 0 auto;

        }

        div#app>header {
            text-align: center;
            width: 100%;
            overflow: auto;
            padding: 8pt 0 4pt 0;
        }

        div#app .feature {
            margin: 0 auto 0 auto;
            border-radius: 50%;
            background-color: #999;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
            height: 6pt;
            width: 6pt;
            opacity: 0.8;
        }

        div#app>header .feature:nth-child(2) {
            opacity: 0.8;
            display: block;
            width: 24pt;
            height: 4pt;
            margin: 1em auto 1em auto;
            border-radius: 0;
        }

        div#app>footer .feature {
            opacity: 0.8;
            display: block;
            height: 24pt;
            width: 24pt;
            border: 2px solid #999;
            background-color: transparent;
            margin: 6pt auto 1pt auto;
        }

        .left {
            float: left;
            width: 20%;
            text-align: left;
        }

        .centre {
            float: left;
            width: 60%;
            text-align: center;
        }

        .right {
            float: right;
            width: 20%;
            text-align: right;
        }

        .message {
            position: relative;
            background-color: #e9eef4;
            color: #314461;
            padding: 6px;
            border-radius: 6px;
            margin-bottom: 4rem;
            font-size: 1rem;
        }

        .message .body {
            white-space: break-spaces;
        }

        .message .body a {
            color: #1b2d4a;
        }

        .message .recipient {
            display: block;
            font-weight: bold;
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .message .date {
            position: absolute;
            top: 100%;
            right: 0;
            font-size: 0.65rem;
        }
    </style>
</head>

<body>
    <div id="app">
        <header>
            <div class="feature"></div>
            <div class="feature"></div>
        </header>

        <div id="body">
            <header>
                <div class="system-bar">
                    <div class="left">&nbsp;</div>
                    <div class="centre">12:34</div>
                    <div class="right">&nbsp;</div>
                </div>
            </header>
            <div class="page">
                <div class="message" v-for="({ message, recipient, date }, index) in messages" :key="index">
                    <span class="recipient">{{ recipient }}</span>

                    <div class="body" v-html="message"></div>

                    <span class="date">{{ date }}</span>
                </div>
            </div>
            <footer>
            </footer>
        </div>

        <footer>
            <div class="feature"></div>
        </footer>

    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        Pusher.logToConsole = true;

        const pusher = new Pusher('<?php echo \Illuminate\Support\Facades\Config::get('sms-capture.pusher'); ?>', {
            cluster: 'ap1'
        });

        const channel = pusher.subscribe('<?php echo \Illuminate\Support\Facades\Config::get('sms-capture.broadcasting.channel'); ?>');

        function urlify(text) {
            return text.replace(/(https?:\/\/[^\s]+)/g, function(url) {
                return '<a href="' + url + '" target="_blank">' + url + '</a>';
            })
        };

        channel.bind('<?php echo \Illuminate\Support\Facades\Config::get('sms-capture.broadcasting.event'); ?>', function(data) {
            app.messages.push({
                message: urlify(data.message),
                recipient: data.recipient,
                date: data.date
            });
        });

        const app = new Vue({
            el: '#app',
            data: {
                messages: [
                ]
            },
        });
    </script>
</body>
