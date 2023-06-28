<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Beasiswa IT Del</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="{{url(asset('Assets/css/style.css'))}}" rel="stylesheet">
  <link rel="icon" href="{{url(asset('Assets/logo.png'))}}">
</head>

<body

  <div class="flex items-center min-h-screen bg-gray-50">
    <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shPow-xl">
      <div class="flex flex-col md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <section class="showcase">
            <img class="object-cover w-full h-full" src="{{asset('Assets/login-bg.png')}}" alt="img" />
            <div class="overlay">
              <h2>Hello.<br>Welcome<br>Back!</h2>
            </div>
          </section>
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <div class="flex justify-center mb-10">
              <img src="{{asset('Assets/logobeasiswa.png')}}" />
            </div>
            <form action="{{route('login')}}" method="POST">
              @csrf
              <div>
                <label class="block text-sm">
                  Username
                </label>
                <input type="text" class="w-full px-4 py-2 text-sm border-b-2 border-black outline-none opacity-50 focus:border-blue-400 form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username" autocomplete="off" />
                @error('username')
                <div class="text-sm pl-2 text-red-500">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label class="block mt-4 text-sm">
                  Password
                </label>
                <input class="w-full px-4 py-2 text-sm border-b-2 border-black outline-none opacity-50 focus:border-blue-400 form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" type="password" />
                @error('password')
                <div class="text-sm pl-2 text-red-500">{{ $message }}</div>
                @enderror
              </div>

              <div class="mt-8 flex justify-between items-center">
                <div class="form-check">
                  <input type="checkbox" id="rememberMe" name="rememberMe" class="form-check-input" />
                  <label for="rememberMe" class="form-check-label text-xs cursor-pointer">Remember me?</label>
                </div>
                <button class="font-bold text-sm text-white rounded py-1 px-4" id="login" type="submit">Sign In</button>
              </div>
              @error('login')
              <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
              @enderror
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>