<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">
</head>

<body>
    <div
        style="width: 80%;margin: 5% auto;height: auto;box-shadow: 0 0 2px #aaa;font-family: Hind;background: #dadada;">
        <div style="width: 100%;background: #efefef;text-align: center;"><img
                src="https://gbcaindia.com/images/gbc-llp-logo.png" style="max-width: 250px;padding:10px;"></div>
        <div style="width: 100%;">
            <h3
                style="text-align: center; font-weight: 600;color: #b58134;font-size: 26px;margin-top: 10px;margin-bottom: 10px;">
                Reset Password</h3>
            <div class="row">
                <p style="padding: 0px 10px 0px 20px; margin-bottom: 0px;font-size: 15px;">Dear
                    <b>{{ $name }}</b>,
                </p>
            </div>
            <div class="row">
                <div>
                    <p style="padding: 0px 10px 0px 20px; margin-bottom: 0px;font-size: 15px;">
                        We've Received a request for password reset <br> Please Click the the Link Below to redirect to
                        portal for
                        processing the request for password reset
                    </p><br />
                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">Reset Password</a>
                </div>
            </div><br />
            <div class="row" style="background: #edc334; color: #000;">
                <div class="col-md-12">
                    <p style="padding: 5px 10px 5px 20px; margin-bottom: 0px; font-size: 15px;text-align: center;">GBCA
                        & Associates LLP (a Limited Liability Partnership with LLPIN AAM-7479) w.e.f. 31st May,2018
                        Copyright {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
