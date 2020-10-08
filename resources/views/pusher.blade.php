<!DOCTYPE html>
<head>
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c7d53d819b0434334f9d', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('scan-qr', function(data) {
    //   alert(JSON.stringify(data));
    //   document.getElementById('pusher').append(data);
      document.getElementById('pusher').innerHTML = '<h1>'+data+'</h1>';
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <div id="pusher">

  </div>
</body>