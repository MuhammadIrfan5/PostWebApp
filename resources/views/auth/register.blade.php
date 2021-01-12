<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../resources/views/homethings/css/style.css" />
    <link rel="icon" href="../resources/views/homethings/images/favicon.png">
    <title>Sign in & Sign up Form</title>
    
  </head>
  <body>
    <div class="container" >
      <div class="forms-container " id="darkmode">
        
        <div class="signin-signup " >
          <form action="{{route('login')}}" method="POST" class="sign-in-form">
            @csrf
            @if(session()->has('status'))
            <div class="danger" style="width:450px;height: 50px;background-color: #ff726f;text-align: center;padding-top: 12px; ">
                {{session('status')}}
            </div>
            @endif
            <h2 class="title" id="h2">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" value="{{old('email')}}" required name="email"/>
            </div>

            <div class="field">
              <div>
                @error('username')
                  {{$message}}
                @enderror
              </div>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" required name="password"/>
            </div>

            <div class="field">
              <div>
                @error('password')
                  {{$message}}
                @enderror
              </div>
            </div>

            <div class="form-check">
              <input type="checkbox" name="remember" class="form-check-input">
              <label for="remember" class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="{{ url('/login/facebook') }}" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="{{route('register')}}" method="post"  class="sign-up-form">
          	@csrf
            <h2 class="title" id="hh">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" value="{{old('username')}}" name="username"/>
            </div>
            
            <div class="field">
            	<div>
	            	@error('username')
	            		{{$message}}
	            	@enderror
            	</div>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" value="{{old('email')}}" name="email"/>
            </div>

            <div class="field">
            	<div>
	            	@error('email')
	            		{{$message}}
	            	@enderror
            	</div>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" value="{{old('password')}}" name="password" autocomplete="new-password"/>
            </div>

            <div class="field">
            	<div>
	            	@error('password')
	            		{{$message}}
	            	@enderror
            	</div>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password Comfirmation" name="password_confirmation" autocomplete="new-password"/>
            </div>

            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="{{ url('/login/facebook') }}" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Signup With Us
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
            <button class="btn transparent mode" onclick="darkmode()" id="">
              Dark Mode
            </button>
            <button class="btn transparent mode" onclick="lightmode()" id="">
              Light Mode
            </button>
          </div>
          <img src="../resources/views/homethings/images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Share Your Every Moment With Us.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
            <button class="btn transparent mode" onclick="darkmode()">
              Dark Mode
            </button>
            <button class="btn transparent mode" onclick="lightmode()" id="">
              Light Mode
            </button>
          </div>
          <img src="../resources/views/homethings/images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../resources/views/homethings/js/app.js"></script>
  </body>
</html>
<script type="text/javascript">
	
	function darkmode() {
    document.getElementById('darkmode').style.cssText = 'background-color: #191919; color: white;' ;
    document.getElementById('h2').style.cssText = 'color: white;' ;
    document.getElementById('hh').style.cssText = 'color: white;' ;
}
	function lightmode() {
    document.getElementById('darkmode').style.cssText = 'background-color: white; color: black;' ;
    document.getElementById('h2').style.cssText = 'color: black;' ;
    document.getElementById('hh').style.cssText = 'color: black;' ;
}
</script>