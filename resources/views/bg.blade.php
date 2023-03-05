<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="background: rgb(238,77,13);
    background: linear-gradient(41deg, rgba(238,77,13,1) 12%, rgba(237,200,10,1) 55%, rgba(192,0,255,1) 100%);">
        <div>
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 267.22 85.67">
                <defs>
                  <style>
                    .cls-1 {
                      fill: #fff;
                      font-size: 72px;
                    }

                    .cls-2 {
                      font-family: PastramiVF-SemiBold, 'Pastrami VF';
                      font-variation-settings: 'wght' 750;
                      font-weight: 600;
                    }

                    .cls-3 {
                      font-family: PastramiVF-Light, 'Pastrami VF';
                      font-variation-settings: 'wght' 325;
                      font-weight: 300;
                    }
                  </style>
                </defs>
                <text class="cls-1" transform="translate(0 58.5)"><tspan class="cls-3" x="0" y="0">image</tspan><tspan class="cls-2" x="183.54" y="0">Up</tspan></text>
              </svg>
            </div>
            <div>
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
                    <form action="{{ route('scale.store') }}" method="POST">
                        @csrf

                    <label for="email" class="required"><em>*</em>Email Address</label>
                    <div class="input-box">
                        <input type="text" name="email" id="email" class="input-text" title="Email Address">
                    </div>

                    <label for="file" class="required"></label>
                    <div class="input-box" style="width:50%;">
                        <x-media-library-attachment name="file"/>
                    </div>

                <div class="buttons-set" style="float:left;">
                    <button class="button" type="Submit" value="Submit">
                        <span>
                            <span>Submit</span>
                        </span>
                    </button>
                </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
