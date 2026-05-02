<!doctype html>
<html lang="en">
  <!-- [Head] start -->

   @include('style.style')
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
      <div class="auth-wrapper v1">
        <div class="auth-form">
          <div class="card my-5">
            <div class="card-body">
              <a href="#"><img src="{{ asset('assets/images/gestiot.svg') }}" class="mb-4 img-fluid" alt="img" /></a>
              <div class="mb-4">
                <h3 class="mb-2"><b>Réinitialiser le mot de passe</b></h3>
                <p class="text-muted">Saisir votre Nouveau Mot de Passe</p>
              </div>

               @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
              <div class="mb-3">
                <label class="form-label">Nouveau mot de passe</label>
                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password" required/>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" id="floatingInput1" placeholder="Confirm Password" required />
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
              </div>
        </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- [ Footer Script ] start  -->
 @include('footerscript.footerscript')
    
 

  </body>
  <!-- [Body] end -->
</html>
